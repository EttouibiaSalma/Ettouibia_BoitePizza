<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormuleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormuleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormuleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Formule');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/formule');
        $this->crud->setEntityNameStrings('formule', 'formules');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumn([
            'name' => 'imagePath',
            'type' => 'image',
            'label' => 'Image',
            'height' => '80px',
            'width'=> '80px'
        ]);
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(FormuleRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->addField([
            'label' => "Image",
            'type' => 'image',
            'name' => 'imagePath',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1,
            'height' => '80px',
            'width'=>'80px']);
            $this->crud->addField([
                'label' => "Formule name",
                'type' => 'text',
                'name' => 'name'
             ]);
             $this->crud->addField([
                'label' => "Price",
                'type' => 'text',
                'name' => 'prix'
             ]);
        $this->crud->addField([
                'label' => "Description",
                'type' => 'ckeditor',
                'name' => 'description'
             ]);
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
