


<section class="w-full px-8 text-gray-700 bg-red-600">
    <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <div class="relative flex flex-col md:flex-row">
            <a href="{{ route('home') }}">
                <x-application-mark class="block h-9 w-auto" />
            </a>
            <nav class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                <a href="{{route('home')}}" class="mr-5 font-medium leading-6 text-white hover:text-gray-900">{{__('nav.Find a locker')}}</a>
                <a href="{{route('how')}}" class="mr-5 font-medium leading-6 text-white hover:text-gray-900">{{__('nav.How it works')}}</a>
                <a href="{{route('price')}}" class="mr-5 font-medium leading-6 text-white hover:text-gray-900">{{__('nav.Pricing')}}</a>
                <a href="{{route('faq')}}" class="mr-5 font-medium leading-6 text-white hover:text-gray-900">{{__('nav.FAQ')}}</a>
                <x-lang-switcher />
            </nav>
        </div>
        @guest
        <div class="inline-flex items-center ml-5 space-x-6 lg:justify-end">
            <a href="{{route('login')}}" class="text-base font-medium leading-6 text-white whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-900">
               {{__('nav.Login')}}
            </a>
            <a href="{{route('register')}}" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-black border border-transparent rounded-md shadow-sm " data-rounded="rounded-md" data-primary="red-600">
               GET A BOX
            </a>
        </div>
        @endguest
        @auth
        <a class="bg-gray-50 py-2 px-4 rounded-md shadow-sm" href="{{route('dashboard')}}">Dashboard </a>
        

        @endauth
    </div>
</section>