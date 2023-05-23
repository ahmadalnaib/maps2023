<x-app-layout>


  <div class="py-12">
    <div class="text-center mt-5 p-5">
      <h1 class="text-2xl mb-2">{{$place->name}}</h1>
      <small>{{$place->address}}</small>
    </div>
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-4 ">

   
      
        @foreach ($lockers as $locker)
    <div class="text-center border p-4 rounded-md">
      <h3>Locker {{ $locker->locker_name }}</h3>
      <ul  class="flex flex-wrap list-none p-0">
        @foreach ($locker->doors as $door)
            @if ($door->size==='big')
                <li data-door-id="{{ $door->id }}" class="inline-block m-0 py-20 px-10 border-2 rounded-md text-center {{ $door->rentals->isEmpty() ? 'bg-green-500 cursor-pointer' : 'bg-gray-500' }}">
                    {{ $door->door_number }} 
                </li>
            @else
                <li data-door-id="{{ $door->id }}" class="inline-block m-0 py-20 px-5 border-2 rounded-md text-center {{ $door->rentals->isEmpty() ? 'bg-green-500 cursor-pointer' : 'bg-gray-500' }}">
                    {{ $door->door_number }} 
                </li>
            @endif
        @endforeach
    </ul>
    
    
    @if ($locker->doors->filter(function($door) { return $door->rentals->isEmpty(); })->count() > 0)
      <form action="{{route('rent')}}" method="post">
          @csrf
  
          <input class="" type="hidden" name="locker_id" value="{{ $locker->id }}">
          <div class="form-group col-lg-6 mb-6 mt-5">
          <label for="door_id">Select a door:</label>
          <select name="door_id" id="door_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              @foreach ($locker->doors as $door)
              @if ($door->rentals->isEmpty())
                  <option value="{{ $door->id }}" @if (old('door_id') == $door->id) selected @endif>
                      Door {{ $door->door_number }} 
                    </option>
                    
                    @endif
              @endforeach
          </select>
          </div>
          <div class="form-group col-lg-6 mb-6">
            <label for="rental_period">Select rental period:</label>
            <select name="rental_period" id="rental_period" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($plans as $plan)
                    <option value="{{ $plan->id }}">{{ $plan->name }} - {{$plan->price}} &#x20AC</option>
                @endforeach
            </select>
        </div>

        
        <label for="door_id">Select a door:</label>
<select name="door_id" id="door_id">
    @foreach ($locker->doors as $door)
        <option value="{{ $door->id }}" @if (old('door_id') == $door->id) selected @endif>
            Door {{ $door->door_number }}
        </option>
    @endforeach
</select>

<label for="plan_id">Select a plan:</label>
<select name="plan_id" id="plan_id">
    @foreach ($locker->doors as $door)
        @foreach ($door->plans as $plan)
            <option value="{{ $plan->id }}">{{ $plan->name }} - {{ $plan->price }} &#x20AC;</option>
        @endforeach
    @endforeach
</select>

        
          <button id="rental-form" type="submit" class="text-white bg-red-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md w-full sm:w-auto px-20 py-5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Rent</button>
      </form>
      @else
      <p class="mt-10 bg-gray-100 p-5 rounded">We're sorry, but there are currently no locker doors available for rent. Please check back later or contact our customer service for further assistance.</p>
      @endif
  @endforeach
      </div>

      <div class="rounded-md">
      <div class="bg-white shadow-lg rounded p-5 mb-2">
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
        
          <a href="{{route('report.create')}}" class="border border-red-600 text-xs text-red-500 hover:bg-red-500 hover:text-gray-200 rounded p-1">
            <span class=""><i class="fa fa-exclamation-triangle"></i></span>  Rorbot 
          </a>
          @else
          {{-- <a href="{{route('login')}}" class="border border-teal-500 text-xs text-teal-500 hover:bg-teal-500 hover:text-gray-100 rounded mr-3 p-1">
            <span class=""><i class="fa bookmark-o  fa-lg"></i></span> Bookmark
          </a> --}}
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

const liElements = document.querySelectorAll('li[data-door-id]');
const selectElement = document.querySelector('#door_id');

liElements.forEach(li => {
  if (li.dataset.rented === 'true') {
    li.classList.add('text-gray-400', 'cursor-not-allowed');
  } else {
    li.addEventListener('click', () => {
      selectElement.value = li.dataset.doorId;
    });
  }
});


</script>

