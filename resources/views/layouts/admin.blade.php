<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BikeTec') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <!-- Styles -->
    @livewireStyles
    <script src="https://kit.fontawesome.com/ca11177b7a.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body>
    @include('includes.navigation-menu-admin')
    <x-banner />

    @if(session()->has('impersonate'))
    <div class="relative bg-indigo-600">
        <div class="max-w-screen-xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="pr-16 sm:text-center sm:px-16">
                <p class="font-medium text-white">
                    <span class="md:hidden">
                        You are impersonating {{auth()->user()->name}}
                    </span>
                    <span class="hidden md:inline">
                        You are impersonating {{auth()->user()->name}}
                    </span>
                    <span class="block sm:ml-2 sm:inline-block">
                        <a href="{{route('leave-impersonation')}}" class="text-white font-bold underline">
                            Leave Impersonation &rarr;
                        </a>
                    </span>
                </p>
            </div>
        </div>
    </div>
    @endif

    <div class="min-h-screen bg-white">
        <div class="flex">
            <!-- Sidebar -->
          {{-- @include('includes.sidebar') --}}

            <!-- Page Content -->
            <div class="flex flex-col flex-1">
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white mt-8">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="flex-1">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @if(session()->has('message'))
                            <div class="bg-green-200 text-green-800 px-3 py-2 rounded all-succ">
                                {{ session('message') }}
                            </div>
                        @elseif(session()->has('warning'))
                            <div class="bg-red-200 text-red-800 px-3 py-2 rounded">
                                <strong> {{ session()->get('warning') }}</strong>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="bg-red-200 text-red-800 px-3 py-2 rounded all-err">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    @stack('modals')
    @stack('scripts')

    @livewireScripts

    <script>
        setTimeout(function() {
            document.querySelector('.all-succ').remove();
        }, {{ session('timeout', 3000) }});
        setTimeout(function() {
            document.querySelector('.all-err').remove();
        }, {{ session('timeout', 5000) }});
    </script>
</body>
</html>
