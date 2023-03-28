<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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
    <body >
        <x-banner />

        <div class="min-h-screen bg-white">
            @livewire('navigation-menu')

            <div class="bg-white  mt-20">

                <h1 class="text-7xl text-center font-black">Find a Bike locker near you</h1>
                <p class="text-center text-3xl text-gray-400 mt-4">Enter a street, Address or postcode and we’ll show your nearest lockers
                   </p>
                   <p class="text-center text-3xl text-gray-400 mt-2">Lockers are available 24 hours a day, 7 days a week</p>
            </div>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white mt-8">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <script>
            $(function(){
                $('#address').on('keyup',function(){
                
                    let address=$(this).val();
                    $('#address-list').fadeIn();
                    $.ajax({
                        url:"{{route('auto-complete')}}",
                        type:'GET',
                        data:{"address":address}
                    }).done(function(data){
                        $('#address-list').html(data);
                    })
                    $('#address-list').on('click','li',function(){
                        $('#address').val($(this).text());
                        $('#address-list').fadeOut();
                    })
                })
            })
            
        </script>
    </body>
</html>
