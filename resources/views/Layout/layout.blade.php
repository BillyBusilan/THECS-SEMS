<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SEMS</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/inputs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/images.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modules/login.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
    @yield('content')

    @yield('scripts')
</body>
</html>