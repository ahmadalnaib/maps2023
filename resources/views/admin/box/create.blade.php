<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
          Boxes
        </h2>
    </x-slot>

    <div class="container my-12 mx-auto md:px-12 p-5">
        <h1 class="text-2xl p-5 mb-2">Add New Box</h1>
   <hr class="mb-5"/>
   <form class="form-contact" action="{{route('admin.box.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-col-2 gap-4">
        <div>
            <label for="name">Box Number</label>
            <input name="number" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1,2,3.." required>
              @error('number')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="catg">Choose System</label>
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
            <label for="plan_id" class="block">Choose Plan</label>
            <select name="plan_id[]" multiple class="form-multiselect block w-full" required>
              @foreach ($plans as $plan)
                <option value="{{ $plan->id }}">{{ $plan->name }}</option>
              @endforeach
            </select>
            @error('plan_id')
              <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <!-- ... -->
<div>
    <label for="box_type_id">Choose Box Type</label>
    <select name="box_type_id" class="form-select" required>
        @foreach ($boxTypes as $boxType)
            <option value="{{ $boxType->id }}">{{ $boxType->name }}</option>
        @endforeach
    </select>
    @error('box_type_id')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<!-- ... -->

          

         
    <button type="submit" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{__('place.Create')}}</button>
    </div>

   </form>
    </div>
</x-admin>
