<x-app-layout>
    <div class="py-12 container mx-auto">
        <div class="text-center m-5 p-5">
            <h1 class="text-7xl font-extrabold mb-2">{{ $place->name }}</h1>
            <p class="text-5xl text-gray-400">{{ $place->address }}</p>
        </div>
        <div class="max-w-9xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-4 ">

            <div class="text-center border p-4 rounded-md">

              <div class="flex flex-wrap">
                <div class="w-full md:w-full">
                  <ul class="list-none p-0">
                    @foreach ($system->boxes as $box)
                        @if (in_array($box->id, $firstFloorBoxes))
                            
                            @php
                                $isRented = $box->rentals->isNotEmpty();
                                $isEndTimePassed = $isRented && $box->rentals->last()->end_time->isPast();
                                $cursorClass = $isRented  ? '' : 'cursor-pointer';
                                
                                $bgColorClass = $isRented ? ($isEndTimePassed ? 'bg-green-500' : 'bg-red-500') : ($box->boxType->big ? 'bg-green-500 p-4' : 'bg-green-500');
                            @endphp
                            @if ($box && $box->boxType)
                                <li data-box-id="{{ $box->id }}"
                                    class="first-floor inline-block m-0 py-12  border-2 rounded-md text-center box-item p-4 {{ $bgColorClass }} {{ $cursorClass }}"
                                    @if ($isRented) disabled @endif>
                                    {{ $box->number }}

                                    @if ($box && $box->boxType && $box->boxType->ebike_option)
                                        <div><img src="{{ asset('/images/charge.svg') }}" alt="Charge"></div>
                                    @endif

                                </li>
                            @endif
                        @endif
                    @endforeach
                  </ul>
                </div>
              </div>
                <div class="w-full md:w-full">
                  <ul class="list-none p-0">

                    @foreach ($system->boxes as $box)
                        @if (in_array($box->id, $secondFloorBoxes))
                            
                            @php
                                $isRented = $box->rentals->isNotEmpty();
                                $isEndTimePassed = $isRented && $box->rentals->last()->end_time->isPast();
                                $cursorClass = $isRented ? '' : 'cursor-pointer';
                                
                                $bgColorClass = $isRented ? ($isEndTimePassed ? 'bg-green-500' : 'bg-red-500') : ($box->boxType->big ? 'bg-green-500 p-4' : 'bg-green-500');
                            @endphp
                            @if ($box && $box->boxType)
                                <li data-box-id="{{ $box->id }}"
                                    class="second-floor inline-block m-0 py-12  border-2 rounded-md text-center box-item p-4 {{ $bgColorClass }} {{ $cursorClass }}"
                                    @if ($isRented) disabled @endif>
                                    {{ $box->number }}

                                    @if ($box && $box->boxType && $box->boxType->ebike_option)
                                        <div><img src="{{ asset('/images/charge.svg') }}" alt="Charge"></div>
                                    @endif

                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
              </div>
        
                @if (
                    $system->boxes->filter(function ($box) {
                            return $box->rentals->isEmpty() || $box->rentals->last()->end_time->isPast();
                        })->count() > 0)
                    <form action="{{ route('rent') }}" method="post">
                        @csrf
                        <input class="" type="hidden" name="system_id" value="{{ $system->id }}">
                        <div class="form-group col-lg-6 mb-6 mt-5">
                            <label for="box_id">{{ __('details.Select a Box:') }}</label>
                            <select name="box_id" id="box_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onchange="updatePlanOptions(this.value)">
                                @foreach ($system->boxes as $box)
                                    @if ($box->rentals->isEmpty() || $box->rentals->last()->end_time->isPast())
                                        <option value="{{ $box->id }}" data-box-id="{{ $box->id }}"
                                            @if (old('box_id') == $box->id) selected @endif>
                                            {{ __('details.Locker') }}- {{ $box->number }}

                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-6 mb-6">
                            <label for="rental_period">{{ __('details.Select rental period:') }}</label>
                            <select name="rental_period" id="rental_period"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <!-- Options will be dynamically updated by JavaScript -->


                            </select>
                        </div>
                        <div class="mb-5">
                            <div class="py-2 flex items-center justify-center  space-x-5 flex-wrap">
                                <div class="w-4 h-4 bg-green-500 rounded-full mr-1"></div> {{ __('details.Free') }}
                                <div class="w-4 h-4 bg-red-500 rounded-full mr-1"></div> {{ __('details.Booked') }}
                                <div class="w-4 h-4 bg-gray-400 rounded-full mr-1"></div>
                                {{ __('details.Not available') }}
                                <div><img class="mr-1" src="{{ asset('/images/charge.svg') }}" alt="Charge"></div>
                                {{ __('details.Charge') }}
                            </div>

                        </div>
                        <div class="form-group m-10">

                            <div class="flex items-center justify-center">
                                <input type="checkbox" id="accept_conditions" name="accept_conditions"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="link-checkbox"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('details.I agree with the') }}
                                    <a target="__blank" href="{{url('terms/AGB_lockport.online.pdf')}}"
                                        class="text-blue-600 dark:text-blue-500 hover:underline">{{ __('details.terms and conditions') }}</a>.</label>
                            </div>

                        </div>

                        <button id="rental-form" type="submit"
                            class="text-white bg-red-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md w-full sm:w-auto px-20 py-5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                            onclick="return validateForm()">{{ __('details.Checkout') }} </button>


                    </form>
                @else
                    <p class="mt-10 bg-gray-100 p-5 rounded">
                        {{ __("details.We're sorry, but there are currently no locker doors available for rent. Please check back later or contact our customer service for further assistance.") }}
                    </p>
                @endif

            </div>
            <div class="rounded-md">
                <div class="bg-white shadow-lg rounded p-5 mb-2">

                    <div class="mt-5">
                        <h3 class="mb-4 text-2xl">{{ __('details.Address') }}</h3>
                        <div id="mapid" style="height: 350px"></div>
                        <input type="hidden" id="name" value="{{ $place->name }}">
                        <input type="hidden" id="latitude" value="{{ $place->latitude }}">
                        <input type="hidden" id="longitude" value="{{ $place->longitude }}">
                    </div>
                </div>
                <div class="bg-white shadow-lg rounded p-4 ">
                    <div class="p-5 bg-white shadow-sm">
                        <div class="max-w-full">
                            <h1 class="mb-4 text-2xl">{{ __('details.About the Place') }}</h1>
                            <p class="text-sm break-words"> {!! $place->overview !!}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="p-3">
                        @auth

                            <a href="{{ route('report.create') }}"
                                class="border border-red-600 text-xs text-red-500 hover:bg-red-500 hover:text-gray-200 rounded p-1">
                                <span class=""><i class="fa fa-exclamation-triangle"></i></span> Rorbot
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


