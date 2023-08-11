<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('plan.Plan') }}
        </h2>
    </x-slot>

  <div class="container my-12 mx-auto md:px-12 p-5">
     
 <form class="form-contact" action="{{route('admin.plan.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="grid grid-col-2 gap-4">
      <div>
          <label for="name">{{__('plan.Plan name')}}</label>
          <input name="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('name')}}">
          @error('name')
          <span class="text-red-500">{{ $message }}</span>
          @enderror
          
      </div>
      <div>
        <label for="duration_unit">{{ __('plan.Duration Unit') }}</label>
        <select
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="duration_unit" id="">
            <option value="days">{{ __('plan.Days') }}</option>
            <option value="hours">{{ __('plan.Hours') }}</option>
            <option value="minutes">{{ __('plan.Minutes') }}</option>
        </select>
        @error('duration_unit')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
      <div>
          <label for="name">{{__('plan.Number of Days')}}</label>
          <input name="number_of_days" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('number_of_days')}}">
          @error('number_of_days')
          <span class="text-red-500">{{ $message }}</span>
          @enderror
      </div>
     

      <div>
          <label for="price"> {{__('plan.Plan Price')}}</label>
          <input name="price" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('price')}}">
          @error('price')
          <span class="text-red-500">{{ $message }}</span>
          @enderror
      </div>


</div>

    

  
 

       
  <button type="submit" class="text-white bg-slate-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 mt-5 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{__('plan.Create New Plan')}}</button>
  </div>

 </form>
  </div>
</x-admin>
