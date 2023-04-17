<x-app-layout>

    <x-slot name="header">
    @include('includes/header')

    </x-slot>
    <div class="container my-12 mx-auto md:px-12 p-5">
      <div class="mb-8">
          <div id="mapid" style="height:700px" class="rounded-lg"></div>
          </div> 
        </div>
        <div class=" bg-slate-100 p-40">
          <h2 class="text-6xl font-black">Premium Lockers</h2>
          <div class="container my-12 mx-auto md:px-12 p-5">
          {{__('actions.Title')}}
     
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            @foreach($categories as $category)
            <div class="swiper-slide"  >
          <a href="{{route('category.show',$category->slug)}}" style="background-image: url({{ $category->image }});"  class="app-gallery-item same"
          ><div>
            <h2 class="text-3xl font-black truncate overflow-hidden">{{$category->title}}</h2>
           
          </div></a
        >
  

      </div>
          @endforeach
        </div>
        
        <div class="swiper-button-next text-red-600" style="color:  rgb(220 38 38)"></div>
        <div class="swiper-button-prev text-red-600" style="color:  rgb(220 38 38)"></div>
      </div>

      </div>   
    </div>
    <div class="container my-12 mx-auto md:px-12 p-5">
      
      <h1 class="text-6xl font-black mb-4">Recently Added</h1>
            <div class="m-8">
                </div>   
                
        <div class="flex flex-wrap -mx-1 lg:-mx-4 ">    
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            @foreach($places as $place)
    

    <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden mb-4 swiper-slide' data-swiper-autoplay="5000">
        <div class='max-w-md mx-auto'>
          <div class='h-[236px]' style='background-image:url({{ $place->image }});background-size:cover;background-position:center'>
           </div>
          <div class='p-4 sm:p-6'>
            <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'> {{ $place->name }}</p>
            <div class='flex flex-row'>
           
            </div>
            <p class='text-[#7C7C80] font-[15px] mt-6'>{{ $place->address }}</p>


              <a  href='{{route('place.show',[$place->id,$place->slug])}}' class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#CE111E] rounded-[14px] hover:bg-[#CE111E] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80 text-white'>
                  View 
              </a>
         
       
          </div>
        </div>
    </div>

            @endforeach
            </div>
            <div class="swiper-button-next text-red-600" style="color:  rgb(220 38 38)"></div>
            <div class="swiper-button-prev text-red-600" style="color:  rgb(220 38 38)"></div>
          </div>
        </div>
    </div>
</x-app-layout>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

<!-- JavaScript code to create the map -->
<script>
  let longitude={!! $places->pluck('longitude') !!}
  let latitude={!! $places->pluck('latitude') !!}
  let address={!! $places->pluck('address') !!}
  
  let map=L.map('mapid');
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
  map.locate({setView:true,maxZoom:6});
  
  let greenIcon = L.icon({
    iconUrl: 'http://127.0.0.1:8000/icons/bike-map.svg',
    iconSize: [40, 95],
    shadowSize: [50, 64],
    iconAnchor: [22, 94],
    shadowAnchor: [4, 62],
    popupAnchor: [-3, -76]
  });
  
  let markers=[];
  
  @foreach($places as $place)
    // Create the link that opens the locker dynamically using the Laravel route function
    let placeSlug = '{{ Str::slug($place->address) }}';
    let lockerUrl = "{{route('place.show',[$place->id,$place->slug])}}";
    let lockerLink = lockerUrl.replace(':place', placeSlug).replace(':slug', '{{ $place->slug }}');
    
    // Add the link to the marker's popup
    let popupContent = '<p>' + '{{ $place->address }}' + '</p>' + '<a href="' + lockerLink + '">Open Locker</a>';
    
    markers.push(new L.marker([{{ $place->latitude }},{{ $place->longitude }}], {icon: greenIcon})
      .addTo(map)
      .bindPopup(popupContent)
      .openPopup()
    );
  @endforeach
  
  let group=new L.featureGroup(markers).getBounds();
  map.fitBounds([group]);
</script>

