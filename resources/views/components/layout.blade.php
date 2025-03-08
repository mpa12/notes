@vite('resources/css/app.scss', 'resources/js/app.js')
        <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<header class="d-flex flex-wrap align-items-center justify-content-between px-2 py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="{{ url('/images/logo/logo.svg') }}" alt="Музыкальный кот">
            <span>Музыкальный кот</span>
        </a>
    </div>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        @php
            $menuItems = [
                ['name' => 'Главная', 'route' => 'web.home'],
                ['name' => 'Каталог', 'route' => 'web.catalog'],
                // ['name' => 'Оплата и доставка', 'route' => 'web.payment_and_delivery'],
                // ['name' => 'Контакты', 'route' => 'web.contacts'],
            ];
            $activeRoute = request()->route()->action['as'];
        @endphp
        @foreach($menuItems as $item)
            <li><a href="{{ route($item['route']) }}" @class(['nav-link', 'px-2', 'link-secondary' => $item['route'] === $activeRoute])>Каталог</a></li>
        @endforeach
    </ul>
    <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">Login</button>
        <button type="button" class="btn btn-primary">Sign-up</button>
    </div>
</header>
<div class="container">
    {{ $slot }}
</div>
</body>
</html>