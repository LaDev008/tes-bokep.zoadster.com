<!doctype html>
<html>

<head>
    <title>Admin Panel | @yield('title') | Ladev </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('css.admin.layout')
    @yield('stylesheet')
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>

<body class="container-fluid d-flex justify-content-center align-items-center g-0 bg-dark overflow-auto">
    <div class="col-12 d-flex" style="min-height: 100vh">
        <aside class="col-2 bg-black text-white" style="min-height: 100vh">
            <header class="d-flex flex-column align-items-center">
                <x-nav-item routeName="dashboard" name="BERANDA" />
                <x-nav-item routeName="videos.index" name="DAFTAR VIDEO" />
                <x-nav-item routeName="categories.index" name="KATEGORI VIDEO" />
                <x-nav-item routeName="countries.index" name="KATEGORI NEGARA" />
                <x-nav-item routeName="tags.index" name="TAG VIDEO" />
                @if (Auth::user()->role_id < 4)
                    <x-nav-item routeName="users.index" name="USER LIST" />
                @endif
                <x-nav-item routeName="logout" name="LOGOUT" />
            </header>
        </aside>
        <main class="col bg-light text-black">
            @yield('content')
        </main>
    </div>
    <footer>

        <!-- place footer here -->
    </footer>

    @stack('scripts')
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>

    @livewireScripts
</body>

</html>
