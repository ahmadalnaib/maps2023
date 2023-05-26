<x-admin>

  <div class="container my-12 mx-auto md:px-12 p-5">
      <h1 class="text-2xl p-5 mb-2">Edit Plan</h1>
      <hr class="mb-5"/>
      <form class="form-contact" action="{{ route('admin.plan.update', $plan->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="grid grid-col-2 gap-4">
              <div>
                  <label for="name">Plan Name</label>
                  <input name="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $plan->name }}">
                  @error('name')
                  <span class="text-red-500">{{ $message }}</span>
                  @enderror
              </div>
              <div>
                  <label for="number_of_days">Number of Days</label>
                  <input name="number_of_days" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $plan->number_of_days }}">
                  @error('number_of_days')
                  <span class="text-red-500">{{ $message }}</span>
                  @enderror
              </div>
              <div>
                  <label for="price">Price</label>
                  <input name="price" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $plan->price }}">
                  @error('price')
                  <span class="text-red-500">{{ $message }}</span>
                  @enderror
              </div>
              <div>
                  <label for="locker_id">Choose Locker</label>
                  <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="locker_id">
                      @foreach ($lockers as $locker)
                          <option value="{{ $locker->id }}" {{ $locker->id === $plan->locker_id ? 'selected' : '' }}>{{ $locker->locker_name }}</option>
                      @endforeach
                  </select>
              </div>
              <div>
                  <label for="door_id">Choose Door</label>
                  <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="door_id">
                      @foreach ($doors as $door)
                          <option value="{{ $door->id }}" {{ $door->id === $plan->door_id ? 'selected' : '' }}>{{ $door->door_number }}</option>
                      @endforeach
                  </select>
              </div>
          </div>

          <button type="submit" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4">Update</button>
      </form>
  </div>

</x-admin>
