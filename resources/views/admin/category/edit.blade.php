<x-admin>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  ">

         
<form action="{{route('category.admin.update',$category)}}" method="post" enctype="multipart/form-data">
  @method('PUT')
    @csrf
    <div class="mb-6">
      <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">   {{__('super.State')}}</label>
      <input type="text" id="state" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$category->title}}" required>
    </div>

    <div class="mt-3">
      <label for="image">{{__('place.Current Image')}}</label>
      <img src="{{$category->image}}" alt="Current Image" class="block mb-4" style="width: 200px; height: auto;">
      <label for="image">{{__('place.Upload Image - MAX 2 MB')}}</label>
      <input type="file" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      @error('image')
      <span class="text-red-500">{{ $message }}</span>
      @enderror
  </div>


    <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mt-5">{{__('place.Update')}}</button>
  </form>
  
              
    </div>
    </div>
</x-admin>
