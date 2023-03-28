<form action="{{route('search')}}" method="post">
  @csrf
  <div class="flex flex-row p-5">
    <div class="w-6/12">
      <input type="text" id="address" name="address" autocomplete="off" class="p-4 w-full bg-gray-100 rounded-md border-none" placeholder="Search">
      <div id="address-list" class="mt-2"></div>
    </div>
    <div class="w-6/12">
   <select name="category" id="" class="p-4 ml-5 bg-gray-100 w-full rounded-md border-none">
    <option value=""> select category</option>
  @include('includes.category_list')
   </select>
    </div>
    <div class="ml-5">
      <button type="submit" class="py-4 px-5 bg-gray-500 hover:bg-gray-400 text-white ml-5 rounded-md">Search</button>
    </div>

  </div>
</form>

<div class="m-auto text-center mb-20">
  <div class="category mt-5">
    <ul class="flex flex-wrap">
      @foreach ($categories as $category)
       <li class="py-2 mx-2 my-1">
        <a href="{{route('category.show',$category->slug)}}" class="bg-red-300 hover:bg-gray-400 text-dark p-2 rounded-md m-1">{{$category->title}}</a>
       </li>
      @endforeach
        
     
    </ul>
  </div>
</div>