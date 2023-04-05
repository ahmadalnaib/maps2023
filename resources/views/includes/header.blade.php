<div class="bg-white  mt-20">

  <h1 class="text-7xl text-center font-black">Find a Bike locker near you</h1>
  <p class="text-center text-3xl text-gray-400 mt-4">Enter a street, Address or postcode and we’ll show your nearest lockers
     </p>
     <p class="text-center text-3xl text-gray-400 mt-2 mb-8">Lockers are available 24 hours a day, 7 days a week</p>
</div>
<form action="{{route('search')}}" method="post">
  @csrf
  <div class="flex flex-row p-5">
    <div class="w-6/12">
      <input type="text" id="address" name="address" autocomplete="off" class="p-4 w-full bg-gray-100 rounded-md border-none focus:ring-transparent" placeholder="Enter Address or Postcode" placeholder="ex:Johann-Georg-Herzog-Str. 19">
      <div  id="address-list" class="mt-2" ></div>
    </div>
    <div class="w-6/12">
   <select name="category" id="" class="p-4 ml-5 bg-gray-100 w-full rounded-md border-none focus:ring-transparent">
    <option value=""> Select State/City</option>
  @include('includes.category_list')
   </select>
    </div>
    <div class="ml-5">
      <button type="submit" class="py-4 px-5 bg-red-600 hover:bg-red-500 text-white ml-5 rounded-md">Search</button>
    </div>

  </div>
</form>

<div class="m-auto text-center mb-5 mt-20">
  <div class="category mt-5">
    <ul class="flex flex-wrap">
      @foreach ($categories as $category)
       <li class="py-2 mx-2 my-1">
        <a href="{{route('category.show',$category->slug)}}" class="bg-red-300 hover:bg-gray-100 text-dark p-2 rounded-md m-1">{{$category->title}}</a>
       </li>
      @endforeach
        
     
    </ul>
  </div>
</div>