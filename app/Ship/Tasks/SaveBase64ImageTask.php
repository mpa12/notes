<?php

namespace App\Ship\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Storage;

class SaveBase64ImageTask extends Task
{
    public function run(
        string $base64String,
        string $folder = 'uploads',
        string $disk = 'public',
    ): string
    {
        list($meta, $data) = explode(',', $base64String);

        // Определяем расширение файла
        preg_match('/data:image\/(\w+);base64/', $meta, $matches);
        $extension = $matches[1] ?? 'jpg';

        // Декодируем Base64
        $imageData = base64_decode($data);

        // Генерируем имя файла
        $fileName = uniqid() . '.' . $extension;

        $path = "$folder/$fileName";

        Storage::disk($disk)->put($path, $imageData);

        return $path;
    }
}
