


<section class="py-20 bg-white tails-selected-element" >

  <div class="max-w-6xl px-10 mx-auto xl:px-5">

    <div class="flex flex-col justify-center space-y-7">
      
      <h2 class="w-full mx-auto text-4xl font-extrabold leading-none text-left text-gray-900 sm:text-5xl md:text-7xl md:text-center">{{__('index.find')}}</h2>
      <p class="w-full max-w-4xl mx-auto text-xl text-left text-gray-500 md:text-2xl md:text-center">{{__('index.find suitable lockers with address or postal code')}}</p>
      <p class="w-full max-w-5xl mx-auto text-xl text-left text-gray-500 md:text-2xl md:text-center">{{__('index.Lockers for left-luggage and bikes are available on different locations')}}</p>
      <form action="{{route('search')}}" method="post">
        @csrf
      <div class="flex flex-col w-full mx-auto space-y-5 md:space-y-0 md:space-x-5 md:flex-row">
        <input type="text" id="address" name="address" class="flex-1 w-full px-5 py-5 text-base sm:text-lg md:text-xl lg:text-2xl xl:text-2xl  border border-gray-300 rounded-lg focus:ring-4 focus:border-red-700 focus:ring-red-600 focus:ring-opacity-50 focus:outline-none bg-gray-100" data-primary="blue-600" data-rounded="rounded-lg" placeholder="{{__('index.Enter Address or Postcode')}}">

        <select name="category" id="" class="flex-1 w-full px-5 py-5  text-base sm:text-lg md:text-xl lg:text-2xl xl:text-2xl border border-gray-300 rounded-lg focus:ring-4 focus:border-red-700 focus:ring-red-600 focus:ring-opacity-50 focus:outline-none bg-gray-100">
          <option value="">{{__('index.Select State/City')}}</option>
          @include('includes.category_list')
        </select>
        

        
          
    
        <button type="submit" class="flex-shrink-0 px-10 py-5 text-2xl font-medium text-center text-white bg-red-600 rounded-lg focus:ring-4 focus:ring-red-600 focus:ring-opacity-50 focus:ring-offset-2 focus:outline-none">{{__('index.Search')}}</button>
      </div>
    </form>
      {{-- <p class="text-gray-400">By signing up you agree to our <a href="#_" class="text-blue-500 underline" data-primary="blue-500">terms of service</a>.</p> --}}
      <div  id="address-list" class="mt-2" ></div>
 

  </div>

</div></section>

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