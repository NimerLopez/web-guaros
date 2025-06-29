<x-layouts.admin>
@section('title', 'Panel de Administración')

<style>
    body {
        overflow-x: hidden;
    }
    .sidebar {
        min-height: 100vh;
    }
    .sidebar .nav-link.active {
        background-color: rgba(255, 255, 255, 0.1);
        font-weight: bold;
    }
    .sidebar .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.15);
    }
</style>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('home') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                            <i class="fas fa-tags me-2"></i> Categorías
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/products*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                            <i class="fas fa-boxes me-2"></i> Productos
                        </a>
                    </li>

                    <li class="nav-item mt-3">
                        <a class="nav-link text-white" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            
            <!-- Botón menú móvil -->
            <button class="btn btn-dark d-md-none mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                <i class="fas fa-bars"></i> Menú
            </button>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">@yield('title')</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    @yield('actions')
                </div>
            </div>

            <!-- Alertas -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Contenido principal -->
            @yield('content')
        </main>
    </div>
</div>

</x-layouts.admin>
