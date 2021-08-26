<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

        <title>@section('title') Тестовое Хваловские Воды @show</title>
    </head>

    <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                Статейник
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @if ('index' === Route::currentRouteName()) active @endif" aria-current="page" href="{{ route('index') }}">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (str_starts_with(Route::currentRouteName(), 'article.')) active @endif" href="{{ route('article.index') }}">Каталог статей</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="pt-lg-5">
        @section('content')
        @show()
    </div>
    </body>

    <script src="{{ mix('/js/app.js') }}"></script>

    @section('javascript')
    @show()
</html>
