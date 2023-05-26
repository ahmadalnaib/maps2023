<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('door.Doors') }}
        </h2>
    </x-slot>

    <div class="container my-12 mx-auto md:px-12 p-5">
        <h1 class="text-2xl p-5 mb-2">{{__('door.Add New Door')}}</h1>
   <hr class="mb-5"/>
   <form class="form-contact" action="{{route('admin.door.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-col-2 gap-4">
        <div>
            <label for="name">{{__('door.Door number')}}</label>
            <input name="door_number" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1,2,3..">
        </div>
        <div>
            <label for="catg">{{__('door.Choose Locker')}}</label>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="locker_id" id="">
                @foreach ($lockers as $locker)
                <option  value="{{$locker->id}}">{{$locker->locker_name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="size">{{__('door.Door Size')}}</label>
            <select name="size" id="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="big">{{__('door.Big')}}</option>
                <option value="small">{{__('door.Small')}}</option>
            </select>
        </div>
        <div>
            <label for="charge">{{__('door.Charge')}}</label>
            <input name="charge" type="checkbox" class="form-checkbox h-5 w-5 text-blue-500">
        </div>
   

         
    <button type="submit" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{__('place.Create')}}</button>
    </div>

   </form>
    </div>
</x-admin>
