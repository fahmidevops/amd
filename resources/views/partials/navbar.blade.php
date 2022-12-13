<nav class="navbar navbar-expand-lg navbar-dark bg-danger bg-gradient">
    <div class="container">
        <a href="/"><img src="img/LogoNavbar.png" width="100px" height="50px"></a>
        {{-- <a class="navbar-brand" href="#">NAVBAR</a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "home") ? "active" : "" }}" href="/"><i class="bi bi-house"></i>Home</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link  {{ ($active === "about") ? "active" : "" }}" href="/about">About</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link  {{ ($active === "posts") ? "active" : "" }}" href="/posts">Posts</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link  {{ ($active === "agenda") ? "active" : "" }}" href="/agenda"><i class="bi bi-list-check"></i>Agenda</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link  {{ ($active === "categories") ? "active" : "" }}" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ ($active === "komponen") ? "active" : "" }}" href="/komponen">Komponen</a>
                </li> --}}
            </ul>

            
            <ul class="navbar-nav ms-auto">  {{-- Margin start/margin kiri auto biar ke kanan--}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"> <i class="bi bi-box-arrow-in-right"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                   {{-- ini hanya muncul jika user belum login --}}
                        <li class="nav-item">
                            <a class="nav-link {{ ($active === "login") ? "active" : "" }}" href="/login" ><i class="bi bi-box-arrow-in-right"></i> Login</a>
                        </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>