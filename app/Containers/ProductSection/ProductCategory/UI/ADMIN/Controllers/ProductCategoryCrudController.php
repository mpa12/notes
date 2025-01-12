<?php

namespace App\Containers\ProductSection\ProductCategory\UI\ADMIN\Controllers;

use App\Containers\ProductSection\ProductCategory\Models\ProductCategory;
use App\Containers\ProductSection\ProductCategory\UI\ADMIN\Requests\ProductCategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductCategoryCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup(): void
    {
        CRUD::setModel(ProductCategory::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product-category');
        CRUD::setEntityNameStrings('product category', 'product categories');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        $this->crud->column([
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
        ]);

        $this->crud->column([
            'label' => 'Parent',
            'type' => 'select',
            'name' => 'parent_id',
            'entity' => 'parent',
            'model' => ProductCategory::class,
            'attribute' => 'name',
        ]);

        $this->crud->column([
            'label' => 'Image',
            'name' => 'imageUrl',
            'type' => 'image',
        ]);

        $this->crud->column([
            'label' => 'Status',
            'name' => 'status',
            'type' => 'enum',
            'enum_function' => 'readable',
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(ProductCategoryRequest::class);

        $this->crud->group(
            $this->crud->field([
                'label' => 'Name',
                'name' => 'name',
                'type' => 'text',
            ]),
            $this->crud->field([
                'label' => 'Slug',
                'name' => 'slug',
                'type' => 'text',
            ]),
        )->wrapper([
            'class' => 'form-group col-sm-6 mb-3'
        ]);

        $this->crud->group(
            $this->crud->field([
                'label' => 'Image',
                'name' => 'image',
                'type' => 'upload',
                'upload' => true,
            ]),
            $this->crud->field([
                'label' => 'Status',
                'name' => 'status',
                'type' => 'enum',
                'enum_function' => 'readable',
            ]),
        )->wrapper([
            'class' => 'form-group col-sm-6 mb-3'
        ]);

        $this->crud->field([
            'label' => 'Parent',
            'type' => 'select',
            'name' => 'parent_id',
            'entity' => 'parent',
            'model' => ProductCategory::class,
            'attribute' => 'name',
            'options' => fn($query) => $query->orderBy('name', 'ASC')->get(),
            'prefix' => config('icons.product_categories'),
        ]);

        $this->crud->field([
            'label' => 'Description',
            'name' => 'description',
            'type' => 'textarea',
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation(): void
    {
        $this->crud->column([
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
        ]);
        $this->crud->column([
            'label' => 'Slug',
            'name' => 'slug',
            'type' => 'text',
        ]);

        $this->crud->column([
            'label' => 'Image',
            'name' => 'imageUrl',
            'type' => 'image',
        ]);

        $this->crud->column([
            'label' => 'Parent',
            'type' => 'select',
            'name' => 'parent_id',
            'entity' => 'parent',
            'model' => ProductCategory::class,
            'attribute' => 'name',
            'options' => fn($query) => $query->orderBy('name', 'ASC')->get(),
        ]);

        $this->crud->column([
            'label' => 'Status',
            'name' => 'status',
            'type' => 'enum',
            'enum_function' => 'readable',
        ]);

        $this->crud->column([
            'label' => 'Description',
            'name' => 'description',
            'type' => 'textarea',
        ]);

        $this->crud->column([
            'label' => 'Created at',
            'name' => 'created_at',
            'type' => 'datetime',
        ]);
        $this->crud->column([
            'label' => 'Updated at',
            'name' => 'updated_at',
            'type' => 'datetime',
        ]);
    }
}
