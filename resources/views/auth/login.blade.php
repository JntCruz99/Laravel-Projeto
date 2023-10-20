<x-guest-layout>
<link href="{{ asset('css/styleslogin.css') }}" rel="stylesheet">
<div class="container">
    <div class="autentic">

        <div name="logo" class="x-authentication-card-logo">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256">
<g fill="#fd6d00" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(2,2)"><path d="M125,28.7l-33.8,-12c-0.8,-0.3 -1.6,-0.2 -2.3,0.1c-1.1,0.5 -59.9,21.3 -59.9,21.3c-1.5,0.5 -2.5,1.9 -2.5,3.5v14c0,1.3 0.8,2.4 2,2.8l7.8,2.8c2,0.7 4,-0.7 4,-2.8v-11.7c0,-1.6 1,-3 2.5,-3.5l53.1,-18.4l19.2,6.8l-52.1,18.3v0c-1.1,0.4 -2,1.5 -2,2.8v60.8l-54,-19.1v-60.8l58,-20.5c1.6,-0.6 2.4,-2.3 1.8,-3.8c-0.6,-1.6 -2.3,-2.4 -3.8,-1.8l-60,21.2c-1.2,0.4 -2,1.6 -2,2.8v65c0,1.3 0.8,2.4 2,2.8l60,21.2c0.3,0.1 0.7,0.2 1,0.2c0.2,0 0.3,0 0.5,0h0.1c0.1,0 0.2,-0.1 0.4,-0.1v0l60,-21.2c1.2,-0.4 2,-1.6 2,-2.8v-65v0c0,-1.4 -0.8,-2.5 -2,-2.9z"></path></g></g>
</svg>
</div>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-green-600 text-sm font-medium">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="mt-8">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Lembre-me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a senha?') }}
                    </a>
                @endif

                <x-button>
                    {{ __('Entrar') }}
                </x-button>
            </div>
        </form>
</div>
    </div>
</x-guest-layout>
