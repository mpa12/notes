<?php

namespace App\Containers\ProductSection\Product\UI\ADMIN\Controllers;

use App\Containers\ProductSection\Product\Models\Product;
use App\Containers\ProductSection\Product\UI\ADMIN\Requests\ProductRequest;
use App\Containers\ProductSection\ProductCategory\Models\ProductCategory;
use App\Ship\Backpack\CRUD\Fields\ImageMultipleCrudField;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductCrudController extends CrudController
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
        CRUD::setModel(Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('товар', 'товары');
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
            'label' => 'Price',
            'name' => 'price',
            'type' => 'number',
            'suffix' => ' ' . config('icons.rubles'),
            'decimals' => 2,
            'thousands_sep' => ' ',
        ]);

        $this->crud->column([
            'label' => 'Product category',
            'type' => 'select',
            'name' => 'product_category_id',
            'entity' => 'productCategory',
            'model' => ProductCategory::class,
            'attribute' => 'name',
        ]);

        $this->crud->column([
            'label' => 'Status',
            'name' => 'status',
            'type' => 'enum',
            'enum_function' => 'readable',
        ]);
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
            'label' => 'Product category',
            'type' => 'select',
            'name' => 'product_category_id',
            'entity' => 'productCategory',
            'model' => ProductCategory::class,
            'attribute' => 'name',
            'options' => fn($query) => $query->orderBy('name', 'ASC')->get(),
        ]);
        $this->crud->column([
            'label' => 'Sku',
            'name' => 'sku',
            'type' => 'text',
            'limit' => 120,
        ]);

        $this->crud->column([
            'label' => 'Price',
            'name' => 'price',
            'type' => 'number',
            'suffix' => ' ' . config('icons.rubles'),
            'decimals' => 2,
            'thousands_sep' => ' ',
        ]);
        $this->crud->column([
            'label' => 'Old price',
            'name' => 'old_price',
            'type' => 'number',
            'suffix' => ' ' . config('icons.rubles'),
            'decimals' => 2,
            'thousands_sep' => ' ',
        ]);

        $this->crud->column([
            'label' => 'Status',
            'name' => 'status',
            'type' => 'enum',
            'enum_function' => 'readable',
        ]);
        $this->crud->column([
            'label' => 'Is featured',
            'name' => 'is_featured',
            'type' => 'switch',
        ]);

        $this->crud->column([
            'label' => 'Short description',
            'name' => 'short_description',
            'type' => 'textarea',
        ]);
        $this->crud->column([
            'label' => 'Description',
            'name' => 'description',
            'type' => 'summernote',
        ]);

        $this->crud->column([
            'label' => 'Stock',
            'name' => 'stock',
            'type' => 'number',
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

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(ProductRequest::class);

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
                'label' => 'Product category',
                'type' => 'select',
                'name' => 'product_category_id',
                'entity' => 'productCategory',
                'model' => ProductCategory::class,
                'attribute' => 'name',
                'options' => fn($query) => $query->orderBy('name', 'ASC')->get(),
                'prefix' => config('icons.product_categories'),
            ]),
            $this->crud->field([
                'label' => 'Sku',
                'name' => 'sku',
                'type' => 'text',
            ]),
        )->wrapper([
            'class' => 'form-group col-sm-6 mb-3'
        ]);

        $this->crud->group(
            $this->crud->field([
                'label' => 'Price',
                'name' => 'price',
                'type' => 'number',
            ]),
            $this->crud->field([
                'label' => 'Old price',
                'name' => 'old_price',
                'type' => 'number',
            ]),
        )
            ->wrapper(['class' => 'form-group col-sm-6 mb-3'])
            ->prefix(config('icons.rubles'))
            ->attributes([
                'step' => 'any',
            ])
            ->decimals(2);

        $this->crud->field([
            'label' => 'Status',
            'name' => 'status',
            'type' => 'enum',
            'enum_function' => 'readable',
            'wrapper' => [
                'class' => 'form-group col-sm-6 mb-3',
            ],
        ]);
        $this->crud->field([
            'label' => 'Is featured',
            'name' => 'is_featured',
            'type' => 'switch',
            'wrapper' => [
                'class' => 'form-group col-sm-6 mb-4 d-flex align-items-end ',
            ],
        ]);

        $this->crud->field([
            'label' => 'Short description',
            'name' => 'short_description',
            'type' => 'textarea',
        ]);
        $this->crud->field([
            'label' => 'Description',
            'name' => 'description',
            'type' => 'summernote',
        ]);

        $this->crud->field([
            'label' => 'Stock',
            'name' => 'stock',
            'type' => 'number',
        ])->prefix(config('icons.stock'));

        new ImageMultipleCrudField([
            'label' => 'Images',
            'name' => 'images',
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
}
