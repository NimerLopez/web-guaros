<x-layouts.admin>

@section('header')
<h1 class="h4 mb-0 text-gray-800">
    <i class="fas fa-sign-in-alt"></i> {{ __('Acceso al Sistema') }}
</h1>
@endsection

<div class="container-fluid">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-xl-4 col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="h5 mb-0">{{ __('Iniciar Sesión') }}</h3>
                            <img src="{{ asset('images/logo-white.png') }}" alt="Logo El Guaro" height="30">
                        </div>
                    </div>
                    
                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                            @csrf
                            
                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold">{{ __('Correo Electrónico') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                           placeholder="usuario@elguaro.com">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-bold">{{ __('Contraseña') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                           name="password" required autocomplete="current-password"
                                           placeholder="••••••••">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Mantener sesión activa') }}
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-lg py-3 fw-bold">
                                    <i class="fas fa-sign-in-alt me-2"></i> {{ __('Ingresar') }}
                                </button>
                            </div>

                            @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="text-decoration-none" href="{{ route('password.request') }}">
                                    <i class="fas fa-question-circle me-1"></i> {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            </div>
                            @endif
                        </form>
                    </div>
                    
                    <div class="card-footer bg-light py-3 text-center">
                        <small class="text-muted">{{ __('Sistema de Gestión El Guaro') }} &copy; {{ date('Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>