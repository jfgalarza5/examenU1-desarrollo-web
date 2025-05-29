<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow">
                    <div class="card-header bg-success text-white text-center">
                        <h4>Iniciar Sesión</h4>
                    </div>
                    <div class="card-body">

                        {{-- Estado de la sesión --}}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                <label class="form-check-label" for="remember_me">Recordarme</label>
                            </div>

                            <button type="submit" class="btn btn-success w-100">
                                <i class="fa fa-sign-in-alt"></i> Iniciar Sesión
                            </button>
                        </form>
                    </div>

                    <div class="card-footer text-center">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                        <br>
                        ¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
