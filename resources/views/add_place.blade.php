<x-app-layout>
    <x-slot name="header">
    @include('includes/header')
    </x-slot>

    <div class="container my-12 mx-auto md:px-12 p-5">
        <h1 class="text-2xl p-5 mb-2">Add New Place</h1>
   <hr class="mb-5"/>
   <form class="form-contact" action="{{route('place.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-col-2 gap-4">
        <div>
            <label for="name">Place Name</label>
            <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400">
        </div>
        <div>
            <label for="catg">Choose Category</label>
            <select class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400" name="category_id" id="">
                @include('includes.category_list')
            </select>
        </div>
        <div>
            <label for="overview">Place Overview</label>
            <textarea class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400" name="overview" id="" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="details">Choose Photo</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mt-2">
            <div id="mapid" style="height:350px"></div>
        </div>
        <div class="mt-4">
            <label for="address">Address</label>
            <input type="text" name="address" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400">
        </div>
        <div class="form-group col-lg-6">
          <label for="long">Longitude</label>
          <input id="longitude" type="text" name="longitude" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400">
        </div>
        <div class="form-group col-lg-6">
            <label for="long">Latitude</label>
            <input id="latitude" type="text" name="latitude" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400">
          </div>
          <button type="submit" class="mt-3 bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">Submit</button>
    </div>

   </form>
    </div>
</x-app-layout>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="https://unpkg.com/esri-leaflet@2.3.3/dist/esri-leaflet.js"></script>
<script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js"></script>

    <script>
        let map=L.map('mapid');
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
        map.locate({setView:true,maxZoom:6});
        map.on('locationfound',function(e){
            L.marker(e.latlng).addTo(map);
        })

        map.on('locationerror',function(e){
            alert(e.message);
        })
 

        var geocodeService = L.esri.Geocoding.geocodeService();
        map.on('mousedown',function(e){
            $('#latitude').val(e.latlng.lat);
            $('#longitude').val(e.latlng.lng);
            geocodeService.reverse().latlng(e.latlng).run(function(error, result) {
            if(error){
                return;
            }
            
            L.marker(result.latlng).addTo(map).bindPopup(result.address.Match_addr).openPopup();
            })
        })
    </script>
