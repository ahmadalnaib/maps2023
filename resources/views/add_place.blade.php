<x-admin>


    <div class="container my-12 mx-auto md:px-12 p-5">
        <h1 class="text-2xl p-5 mb-2">Add New Place</h1>
   <hr class="mb-5"/>
   <form class="form-contact" action="{{route('place.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-col-2 gap-4">
        <div>
            <label for="name">Place Name</label>
            <input name="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div>
            <label for="catg">Choose Category</label>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="category_id" id="">
                @include('includes.category_list')
            </select>
        </div>
        <div>
            <label for="overview">Place Overview</label>
            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="overview" id="" cols="30" rows="10"></textarea>
        </div>
                <div>    
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
        <input class="p-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image">

        </div>
  
        <div class="mt-2">
            <div id="mapid" style="height:350px"></div>
        </div>
        <div class="mt-4">
            <label for="address">Address</label>
            <input type="text" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="form-group col-lg-6">
          <label for="long">Longitude</label>
          <input id="longitude" type="text" name="longitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="form-group col-lg-6">
            <label for="long">Latitude</label>
            <input id="latitude" type="text" name="latitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
         
    <button type="submit" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
    </div>

   </form>
    </div>
</x-admin>

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
