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
        @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/custom.css'])

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
      />
      <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <!-- Styles -->
        @livewireStyles
        <script src="https://kit.fontawesome.com/ca11177b7a.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    </head>
    <body >
        <x-banner />

        <div class="min-h-screen bg-white">
            @livewire('navigation-menu')


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
             
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @if (Auth::check() && Auth::user()->role_id == 2)
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
                    @endif
                   
                </div>
                {{ $slot }}
            </main>
        </div>
        <div class="mt-60">

            @include('includes.footer')
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
            

         
                        // setTimeout(function() {
                        //     document.querySelector('.all-succ').remove();
                        // }, {{ session('timeout', 3000) }});
                        // setTimeout(function() {
                        //     document.querySelector('.all-err').remove();
                        // }, {{ session('timeout', 5000) }});


                        // swiper


const swiper = new Swiper('.swiper', {
  slidesPerView: 1,
  spaceBetween: 30,
 
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 30,
    },
    500: {
      slidesPerView: 1,
      spaceBetween: 30,
    },
    700: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    800: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    900: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
  autoplay: {
   delay: 5000,
   pauseOnMouseEnter:true, 
    disableOnInteraction: true,
    reverseDirection: false,
    
 },
 
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
                  
        </script>
    </body>
</html>
