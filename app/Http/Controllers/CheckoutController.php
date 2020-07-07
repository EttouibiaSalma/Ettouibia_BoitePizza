<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplement;
use App\Models\Order;
use App\Models\Orderline;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use DateTime;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalsupp = 0;
        foreach(Supplement::all() as $item){
            $totalsupp += $item->price;
        }
        $newtotal =Cart::total() + $totalsupp;
        
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
    
        $token = $gateway->ClientToken()->generate();
        $supps = Supplement::all();
        if(auth()->check()){
            return view('cart.checkout', [
                'token' => $token
            ], compact('supps', 'newtotal', 'totalsupp'));
        }
        else {
            return back()->with('error_message', 'You are not logged in');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        if ($result->success) {
            $transaction = $result->transaction;
            $this->StoreOrder($request);
            Cart::instance('default')->destroy();
            return redirect()->route('valide');
        } else {
            $errorString = "";
            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
            return back()->withErrors('An error occurred with the message: '.$result->message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('cart.valide');
    }

    protected function StoreOrder(Request $request)
    {
        // Insert into orders table
        $order = Order::create([
            'clientNum' => auth()->user()->id,
            'date' => new DateTime(),
            'addrLiv' => $request->addrLiv,
            'secteur' => $request->secteur,
            'type' => 'Order',
            'realise' => 1,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            Orderline::create([
                'OrderNum' => $order->id,
                'ProductCode' => $item->model->id,
                'price'=>$item->price,
                'nb' => $item->qty,
            ]);
        }

        return $order;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
