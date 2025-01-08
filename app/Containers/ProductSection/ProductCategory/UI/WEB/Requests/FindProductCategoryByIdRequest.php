<?php

namespace App\Containers\ProductSection\ProductCategory\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class FindProductCategoryByIdRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        'id',
    ];

    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            // 'id' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
