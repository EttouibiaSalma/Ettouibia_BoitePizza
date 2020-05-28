<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('product', 'products');
        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
            'height' => '80px',
            'width'=> '80px'
        ]);
        $this->crud->addColumn([
            'label' => "Category",
            'type' => 'text',
            'name' => 'category.name'
         ]);
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumn([
            'label' => "Product name",
            'type' => 'text',
            'name' => 'name'
         ]);
         $this->crud->addColumn([
            'label' => "Price",
            'type' => 'text',
            'name' => 'price'
         ]);
         $this->crud->addColumn([
            'label' => "Discount",
            'type' => 'text',
            'name' => 'discount'
         ]);
         $this->crud->addColumn([
            'label' => "Category",
            'type' => 'text',
            'name' => 'category.name'
         ]);
         $this->crud->addColumn([
            'label' => "Start date",
            'type' => 'date',
            'name' => 'start_date'
         ]);
         $this->crud->addColumn([
            'name' => 'in_promo',
            'type' => 'boolean',
            'label' => 'In promo',
        ]);
        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
            'height' => '80px',
            'width'=> '80px'
        ]);
        $this->crud->addColumn([
            'label' => "End date",
            'type' => 'date',
            'name' => 'end_date'
         ]);
        //$this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProductRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->addField([
            'label' => "Category",
            'type' => 'select',
            'name' => 'category_id', // the column that contains the ID of that connected entity;
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Category"
         ])->afterField('discount');
         $this->crud->addField([
            'label' => "Image",
            'type' => 'image',
            'name' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1,
            'height' => '80px',
            'width'=>'80px']);
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    
}
