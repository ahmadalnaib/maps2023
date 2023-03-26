<x-app-layout>
  <x-slot name="header">
  @include('includes/header')
  </x-slot>

  <div class="py-12">
    <div class="text-center mt-5 p-5">
      <h1 class="text-2xl mb-2">{{$place->name}}</h1>
      <small>{{$place->address}}</small>
    </div>
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 mt-5 gap-5">
      <div class="bg-white shadow-lg rounded p-5 col-span-2">
        <div>
          <h1 class="mb-4 text-2xl">About the Place</h1>
          <p class="text-sm">{{$place->overview}}</p>
        </div>
        <div class="mt-5">
          <h3 class="mb-4 text-2xl">Address</h3>
          <div id="mapid" style="height: 350px"></div>
          <input type="hidden" id="name" value="">
          <input type="hidden" id="latitude" value="">
          <input type="hidden" id="longitude" value="">
        </div>
      </div>
      <div class="bg-white shadow-lg rounded p-4 h-52">
        <div class="p-5 bg-white shadow-sm">
          <h3>{{$place->user->name}}</h3>
          <p></p>
          <ul class="mt-3">
            <li><i class="fa fa-envelope"></i>{{$place->user->email}}</li>
          </ul>
        </div>
        <hr>
        <div class="p-3">
          <a href="" class="border border-teal-500 text-xs text-teal-500 hover:bg-teal-500 hover:text-gray-100 rounded ml-3 p-1">
            <span class=""><i class="fa fa-bookmark  fa-lg"></i></span> Bookmark
          </a>
          <a href="{" class="border border-red-500 text-xs text-red-500 hover:bg-red-500 hover:text-gray-200 rounded p-1">
            <span class=""><i class="fa fa-warning"></i></span>  Rorbot 
          </a>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
