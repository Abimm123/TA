<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bim Blog | {{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">

    <link rel="stylesheet" href="/assets/css/sig-in.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>



    <style>
        trix-toolbar [data-trix-button-group="file=tools"] {
            display: none;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/assets/css/blog.css" rel="stylesheet">
    <link href="/assets/css/headers.css" rel="stylesheet">
</head>

<body>


    <div class="container">
        <header class="blog-header lh-1 pt-3 mb-3">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand blog-header-logo text-body-emphasis" href="/">Bim Blog</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('posts') ? 'active' : '' }}" href="/posts">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}"
                                    href="/categories">Categories</a>
                            </li>
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Dashboard
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item {{ Request::is('dashboard') ? 'active' : '' }}"
                                                href="/dashboard">Posts</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item {{ Request::is('dashboard/posts*') ? 'active' : '' }}"
                                                href="/dashboard/posts">My Posts</a></li>
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
                                                href="/dashboard/categories">Post Categories</a></li>
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
                        <form action="/posts" class="d-flex" role="search">
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
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary mb-2">Logout</button>
                            </form>
                        @else
                            <a class="btn btn-primary mb-2" href="/login">Login</a>
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
