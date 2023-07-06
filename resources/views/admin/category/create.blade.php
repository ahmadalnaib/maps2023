<x-admin>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  ">

         
<form action="{{route('category.admin.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
      <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">     {{__('super.State')}}</label>
      <input type="text" id="state" name="title" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <div class="mb-2">    
      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">{{__('super.Upload Image')}}</label>
      <input class="p-3 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image">

      </div>


    <button type="submit" class="text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">{{__('super.Create New State')}}</button>
  </form>
  
              
    </div>
    </div>
</x-admin>
