{{-- image_multiple_field field --}}
@php
    $field['value'] = old_empty_or_null($field['name']) ?? ($field['value'] ?? ($field['default'] ?? ''));
@endphp

<div class="images-upload">
    <div class="images-upload__label">
        <label>{{ $field['label'] }}</label>
        <p>
            <span>1 из 10</span>
        </p>
    </div>
    <div class="images-upload__images">
        @foreach($field['value'] as $image)
            <div class="images-upload__images__item" data-id="{{ $image->id }}">
                <img alt="{{ $image->alt_text }}" src="{{ $image->full_url }}">
                <span class="images-upload__images__item__text"></span>
                <span class="images-upload__images__item__close bi bi-x"></span>
            </div>
        @endforeach
        <div class="images-upload__images__item images-upload__images__item--button">
            <label class="bi bi-camera">
                <input type="file" accept="image/gif,image/png,image/jpeg,image/pjpeg,image/heic">
            </label>
        </div>
    </div>
    <input type="hidden" name="{{ $field['name'] }}-custom" data-name="images-json">
</div>
