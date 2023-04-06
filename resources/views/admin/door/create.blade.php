<x-admin>


    <div class="container my-12 mx-auto md:px-12 p-5">
        <h1 class="text-2xl p-5 mb-2">Add New Door</h1>
   <hr class="mb-5"/>
   <form class="form-contact" action="{{route('admin.door.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-col-2 gap-4">
        <div>
            <label for="name">Door Number</label>
            <input name="door_number" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div>
            <label for="catg">Choose Locker</label>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="locker_id" id="">
                @foreach ($lockers as $locker)
                <option  value="{{$locker->id}}">{{$locker->locker_name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="size">Locker Size</label>
            <div class="flex items-center">
                <input  id="checked-checkbox" type="checkbox" name="is_big" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="size" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Big Door</label>
            </div>
        </div>
    
        <div>
            <label for="size">Rental Status</label>
            <div class="flex items-center">
                <input  id="checked-checkbox" type="checkbox" name="rental_status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="size" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rental</label>
            </div>
        </div>
    
  

         
    <button type="submit" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
    </div>

   </form>
    </div>
</x-admin>
