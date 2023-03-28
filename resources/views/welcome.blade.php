<x-app-layout>

    <x-slot name="header">
    @include('includes/header')
    </x-slot>

    <div class="container my-12 mx-auto md:px-12 p-5">
        <div class="mb-8">
            <div id="mapid" style="height:600px"></div>
            </div> 
            <div class="m-8">
                <h1 class="text-4xl ">Recently Added</h1>
                </div>   
        <div class="flex flex-wrap -mx-1 lg:-mx-4">    
            @foreach($places as $place)
    

    <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
        <div class='max-w-md mx-auto'>
          <div class='h-[236px]' style='background-image:url({{ $place->image }});background-size:cover;background-position:center'>
           </div>
          <div class='p-4 sm:p-6'>
            <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'> {{ $place->name }}</p>
            <div class='flex flex-row'>
           
            </div>
            <p class='text-[#7C7C80] font-[15px] mt-6'>{{ $place->address }}</p>


              <a target='_blank' href='{{route('place.show',[$place->id,$place->slug])}}' class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#CE111E] rounded-[14px] hover:bg-[#CE111E] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80 text-white'>
                  View 
              </a>
         
       
          </div>
        </div>
    </div>

            @endforeach
        </div>
    </div>
</x-app-layout>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script>
let longitude={!! $places->pluck('longitude') !!}
let latitude={!! $places->pluck('latitude') !!}
let address={!! $places->pluck('address') !!}
let map=L.map('mapid');
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
map.locate({setView:true,maxZoom:6});
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
  markers.push(new L.marker([latitude[i],longitude[i]],{icon: greenIcon}).addTo(map).bindPopup(address[i]).openPopup());

  let group=new L.featureGroup(markers).getBounds();
  map.fitBounds([
    group
  ])
}
</script>