<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://use.fontawesome.com/509a76b82c.js"></script>
    <meta charset="utf-8">
    <title>@yield('title', 'Blueprints')</title>
    <meta name="description" content="@yield('description', 'Ideas Blueprints')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @stack('head')
</head>
<body>
    <nav class="nav_container">
        <div class="brand">
            <a href="/"><img src="{{ asset('images/logo@2x.png') }}" alt="Happy P3"></a>
            <h1>Blueprint</h1>
        </div>
    </nav>
    <div class="main_container">
        @if(session('alert'))
        <div class='alert'>{{ session('alert') }}</div>
        @endif
        @yield('content')
    </div>

    @stack('body')
</body>
</html>
