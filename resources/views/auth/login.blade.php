<x-guest-layout>
    <style>
        .body{
            background: #000000;
        }
    </style>
    <!-- Comienzo del login-->
    <div class="container w-4/5 mx-auto mt-3 bg-white rounded shadow">
        <div class="lg:flex lg:items-stretch">

            <div class="lg:w-1/3 bg-cover bg-center lg:rounded-l-lg" style="background-image: url('{{ asset("img/portadatienda.jpg") }}')">
            </div>

            <div class="lg:w-1/2 bg-white p-10 lg:rounded-r-lg ml-0 md:ml-8">
                <div class="text-center">
                    <img src="{{ asset("img/logo.png") }}" width="48" alt="">
                </div>
                <h2 class="font-semibold text-center text-2xl py-3">Bienvenido a Stylo Store</h2>
                <!--Verificación de la validación de inicio de sesión-->
                <x-validation-errors class="mb-2" />
                @if (session('status'))
                    <div class="mb-4 text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <!--LOGIN-->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">  <!--Email-->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">{{ __('Correo Electrónico') }}</label>
                        <input id="email" type="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="text-red-500 text-sm mt-1" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4"> <!-- Contraseña-->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">{{ __('Contraseña') }}</label>
                        <input id="password" type="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">

                        @error('password')<!-- Comprueba la contraseña-->
                        <span class="text-red-500 text-sm mt-1" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-4"><!-- Contraseña olvidada-->
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs text-gray-600">¿Has olvidado la contraseña?</a>
                        @endif
                    </div>

                    <div class="mb-4 flex items-center">
                        <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="text-sm text-gray-700" for="remember">{{ __('Recuérdame') }}</label>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="w-full py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-lg focus:outline-none focus:shadow-outline-blue focus:border-blue-700">
                            {{ __('Iniciar Sesión') }}
                        </button>
                    </div>

                    <div class="my-3 text-center">
                        <span class="text-gray-600">¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-blue-500">Regístrate</a></span>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col text-right">
                                <a href="/" class="text-gray-500">Menú principal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
