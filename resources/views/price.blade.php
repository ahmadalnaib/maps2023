<x-app-layout>
    <div class="w-full bg-white tails-selected-element" contenteditable="true">
        <div class="flex flex-col items-center justify-center px-8 py-12 mx-auto space-y-5 text-center opacity-90 max-w-7xl sm:px-0 lg:space-y-10">
            <h1 class="text-4xl font-black text-black lg:text-5xl">{!! $price->main_title !!}</h1>
            <p class="max-w-lg text-sm lg:max-w-xl lg:text-lg">{!! $price->main_subtitle !!}</p>
            <a href="#_" class="px-5 py-2 text-lg text-white bg-black rounded-full">Learn More</a>
        </div>
        <div class="w-full md:pb-10 lg:pb-16">
            <div class="h-auto max-w-2xl mx-auto overflow-hidden sm:rounded-lg md:max-w-3xl lg:max-w-4xl">
                <img class="object-center w-full" src="{{ asset('/images/howpage/bike.jpg') }}">
            </div>
        </div>
    </div>
</x-app-layout>