<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script>
    const plansByBox = {!! json_encode($plansByBox) !!};

    const boxItems = document.querySelectorAll('.box-item');
    const boxSelect = document.getElementById('box_id');
    const planSelect = document.getElementById('rental_period');


    let longitude = $('#longitude').val();
    let latitude = $('#latitude').val();

    let map = L.map('mapid', {
        center: [latitude, longitude],
        zoom: 6
    });
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
    let greenIcon = L.icon({
        iconUrl: 'http://127.0.0.1:8000/images/icons/bike-map.svg',
        iconSize: [40, 95], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
    L.marker([latitude, longitude], {
        icon: greenIcon
    }).bindPopup($('#name').val()).addTo(map).openPopup();

    // Function to update the rental period options based on the selected door
    function updateRentalPeriodOptions() {
        const selectedBoxId = boxSelect.value;
        const boxPlans = plansByBox[selectedBoxId];

        // Clear the rental period select options
        planSelect.innerHTML = '';

        if (boxPlans && boxPlans.length > 0) {
            boxPlans.forEach(plan => {
                const option = document.createElement('option');
                option.value = plan.id;
                option.textContent = `${plan.name} - ${plan.price} €`;
                planSelect.appendChild(option);
            });
        }
    }

    // Add change event listener to the box select box
    boxSelect.addEventListener('change', updateRentalPeriodOptions);

    // Set the initial rental period options for the first box
    updateRentalPeriodOptions();

    // Add click event listener to each box item
    boxItems.forEach(box => {
        box.addEventListener('click', () => {
            if (!box.classList.contains('bg-red-500')) {
                const selectedBoxId = box.dataset.boxId;
                boxSelect.value = selectedBoxId;
                updateRentalPeriodOptions();
            }
        });
    });


    function validateForm() {
        const acceptCheckbox = document.getElementById('accept_conditions');
        if (!acceptCheckbox.checked) {
            alert('{{ __('details.Please accept the conditions.') }}');
            return false;
        }
        return true;
    }
</script>
