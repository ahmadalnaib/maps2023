<x-admin>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  ">

         
<form action="{{route('category.admin.update',$category)}}" method="post">
    @csrf
    <div class="mb-6">
      <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State Name</label>
      <input type="text" id="state" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$category->title}}" required>
    </div>


    <button type="submit" class="text-white bg-teal-700 hover:bg-real-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Update</button>
  </form>
  
              
    </div>
    </div>
</x-admin>
