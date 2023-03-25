<form action="">
  @csrf
  <div class="flex flex-row p-5">
    <div class="w-6/12">
      <input type="text" id="address" name="address" autocomplete="off" class="p-2 w-full bg-gray-100 rounded-md" placeholder="Search">
      <div id="address-list" class="mt-2"></div>
    </div>
    <div class="w-6/12">
   <select name="category" id="" class="p-2 ml-5 bg-gray-100 w-full rounded-md">
    <option value=""> select category</option>
   </select>
    </div>
    <div class="ml-5">
      <button type="submit" class="py-2 px-5 bg-gray-500 hover:bg-gray-400 text-white ml-5 rounded-md">Search</button>
    </div>

  </div>
</form>

<div class="m-auto text-center">
  <div class="category mt-5">
    <ul class="flex">
      @foreach ($categories as $category)
       <li>
        <a href="{{route('category.show',$category->slug)}}" class="bg-blue-900 hover:bg-gray-400 text-white p-2 rounded-md m-1">{{$category->title}}</a>
       </li>
      @endforeach
        
     
    </ul>
  </div>
</div>