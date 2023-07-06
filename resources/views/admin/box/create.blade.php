<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
       {{__('box.Boxes')}}
        </h2>
    </x-slot>

    <div class="container my-12 mx-auto md:px-12 p-5">
 
   <form class="form-contact" action="{{route('admin.box.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-col-2 gap-4">
        <div>
            {{__('box.Box Number')}}
            <input name="number" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="01, 02, .. ,11" required>
              @error('number')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="catg">{{__('box.Choose System')}}</label>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="system_id" id="" required>
                @foreach ($systems as $system)
                <option  value="{{$system->id}}">{{$system->system_name}}</option>
                @endforeach
            </select>
            @error('system_id')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
            
        </div>


        <div class="my-4">
          <label class="block text-gray-700 font-bold mb-2">{{__('box.Choose Plan')}}</label>
          <div class="grid grid-cols-1 gap-2">
              @foreach ($plans as $plan)
              <label class="flex items-center">
                  <input type="checkbox" name="plan_id[]" value="{{ $plan->id }}" class="form-checkbox h-5 w-5 text-gray-600">
                  <span class="ml-2 text-gray-800">{{ $plan->name }}</span>
              </label>
              @endforeach
          </div>
          @error('plan_id')
          <p class="text-red-500 text-sm">{{ $message }}</p>
          @enderror
      </div>
      

      <div>
        <label for="box_type_id" class="block text-gray-700 font-bold mb-2">{{__('box.Choose Box Type')}}</label>
        @foreach ($boxTypes as $boxType)
            <label class="inline-flex items-center mt-2">
                <input type="radio" name="box_type_id" value="{{ $boxType->id }}" class="form-radio text-blue-500 focus:ring-blue-300 focus:border-blue-500">
                <span class="ml-2">{{ $boxType->name }}</span>
            </label>
        @endforeach
        @error('box_type_id')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>
    <!-- ... -->
    
    
          

         
    <button type="submit" class="text-white bg-slate-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{__('place.Create')}}</button>
    </div>

   </form>
    </div>
</x-admin>

