<x-app-layout>
    <x-slot name="header">
    @include('includes/header')
    </x-slot>

    <div class="container my-12 mx-auto md:px-12 p-5">
         <h3 class="mb-4 mt-4 text-2xl">Bookmarks</h3>
         <hr/>
         @if(!count($bookmarks))
      <x-alert color="blue" message="There are no Bookmarks"/>
         @endif
         @foreach ($bookmarks as $place)
         <div class="flex mb-5 bg-white border">
           <div class="flex-none w-48 relative">
             <img src="{{$place->image}}" alt="" class="absolute inset-0 w-full object-contain h-full">
           </div>
           <div class="flex-auto p-6">
             <div class="flex flex-wrap">
             <h1 class="flex-auto text-xl font-semibold">{{$place->name}}</h1>
           </div>
           <div class="flex space-x-3 mb-4 text-sm font-medium mt-5">
             <div class="flex-auto flex space-x-3">
               {{$place->address}}
             </div>
           </div>
           <div class="flex space-x-3 mb-4 text-sm font-medium mt-5">
            <div class="flex-auto flex space-x-3">
                <a href="{{route('place.show',[$place->id,$place->slug])}}" class="w-20 h-8 flex items-center justify-center rounded-md border border-gray-300">view</a>
            </div>
           </div>
         </div>
       </div>
             
         @endforeach
    </div>
</x-app-layout>

