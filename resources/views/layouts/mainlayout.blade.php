<!doctype html>
<html lang="en">

<head>
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    @include('css.guest.style')
    @yield('stylesheet')


</head>

<body style="min-height: 100vh;" class="container-fluid g-0 bg-dark">
    <header class="row g-0">
        <nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg py-3">
            <div class="container-lg">
                <a class="navbar-brand" href="/"><img src="/storage/page/logo.png" alt="" width="160px"
                        height="70px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="mainNavbar"
                    aria-labelledby="mainNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="mainNavbarLabel"><img src="/storage/page/logo.png"
                                alt="" width="160px" height="70px"></h5>
                        <button type="button" class="btn-close text-reset bg-danger" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form class="d-flex mt-3 mt-lg-0 d-lg-none">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <ul class="navbar-nav flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('videos.list') }}">Video</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="categories"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                                <div class="dropdown-menu" aria-labelledby="categories">
                                    @foreach ($categories as $category)
                                        <a class="dropdown-item"
                                            href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </li>

                            <li class="nav-item dropdown d-none d-lg-block">
                                <a class="nav-link dropdown-toggle" href="#" id="tags"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tags</a>
                                <div class="dropdown-menu" aria-labelledby="tags">
                                    @foreach ($tags as $tag)
                                        <a class="dropdown-item"
                                            href="{{ route('tag.show', $tag->slug) }}">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item mt-2 gap-2 d-flex flex-wrap d-lg-none">
                                @foreach ($tags as $item)
                                    <a href="{{ route('tag.show', $tag->slug) }}">
                                        <button class="pill-button">
                                            {{ $item->name }}
                                        </button>
                                    </a>
                                @endforeach
                            </li>
                        </ul>
                        <form class="d-none mt-3 mt-lg-0 d-lg-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="container-fluid container-lg">
        @yield('content')
    </main>
    <div class="separator"></div>
    <footer class="d-flex col-12 justify-content-center">
        <div class="col-3 text-center">
            <ul class="d-flex flex-column gap-3 flex-wrap col-12 text-white list-unstyled">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Video</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categories" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Kategori</a>
                    <div class="dropdown-menu" aria-labelledby="categories">
                        @foreach ($categories as $category)
                            <a class="dropdown-item"
                                href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-toggle" href="#" id="tags" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Tags</a>
                    <div class="dropdown-menu" aria-labelledby="tags">
                        @foreach ($tags as $tag)
                            <a class="dropdown-item"
                                href="{{ route('tag.show', $tag->slug) }}">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
        @yield('footer')
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    @stack('scripts')

</body>

</html>
