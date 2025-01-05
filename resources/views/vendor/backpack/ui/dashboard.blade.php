@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type' => 'card',
        'content' => [
            'header' => 'Test header',
            'body' => 'Test body',
        ]
    ];
@endphp

@section('content')
@endsection
