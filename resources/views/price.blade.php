<x-app-layout>
    <section class="relative w-full overflow-hidden bg-white " >
        <div class="absolute top-0 left-0 z-10 hidden mt-20 -ml-32 scale-110 blur-xl opacity-70 2xl:block">
        
        </div>
        <div class="relative z-20 flex items-center justify-center max-w-5xl px-10 py-24 mx-auto md:justify-start md:py-32">
            <div class="relative z-20 flex flex-col items-start max-w-md space-y-8">
                <p class="font-bold tracking-wider uppercase"></p>
                <p class="text-3xl font-extrabold">{{$price->main_title}}</p>
                <p class="text-[#5f5843] font-medium">{{$price->main_subtitle}}</p>
                <a href="{{route('register')}}" class="inline-block w-full px-5 py-4 font-bold text-center text-white bg-black md:w-auto">{{__('nav.Booking')}}</a>
            </div>
        </div>
        <div class="absolute top-0 right-0 hidden w-1/2 h-full md:block">
            <img class="object-cover w-full h-full" src="{{ asset('/images/howpage/bike.jpg') }}">
        </div>
    </section>
</x-app-layout>