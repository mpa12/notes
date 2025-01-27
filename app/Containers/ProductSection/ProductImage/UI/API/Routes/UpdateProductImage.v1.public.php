<?php

/**
 * @apiGroup           ProductImage
 * @apiName            Invoke
 *
 * @api                {PATCH} /v1/product-images/:id Invoke
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\ProductSection\ProductImage\UI\API\Controllers\UpdateProductImageController;
use Illuminate\Support\Facades\Route;

Route::patch('product-images/{id}', UpdateProductImageController::class)
    ->middleware(['auth:api']);

