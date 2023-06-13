<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
           Edit System
        </h2>
    </x-slot>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <form action="{{ route('admin.system.update', $system) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="grid grid-col-2 gap-4">
                  <div>
                      <label for="locker_name">System name</label>
                      <input name="system_name" type="text" value="{{ $system->system_name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      @error('system_name')
                      <span class="text-red-500">{{ $message }}</span>
                      @enderror
                  </div>
             
                  <div>
                      <label for="place_id">{{__('locker.Choose Place')}}</label>
                      <select name="place_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          @foreach ($places as $place)
                              <option value="{{ $place->id }}" @if ($place->id === $system->place_id) selected @endif>{{ $place->name }}</option>
                          @endforeach
                      </select>
                      @error('"place_id')
                      <span class="text-red-500">{{ $message }}</span>
                      @enderror
                  </div>
              </div>
              <button type="submit" class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 mt-4">{{__('place.Update')}}</button>
          </form>
      </div>
  </div>
</x-admin>
