<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lockport - Buchungsportal für sichere Fachvermietung für einfache und flexible Aufbewahrung von Gepäck und Fahrrädern. Teste uns!</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{url('fav/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('fav/favicon-16x16.png')}}">
    <link rel="manifest" href="{{url('fav/site.webmanifest')}}">
    <link rel="mask-icon" href="{{url('fav/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <meta property="og:title" content="@yield('og-title')" />
    <meta property="og:description" content="@yield('og-description')">
    <meta property="og:type" content="@yield('og-type')" />
    <meta property="og:url" content="@yield('og-url')" />
    <meta property="og:image" content="@yield('og-image')" />
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">


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
          <div id="success" style="display: none">success okkkk</div>
            <!-- Page Content -->
            <div class="flex flex-col flex-1">
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-gray-100 mt-8">
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
                     
                    </div>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js" charset="utf-8"></script>
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


        $('form').submit(function (event) {
        if ($(this).hasClass('submitted')) {
            event.preventDefault();
        }
        else {
            $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
            $(this).addClass('submitted');
        }
    });
    </script>
</body>
</html>
