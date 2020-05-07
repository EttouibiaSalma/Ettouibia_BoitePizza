<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Client');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/client');
        $this->crud->setEntityNameStrings('client', 'clients');
        $this->crud->addColumn([
            'name' => 'imagePath',
            'type' => 'image',
            'label' => 'Image',
            'height' => '80px',
            'width'=>'80px'
        ]);
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        
        $this->crud->addColumn([
            'label' => "First name",
            'type' => 'text',
            'name' => 'first_name'
         ]);
         $this->crud->addColumn([
            'label' => "Last name",
            'type' => 'text',
            'name' => 'last_name'
         ]);
         $this->crud->addColumn([
            'label' => "Email",
            'type' => 'text',
            'name' => 'email'
         ]);
         $this->crud->addColumn([
            'label' => "Address",
            'type' => 'text',
            'name' => 'address'
         ]);
         $this->crud->addColumn([
            'label' => "Login",
            'type' => 'text',
            'name' => 'login'
         ]);
        $this->crud->addColumn([
            'name' => 'imagePath',
            'type' => 'image',
            'label' => 'Image',
            'height' => '80px',
            'width'=>'80px'
        ]);
        $this->crud->addColumn([
            'label' => "Inscription date",
            'type' => 'date',
            'name' => 'inscription_date'
         ]);
         //$this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
      //$this->crud->handlePasswordInput($request);
        $this->crud->setValidation(ClientRequest::class);

        // TODO: remove setFromDb() and manually define Fields
      
         $this->crud->addField([
            'label' => "Image",
            'type' => 'image',
            'name' => 'imagePath',
            'upload' => true,
            'crop' => true, 
            'aspect_ratio' => 1,
            'height' => '80px',
            'width'=>'80px']);
         $this->crud->addField([
               'label' => "First name",
               'type' => 'text',
               'name' => 'first_name'
            ]);
         $this->crud->addField([
               'label' => "Last name",
               'type' => 'text',
               'name' => 'last_name'
            ]);
            $this->crud->addField([
               'label' => "Email",
               'type' => 'text',
               'name' => 'email'
            ]);
            $this->crud->addField([
               'label' => "Login",
               'type' => 'text',
               'name' => 'login'
            ]);
         $this->crud->addField([
            'label' => "Password",
            'type' => 'Password',
            'name' => 'password'
         ]);
         $this->crud->addField([
            'label' => "Address",
            'type' => 'address_algolia',
            'name' => 'address'
         ]);
         $this->crud->addField([
            'label' => "Inscription date",
            'type' => 'datetime_picker',
            'name' => 'inscription_date'
         ]);
         $this->crud->addField([
            'label' => "Turnover",
            'type' => 'text',
            'name' => 'ca'
         ]);
        //$this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
      //$this->handlePasswordInput($request);
      $this->setupCreateOperation();
    }
    protected function handlePasswordInput(\Illuminate\Foundation\Http\FormRequest $request)
{
	// Encrypt password if specified.
	if ($request->input('password')) {
		$request->request->set('password', bcrypt($request->input('password')));
	} else {
		$request->request->remove('password');
   }
   return $request;
}
}
