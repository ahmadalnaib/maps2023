<x-admin>
  <x-slot name="header" >
    <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
        {{ __('policy.policy') }}
    </h2>
</x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  ">

         
<form action="{{route('admin.policy.update',$policy)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-6">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('policy.Policy name')}}</label>
      <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " value="{{$policy->name}}" placeholder="ex. Mehrzeitraumdeckung" required>
    </div>



    <button type="submit" class="text-white bg-slate-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">{{__('policy.Update')}}</button>
  </form>
  
              
    </div>
    </div>
</x-admin>
