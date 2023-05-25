<x-app-layout>


  <div class="py-12">
    <div class="text-center mt-5 p-5">
      <h1 class="text-2xl mb-2">{{$place->name}}</h1>
      <small>{{$place->address}}</small>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-4 ">
      @foreach ($lockers as $locker)
        <div class="text-center border p-4 rounded-md">
          <!-- ... -->
          <ul class="flex flex-wrap list-none p-0">
            @foreach ($locker->doors as $door)
                @php
                    $isRented = $door->rentals->isNotEmpty();
                    $doorClass = $isRented ? 'bg-gray-500' : ($door->size === 'big' ? 'bg-yellow-400' : 'bg-green-500');
                    $cursorClass = $isRented ? '' : 'cursor-pointer';
                @endphp
                <li data-door-id="{{ $door->id }}" class="inline-block m-0 py-20 px-{{ $door->size === 'big' ? '8' : '5' }} border-2 rounded-md text-center door-item {{ $doorClass }} {{ $cursorClass }}" @if ($isRented) disabled @endif>
                    {{ $door->door_number }} 
                </li>
            @endforeach
        </ul>
        
          
      
          @if ($locker->doors->filter(function($door) { return $door->rentals->isEmpty(); })->count() > 0)
      <form action="{{ route('rent') }}" method="post">
        @csrf
        <input class="" type="hidden" name="locker_id" value="{{ $locker->id }}">
        <div class="form-group col-lg-6 mb-6 mt-5">
          <label for="door_id">Select a door:</label>
          <select name="door_id" id="door_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="updatePlanOptions(this.value)">
            @foreach ($locker->doors as $door)
              @if ($door->rentals->isEmpty())
                <option value="{{ $door->id }}" data-door-id="{{ $door->id }}" @if (old('door_id') == $door->id) selected @endif>
                  Door {{ $door->door_number }}
                </option>
              @endif
            @endforeach
          </select>
        </div>
          
        <div class="form-group col-lg-6 mb-6">
          <label for="rental_period">Select rental period:</label>
          <select name="rental_period" id="rental_period" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <!-- Options will be dynamically updated by JavaScript -->
         
          </select>
        </div>
           <div class="mb-5">
            <div class="py-2 flex items-center justify-center  space-x-5">
              <div class="w-4 h-4 bg-gray-500 rounded-full "></div>Besetzt
              <div class="w-4 h-4 bg-green-500 rounded-full"></div>ein Fahrrad
              <div class="w-4 h-4 bg-yellow-400 rounded-full"></div>Doppelfahrrad  
           </div>

      </div> 
      <div class="form-group m-10">
       
<div class="flex items-center justify-center">
  <input  type="checkbox" id="accept_conditions" name="accept_conditions"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
  <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">terms and conditions</a>.</label>
</div>

      </div>
      
      <button id="rental-form" type="submit" class="text-white bg-red-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md w-full sm:w-auto px-20 py-5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" onclick="return validateForm()">Rent</button>

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
const plansByDoor = {!! json_encode($plansByDoor) !!};

const doorItems = document.querySelectorAll('.door-item');
const doorSelect = document.getElementById('door_id');
const planSelect = document.getElementById('rental_period');

// Function to update the rental period options based on the selected door
function updateRentalPeriodOptions() {
  const selectedDoorId = doorSelect.value;
  const doorPlans = plansByDoor[selectedDoorId];

  // Clear the rental period select options
  planSelect.innerHTML = '';

  if (doorPlans && doorPlans.length > 0) {
    doorPlans.forEach(plan => {
      const option = document.createElement('option');
      option.value = plan.id;
      option.textContent = `${plan.name} - ${plan.price} €`;
      planSelect.appendChild(option);
    });
  }
}

// Add change event listener to the door select box
doorSelect.addEventListener('change', updateRentalPeriodOptions);

// Set the initial rental period options for the first door
updateRentalPeriodOptions();

// Add click event listener to each door item
doorItems.forEach(door => {
  door.addEventListener('click', () => {
    if (!door.classList.contains('bg-gray-500')) {
      const selectedDoorId = door.dataset.doorId;
      doorSelect.value = selectedDoorId;
      updateRentalPeriodOptions();
    }
  });
});


function validateForm() {
    const acceptCheckbox = document.getElementById('accept_conditions');
    if (!acceptCheckbox.checked) {
      alert('Please accept the conditions.');
      return false;
    }
    return true;
  }
</script>

