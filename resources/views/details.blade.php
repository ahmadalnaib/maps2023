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
          <input type="hidden" id="name" value="{{$place->name}}">
          <input type="hidden" id="latitude" value="{{$place->latitude}}">
          <input type="hidden" id="longitude" value="{{$place->longitude}}">
        </div>
      </div>
      <div class="bg-white shadow-lg rounded p-4 h-52">
        <div class="p-5 bg-white shadow-sm">
          <h3>{{$place->user->name}}</h3>
          <p></p>
          <ul class="mt-3">
            <li><i class="fa fa-envelope"></i> {{$place->user->email}}</li>
          </ul>
        </div>
        <hr>
        <div class="p-3">
          @auth
          <a href="{{route('bookmark',$place->id)}}" class="border border-teal-500 text-xs text-teal-500 hover:bg-teal-500 hover:text-gray-100 rounded mr-3 p-1">
            <span class=""><i class="fa {{Auth::user()->alreadyBookmarked($place->id)? 'fa-bookmark':'fa-bookmark-o'}}  fa-lg"></i></span> Bookmark
          </a>
          <a href="{{route('report.create')}}" class="border border-red-500 text-xs text-red-500 hover:bg-red-500 hover:text-gray-200 rounded p-1">
            <span class=""><i class="fa fa-exclamation-triangle"></i></span>  Rorbot 
          </a>
          @else
          <a href="{{route('login')}}" class="border border-teal-500 text-xs text-teal-500 hover:bg-teal-500 hover:text-gray-100 rounded mr-3 p-1">
            <span class=""><i class="fa bookmark-o  fa-lg"></i></span> Bookmark
          </a>
          @endauth
        </div>
      </div>
    </div>
  </div>
</x-app-layout>


<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script>

let longitude=$('#longitude').val();
let latitude=$('#latitude').val();

let map=L.map('mapid',{
  center:[latitude,longitude],
  zoom:6
});
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
let greenIcon = L.icon({
  iconUrl: 'http://127.0.0.1:8000/icons/bike-map.svg',
  iconSize:     [40, 95], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
L.marker([latitude,longitude],{icon: greenIcon}).bindPopup($('#name').val()).addTo(map).openPopup();



</script>