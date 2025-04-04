<x-app-layout>

    <x-authentication-card>
        
        <x-slot name="logo">
            <a href="{{ route('home') }}" title="Home">
                <img class="object-cover h-100 w-96  rounded-xl hidden md:block" src="{{ url('images/login/login.jpg') }}" alt="">
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-10">
                <p class="text-sm text-gray-600">
                    {{ __('login.Need an account?') }}
                    <a href="{{ route('register') }}" class="underline hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('login.Create one here') }}
                    </a>
                </p>
            </div>

            <div>
                <x-label for="email" value="{{ __('login.Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('login.Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('login.Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('login.Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('login.Log in') }}
                </x-button>
            </div>
        </form>

     
    </x-authentication-card>

</x-app-layout>
