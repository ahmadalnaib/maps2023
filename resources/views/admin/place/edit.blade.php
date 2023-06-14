<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('place.Places') }}
        </h2>
    </x-slot>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <form action="{{ route('admin.place.update', $place) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="grid grid-col-2 gap-4">
                  <div>
                      <label for="name">{{__('place.Place name')}}</label>
                      <input name="name" type="text" value="{{ $place->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      @error('name')
                      <span class="text-red-500">{{ $message }}</span>
                      @enderror
                  </div>
                  <div>
                      <label for="category">{{__('place.Choose state')}}</label>
                      <select name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}" @if ($category->id === $place->category_id) selected @endif>{{ $category->title }}</option>
                          @endforeach
                      </select>
                      @error('category_id')
                      <span class="text-red-500">{{ $message }}</span>
                      @enderror
                  </div>
                  <div>
                      <label for="overview">{{__('place.Place Info/Notes')}}</label>
                      <textarea name="overview" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" cols="30" rows="10">{{ $place->overview }}</textarea>
                      @error('overview')
                      <span class="text-red-500">{{ $message }}</span>
                      @enderror
                  </div>
                  <div>
                    <label for="image">{{__('place.Current Image')}}</label>
                    <img src="{{ asset( $place->image) }}" alt="Current Image" class="block mb-4" style="width: 200px; height: auto;">
                    <label for="image">{{__('place.Upload Image - MAX 2 MB')}}</label>
                    <input type="file" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('image')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                  <div>
                      <label for="address">{{__('place.Address')}}</label>
                      <input type="text" name="address" value="{{ $place->address }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      @error('address')
                      <span class="text-red-500">{{ $message }}</span>
                      @enderror
                  </div>
                  <div>
                      <label for="longitude">{{__('place.Longitude')}}</label>
                      <input type="text" name="longitude" value="{{ $place->longitude }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      @error('longitude')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                  </div>
                  <div>
                      <label for="latitude">{{__('place.Latitude')}}</label>
                      <input type="text" name="latitude" value="{{ $place->latitude }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-5">
                      @error('latitude')
                      <span class="text-red-500">{{ $message }}</span>
                      @enderror
                  </div>
              </div>

              <button type="submit" class="text-white bg-slate-500 hover:bg-real-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 ">{{__('place.Update')}}</button>
          </form>
      </div>
  </div>
</x-admin>
