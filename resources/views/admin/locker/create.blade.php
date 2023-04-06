<x-admin>


    <div class="container my-12 mx-auto md:px-12 p-5">
        <h1 class="text-2xl p-5 mb-2">Add New Locker</h1>
   <hr class="mb-5"/>
   <form class="form-contact" action="{{route('admin.locker.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-col-2 gap-4">
        <div>
            <label for="name">Locker Number</label>
            <input name="locker_number" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div>
            <label for="catg">Choose Place</label>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="place_id" id="">
                @foreach ($places as $place)
                <option  value="{{$place->id}}">{{$place->name}}</option>
                @endforeach
            </select>
        </div>
    
  

         
    <button type="submit" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
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
