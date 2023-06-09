<x-admin>

    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
         System
        </h2>
    </x-slot>
    <div class="container my-12 mx-auto md:px-12 p-5">
        <h1 class="text-2xl p-5 mb-2">Add New System</h1>
   <hr class="mb-5"/>
   <form class="form-contact" action="{{route('admin.system.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-col-2 gap-4">
        <div>
            <label for="name">System name</label>
            <input placeholder="Velosafe-T-1" name="system_name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('system_name')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="name">System Address</label>
            <input placeholder="
            Musterstraße 17 
            12345 Berlin 
            " name="address" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('address')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="catg">{{__('locker.Choose Place')}}</label>
            @if ($places->isEmpty())
                <p>No available places to Create new Orte from.</p>
            @else
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="place_id" id="" required>
                    @foreach ($places as $place)
                        <option value="{{$place->id}}">{{$place->name}} - {{$place->address}}</option>
                    @endforeach
                </select>
                @error('place_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            @endif
        </div>
        

         
    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">{{__('place.Create')}}</button>
    </div>

   </form>
    </div>
</x-admin>
