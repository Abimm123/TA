<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bim Blog | {{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">

    <link rel="stylesheet" href="{{ asset('assets/css/sig-in.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/headers.css') }}" rel="stylesheet">
</head>

<body>


    <div class="container">
        <header class="blog-header lh-1 pt-3 mb-3">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand blog-header-logo text-body-emphasis" href="{{ route('post.index') }}">Bim
                        Blog</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                                    href="{{ route('post.index') }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}"
                                    href="{{ route('category.index') }}">Categories</a>
                            </li>
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Dashboard
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item {{ Request::is('dashboard') ? 'active' : '' }}"
                                                href="{{ route('dashboard.index') }}">Posts</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item {{ Request::is('dashboard/posts*') ? 'active' : '' }}"
                                                href="{{ route('posts.index') }}">My Posts</a></li>
                                    </ul>
                                </li>
                            @endauth
                            @can('admin')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Administator
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                                                href="{{ route('categories.index') }}">Post Categories</a></li>
                                        <li>
                                    </ul>
                                </li>
                            @endcan
                            @auth
                                <li class="nav-item">
                                    <span class="nav-link"> Welcome, {{ auth()->user()->username }}</span>
                                </li>
                            @endauth
                        </ul>
                        <form action="{{ route('post.index') }}" class="d-flex" role="search">
                            @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if (request('author'))
                                <input type="hidden" name="author" value="{{ request('author') }}">
                            @endif
                            <input type="search" class="form-control me-2 mb-2" placeholder="Search..." name="search"
                                value="{{ request('search') }}">
                        </form>
                        @auth
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary mb-2">Logout</button>
                            </form>
                        @else
                            <a class="btn btn-primary mb-2" href="{{ route('login.index') }}">Login</a>
                        @endauth
                    </div>
                </div>
            </nav>
        </header>
    </div>

    <main class="container">
        @yield('container')
    </main>



</body>

</html>
