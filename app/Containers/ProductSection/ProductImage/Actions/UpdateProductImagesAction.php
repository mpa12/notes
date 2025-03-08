<?php

namespace App\Containers\ProductSection\ProductImage\Actions;

use App\Containers\ProductSection\Product\Models\Product;
use App\Containers\ProductSection\ProductImage\Models\ProductImage;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Models\Model;
use App\Ship\Tasks\SaveBase64ImageTask;
use Illuminate\Support\Collection;

class UpdateProductImagesAction extends ParentAction
{
    /**
     * @param Product $product
     * @param Collection $requestImages
     *
     * @return void
     */
    public function run(Product $product, Collection $requestImages): void
    {
        // Существующие изображения
        $existsImages = $product->images;

        // Удаление ненужных изображений
        $this->deleteOld($requestImages, $existsImages);
        // Создание новых изображений
        $this->createNew($requestImages, $product);
        // Обновление position у изображений
        $this->updatePosition($requestImages, $existsImages, $product);
    }

    /**
     * @param Collection $requestImages
     * @param Collection $existsImages
     *
     * @return void
     */
    private function deleteOld(Collection $requestImages, Collection $existsImages): void
    {
        // Изображения для удаления
        $imagesToDelete = $existsImages->filter(function (ProductImage $image) use ($requestImages) {
            $dataImage = $requestImages->where('id', $image->id)->first();
            return is_null($dataImage);
        });
        // Удаление изображений
        $imagesToDelete->each->delete();
    }

    /**
     * @param Collection $requestImages
     * @param Product $product
     *
     * @return void
     */
    private function createNew(Collection $requestImages, Product $product): void
    {
        // Изображения на создание
        $imagesToCreate = $requestImages->filter(function ($item) {
            return is_null($item->id);
        });

        // Создание новых изображений
        $imagesToCreate->map(function ($item) use ($product) {
            $path = app(SaveBase64ImageTask::class)->run($item->src, 'product-images');

            $product->images()->create([
                'url' => $path,
                'alt_text' => $product->name,
                'position' => $item->number,
                'is_main' => $item->number === 0,
            ]);
        });
    }

    /**
     * @param Collection $requestImages
     * @param Collection $existsImages
     * @param Product $product
     *
     * @return void
     */
    private function updatePosition(Collection $requestImages, Collection $existsImages, Product $product): void
    {
        $existsImagesToUpdate = $requestImages->filter(function ($item) {
            return !is_null($item->id);
        });

        $imagesData = $existsImagesToUpdate->map(function ($item) use ($existsImages, $product) {
            $currentData = $existsImages->find($item->id)->toArray();

            $newData = [
                'position' => $item->number,
                'is_main' => $item->number === 0,
            ];

            return array_merge($currentData, $newData);
        });

        ProductImage::upsert($imagesData->toArray(), ['id'], ['position', 'is_main']);
    }
}
