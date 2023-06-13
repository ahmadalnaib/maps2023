<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('place.Places') }}
        </h2>
    </x-slot>

    <div class="container my-12 mx-auto md:px-12 p-5">
        <h1 class="text-2xl p-5 mb-2">{{__('place.Add New Place')}}</h1>
   <hr class="mb-5"/>
   <form class="form-contact" action="{{route('admin.place.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-col-2 gap-4">
        <div>
            <label for="name">{{__('place.Place name')}}</label>
            <input placeholder="Kulmbach" name="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
        </div>
        <div>
            <label for="catg">{{__('place.Choose state')}}</label>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="category_id" id="" required>
                @include('includes.category_list')
            </select>
            @error('category_id')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
        </div>
        <div>
            <label for="overview">{{__('place.Place Info/Notes')}}</label>
            <textarea 
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="overview" id="" cols="30" rows="10"></textarea>
           @error('overview')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
        </div>
                <div>    
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">{{__('place.Upload Image - MAX 2 MB')}}</label>
        <input class="p-5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image" required>
        @error('image')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        </div>
  
        <div class="mt-2">
            <div id="mapid" style="height:350px"></div>
        </div>
        
        <div class="mt-4">
            <label for="address">{{__('place.Address')}}</label>
            <input placeholder="Heinrich Schneider 7" type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('address')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
        </div>
        
        <div class="form-group col-lg-6">
          <label for="long">{{__('place.Longitude')}}</label>
          <input placeholder="10.250244140625002" id="longitude" type="text" name="longitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @error('longitude')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
        </div>
        <div class="form-group col-lg-6">
            <label for="long">{{__('place.Latitude')}}</label>
            <input placeholder="50.12057809796008" id="latitude" type="text" name="latitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('longitude')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
          </div>
         
    <button type="submit" class="text-white bg-indigo-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">{{__('place.Create')}}</button>
    </div>

   </form>
    </div>
</x-admin>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="https://unpkg.com/esri-leaflet@2.3.3/dist/esri-leaflet.js"></script>
<script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js"></script>

<script>
    let map = L.map('mapid');
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
    map.locate({ setView: true, maxZoom: 6 });
    map.on('locationfound', function(e) {
        L.marker(e.latlng).addTo(map);
    });

    map.on('locationerror', function(e) {
        alert(e.message);
    });

    var geocodeService = L.esri.Geocoding.geocodeService();
    var marker;

    map.on('mousedown', function(e) {
        $('#latitude').val(e.latlng.lat);
        $('#longitude').val(e.latlng.lng);
        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker(e.latlng).addTo(map);
        geocodeService.reverse().latlng(e.latlng).run(function(error, result) {
            if (error) {
                return;
            }
            marker.bindPopup(result.address.Match_addr).openPopup();
            $('#address').val(result.address.Match_addr);
        });
    });

    // Update map and coordinates when address is typed
    $('#address').on('input', function() {
        var address = $(this).val();
        if (address) {
            geocodeService.geocode().text(address).run(function(error, result) {
                if (error) {
                    return;
                }
                var location = result.results[0].latlng;
                if (marker) {
                    map.removeLayer(marker);
                }
                marker = L.marker(location).addTo(map);
                map.setView(location);
                marker.bindPopup(address).openPopup();
                $('#latitude').val(location.lat);
                $('#longitude').val(location.lng);
            });
        }
    });
</script>