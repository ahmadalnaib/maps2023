<x-app-layout>

    <x-slot name="header">
    @include('includes/header')

    </x-slot>
    <div class="container my-12 mx-auto md:px-12 p-5">
      <div class="mb-8">
          <div id="mapid" style="height:700px" class="rounded-lg"></div>
          </div> 
        </div>
        {{-- <div class="bg-slate-100 p-40">
          <h2 class="w-full mx-auto text-4xl font-extrabold leading-none text-left text-gray-900 sm:text-5xl md:text-7xl ">{{__('index.Premium Lockers')}}</h2>
          <div class="container my-12 mx-auto md:px-12 p-5">
   
   
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
    </div> --}}
    <div class="bg-slate-100 p-20">
    <div class="container my-12 mx-auto md:px-12 p-5">
      <h1 class="w-full mx-auto text-4xl font-extrabold leading-none text-left text-gray-900 sm:text-5xl md:text-7xl mb-4">{{__('index.Premium Lockers')}}</h1>
            <div class="m-8">
                </div>   
                
        <div class="flex flex-wrap -mx-1 lg:-mx-4 ">    
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            @foreach($categories as $category)
    

    <a  href='{{route('category.show',$category->slug)}}'  style='background-image:url({{$category->image }});background-size:cover;background-position:center' class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden mb-4 swiper-slide' data-swiper-autoplay="5000">
        <div class='max-w-lg mx-auto'>
          <div class='h-96 '> 
           </div>
          <div class='p-4 sm:p-8'>
            <p class='w-full mx-auto text-2xl font-extrabold leading-none text-left text-white sm:text-5xl md:text-3xl mb-4'> {{ $category->title }}</p>
            <div class='flex flex-row'>
           
            </div>
          
         
       
          </div>
        </div>
    </a>

            @endforeach
            </div>
            <div class="swiper-button-next text-red-600" style="color:  rgb(220 38 38)"></div>
            <div class="swiper-button-prev text-red-600" style="color:  rgb(220 38 38)"></div>
          </div>
        </div>
    </div>
  </div>
    <div class="container my-12 mx-auto md:px-12 p-5">
      
      <h1 class="w-full mx-auto text-4xl font-extrabold leading-none text-left text-gray-900 sm:text-5xl md:text-7xl">{{__('index.Recently Added')}}</h1>
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
                  {{__('index.View')}} 
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

<script>
  let places = {!! $places !!};

  let map = L.map('mapid', { maxZoom: 6 });
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

  let greenIcon = L.icon({
    iconUrl: '{{ asset("images/icons/bike-map.svg") }}',
    iconSize: [40, 95],
    shadowSize: [50, 64],
    iconAnchor: [22, 40],
    shadowAnchor: [4, 62],
    popupAnchor: [-3, -76]
  });

  let markers = [];

  for (let i = 0; i < places.length; i++) {
    let place = places[i];

    // Filter places for Germany

      let marker = L.marker([place.latitude, place.longitude], { icon: greenIcon })
        .addTo(map);

      // Create a tooltip element with the address
      let tooltip = L.tooltip({
        permanent: true,
        direction: 'top',
        className: 'address-tooltip',
      }).setContent(place.address);

      // Show the tooltip when hovering over the marker
      marker.on('mouseover', function () {
        this.bindTooltip(tooltip).openTooltip();
      });

      // Hide the tooltip when the mouse leaves the marker
      marker.on('mouseout', function () {
        this.unbindTooltip();
      });

      // Replace the placeholders in the URL with the actual values
      let detailsUrl = `{{ route('place.show', [':place', ':slug']) }}`;
      detailsUrl = detailsUrl.replace(':place', place.id).replace(':slug', place.slug);

      // Add click event listener to open the details page when marker is clicked
      marker.on('click', function () {
        window.location.href = detailsUrl;
      });

      markers.push(marker);
    }
  

  if (markers.length > 0) {
    let group = new L.featureGroup(markers).getBounds();
    map.fitBounds(group);
  } else {
    // No places to display in Germany, show a default location on the map
    map.setView([51.1657, 10.4515], 6);
  }

</script>

