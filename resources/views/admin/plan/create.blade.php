<x-admin>


  <div class="container my-12 mx-auto md:px-12 p-5">
      <h1 class="text-2xl p-5 mb-2">Add New Door</h1>
 <hr class="mb-5"/>
 <form class="form-contact" action="{{route('admin.plan.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="grid grid-col-2 gap-4">
      <div>
          <label for="name">Plan name</label>
          <input name="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @error('name')
          <span class="text-red-500">{{ $message }}</span>
          @enderror
          
      </div>
      <div>
          <label for="name">Number of Days</label>
          <input name="number_of_days" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @error('number_of_days')
          <span class="text-red-500">{{ $message }}</span>
          @enderror
      </div>
      <div>
        <label for="catg">Choose Locker</label>
        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="locker_id" id="" required>
            @foreach ($lockers as $locker)
            <option  value="{{$locker->id}}">{{$locker->locker_name}}</option>
            @endforeach
        </select>
        @error('locker_id')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
        
    </div>
      <div>
        <label for="catg">Choose Door</label>
        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="door_id" id="" >
            @foreach ($doors as $door)
                <option value="{{ $door->id }}">
                    {{ $door->door_number }} - {{ $door->size }}
                    @if ($door->charge)
                   + Elektrische Ladung
                    @endif
                </option>
            @endforeach
        </select>
       
    </div>
      <div>
          <label for="price">Plan Price</label>
          <input name="price" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @error('price')
          <span class="text-red-500">{{ $message }}</span>
          @enderror
      </div>

    

  
 

       
  <button type="submit" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
  </div>

 </form>
  </div>
</x-admin>
