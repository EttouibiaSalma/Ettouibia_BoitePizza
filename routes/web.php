<?php

use Illuminate\Support\Facades\Route;
use App\Models\Supplement;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'FrontController@productsList')->name('index');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('Home');

//----------------- Cart -----------------------------

Route::Post('/cart/add', 'CartController@store')->name('cart.store');
Route::get('/cart', 'CartController@index')->name('shopping-cart');
Route::get('/emptycart', function(){
    Cart::destroy();
    return redirect()->route('shopping-cart');
})->name('empty-cart');

Route::delete('/cart/{rowId}', 'CartController@destroy')->name('cart.delete');
Route::patch('/cart/{rowId}', 'CartController@update')->name('cart.update');

//----------------- Checkout -----------------------------

Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/validate_checkout', 'CheckoutController@store')->name('checkout.validate');
Route::get('/valide', 'CheckoutController@show')->name('valide');
/*
Route::post('/validate_checkout', function (Request $request) {
    $gateway = new Braintree\Gateway([
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
        // header("Location: transaction.php?id=" . $transaction->id);

        return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
    } else {
        $errorString = "";

        foreach ($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }

        // $_SESSION["errors"] = $errorString;
        // header("Location: index.php");
        return back()->withErrors('An error occurred with the message: '.$result->message);
    }
})->name('checkout.validate'); 
*/
//----------------- Product -----------------------------
Route::get('/menu/product/{id}', 'ProductController@productdetails')->name('product.details');
Route::get('/menu', 'ProductController@productscategory')->name('Menu');
Route::get('/menu/query',function(){

	$cate_id = Input::get('cate_id');

	$products = Product::where('category_id', '=', $cate_id)->get();

	//$eleves[null] = 'select';

	return Response::json($products);
});
//----------------- Comment ------------------------------
Route::Post('/menu/product/{id}/store', 'CommentController@store')->name('comment.store');
Route::get('/menu/comment/delete/{id}', 'CommentController@destroy')->name('comment.delete');
Route::Post('/menu/comment/edit/{id}', 'CommentController@update')->name('comment.update');