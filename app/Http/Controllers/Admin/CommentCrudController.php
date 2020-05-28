<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommentCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Comment');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/comment');
        $this->crud->setEntityNameStrings('comment', 'comments');
        $this->crud->addColumn([
            'label' => "Message",
            'type' => 'textarea',
            'name' => 'message'
         ]);
        $this->crud->addColumn([
            'label' => "Publication date",
            'type' => 'date',
            'name' => 'pub_date'
         ]);
         $this->crud->addColumn([
            'label' => "Produit",
            'type' => 'text',
            'name' => 'product.name'
         ]);
         $this->crud->addColumn([
            'label' => "Produit photo",
            'type' => 'image',
            'name' => 'product.image',
            'height' => '80px',
            'width'=> '100px'
         ]);
         $this->crud->addColumn([
            'label' => "Client",
            'type' => 'text',
            'name' => 'client.first_name'
         ]);
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumn([
            'label' => "Message",
            'type' => 'text',
            'name' => 'message'
         ]);
        $this->crud->addColumn([
            'label' => "Publication date",
            'type' => 'date',
            'name' => 'pub_date'
         ]);
         $this->crud->addColumn([
            'label' => "Produit",
            'type' => 'text',
            'name' => 'product.name'
         ]);
         $this->crud->addColumn([
            'label' => "Produit photo",
            'type' => 'image',
            'name' => 'product.image',
            'height' => '80px',
            'width'=> '100px'
         ]);
         $this->crud->addColumn([
            'label' => "Client",
            'type' => 'text',
            'name' => 'client.first_name'
         ]);
         $this->crud->addFilter([
            'type'  => 'date_range',
            'name'  => 'pub_date',
            'label' => 'Plage de dates'
          ],
            true,
            function ($value) { // if the filter is active, apply these constraints
                 $dates = json_decode($value);
                 $this->crud->addClause('where', 'pub_date', '>=', $dates->from);
                 $this->crud->addClause('where', 'pub_date', '<=', $dates->to . ' 23:59:59');
            });
            $this->crud->addFilter([
               'name' => 'clientNum',
               'type' => 'select2',
               'label'=> 'Clients'
             ], function() {
                 return \App\Models\Client::all()->pluck('last_name', 'id')->toArray();
             }, function($value) { // if the filter is active
                 $this->crud->addClause('where', 'clientNum', $value);
             });
             $this->crud->addFilter([
               'name' => 'productCode',
               'type' => 'select2',
               'label'=> 'Products'
             ], function() {
                 return \App\Models\Product::all()->pluck('name', 'id')->toArray();
             }, function($value) { // if the filter is active
                 $this->crud->addClause('where', 'productCode', $value);
             });
         
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CommentRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->addField([
            'label' => "Produit",
            'type' => 'select',
            'name' => 'productCode', // the column that contains the ID of that connected entity;
            'entity' => 'product', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Product"
         ]);
         $this->crud->addField([
            'label' => "Client",
            'type' => 'select',
            'name' => 'clientNum', // the column that contains the ID of that connected entity;
            'entity' => 'client', // the method that defines the relationship in your Model
            'attribute' => 'first_name', // foreign key attribute that is shown to user
            'model' => "App\Models\Client"
         ]);
         $this->crud->addField([
            'label' => "Message",
            'type' => 'ckeditor',
            'name' => 'message'
         ]);
         /*
         $this->crud->addField([
            'label' => "Publication date",
            'type' => 'datetime_picker',
            'name' => 'pub_date'
         ]);
         */
        //$this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
