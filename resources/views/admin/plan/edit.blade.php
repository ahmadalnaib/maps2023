<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('plan.Plan') }}
        </h2>
    </x-slot>

  <div class="container my-12 mx-auto md:px-12 p-5">

      <form class="form-contact" action="{{ route('admin.plan.update', $plan->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="grid grid-col-2 gap-4">
              <div>
                {{__('plan.Plan name')}}
                  <input name="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $plan->name }}">
                  @error('name')
                  <span class="text-red-500">{{ $message }}</span>
                  @enderror
              </div>
              <div>
                {{ __('plan.Duration Unit') }}
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="duration_unit" id="">
                    <option value="days" {{ $plan->duration_unit === 'days' ? 'selected' : '' }}>
                        {{ __('plan.Days') }}</option>
                    <option value="hours" {{ $plan->duration_unit === 'hours' ? 'selected' : '' }}>
                        {{ __('plan.Hours') }}</option>
                    <option value="minutes" {{ $plan->duration_unit === 'minutes' ? 'selected' : '' }}>
                        {{ __('plan.Minutes') }}</option>
                </select>
                @error('duration_unit')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
              <div>
                {{__('plan.Number of Days')}}
                  <input name="number_of_days" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $plan->number_of_days }}">
                  @error('number_of_days')
                  <span class="text-red-500">{{ $message }}</span>
                  @enderror
              </div>
              <div>
                {{__('plan.Plan Price')}}
                  <input name="price" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $plan->price }}">
                  @error('price')
                  <span class="text-red-500">{{ $message }}</span>
                  @enderror
              </div>
          
 

          <button type="submit" class="text-white bg-slate-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4">{{__('plan.Update')}}</button>
      </form>
  </div>

</x-admin>
