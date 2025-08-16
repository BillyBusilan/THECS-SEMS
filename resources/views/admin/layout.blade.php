<head>
    @vite([
        'resources/css/app.css',
        'resources/css/components/sidebar.css',
        'resources/css/components/main.css',
        'resources/css/components/table.css',
        'resources/css/components/header.css',
        'resources/js/components/filter.js'
    ])
</head>
<body class="admin-body">
    <x-sidebar/>
    <main class="main-content">
        @yield('content')
    </main>

    <script src="{{ asset('js/components/sidebar.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/6dcd6bd374.js" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
