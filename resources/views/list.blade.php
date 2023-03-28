<x-app-layout>
  <x-slot name="header">
     @include('includes.header')
  </x-slot>

  <div class="py-12">
    @if (!$places->count())
        <div class="text-blue-900 px-6 py-4 rounded relative bg-gray-200 max-w-7x mx-auto">
          <span class="inline-block align-middle mr-8">There are no Locker in this time</span>
          </div> 
    @else
      <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-4 " >
        <div style="height: calc(100vh - 260px);
        overflow-y: scroll;">
          @foreach ($places as $place)
          <a href="{{route('place.show',[$place->id,$place->slug])}}" class="flex mb-5 bg-white border hover:bg-gray-400">
            <div class="flex-none w-48 relative ">
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
          </div>
        </a>
              
          @endforeach
        </div>

        <div class="me-3">
        <div id="mapid" style="height:720px"></div>
        </div>
          
      </div>
      @endif
  </div>
</x-app-layout>


<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script>
let longitude={!! $places->pluck('longitude') !!}
let latitude={!! $places->pluck('latitude') !!}

let map=L.map('mapid');
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
let greenIcon = L.icon({
  iconUrl: 'http://127.0.0.1:8000/icons/bike-map.svg',
  iconSize:     [40, 95], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
let markers=[];
for(let i=0; i < longitude.length; i++){
  markers.push(new L.marker([latitude[i],longitude[i]],{icon: greenIcon}).addTo(map));

  let group=new L.featureGroup(markers).getBounds();
  map.fitBounds([
    group
  ])
}
</script>