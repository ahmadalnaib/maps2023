<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
        Boxes
        </h2>
    </x-slot>
    <div class="container my-12 mx-auto md:px-12 p-5">
        <h1 class="text-2xl p-5 mb-2">Edit Box</h1>
        <hr class="mb-5"/>
        <form class="form-contact" action="{{ route('admin.box.update', $box) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-col-2 gap-4">
                <div>
                    <label for="door_number">Box Number</label>
                    <input name="number" type="text" value="{{ $box->number }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('number')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="system_id">Choose System</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="system_id" id="system_id">
                        @foreach ($systems as $system)
                            <option value="{{ $system->id }}" @if ($system->id === $box->system) selected @endif>{{ $system->system_name }}</option>
                        @endforeach
                    </select>
                </div>

                
              <!-- Plans -->
              <div class="mb-6">
                <label for="plan_id" class="block text-gray-700 font-bold mb-2">Choose Plan</label>
                <div class="grid grid-cols-1 gap-2">
                    @foreach ($plans as $plan)
                    <label class="flex items-center">
                        <input type="checkbox" name="plan_id[]" value="{{ $plan->id }}" class="form-checkbox h-5 w-5 text-gray-600" {{ in_array($plan->id, $box->plans->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-800">{{ $plan->name }}</span>
                    </label>
                    @endforeach
                </div>
                @error('plan_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            
<!-- Box Type -->
<div class="mb-6">
    <label for="box_type_id" class="block text-gray-700 font-bold mb-2">Choose Box Type</label>
    <div class="flex flex-wrap items-center">
        @foreach ($boxTypes as $boxType)
        <label class="inline-flex items-center mr-4 mb-2">
            <input type="radio" name="box_type_id" value="{{ $boxType->id }}" class="form-radio h-5 w-5 text-gray-600" {{ $box->box_type_id == $boxType->id ? 'checked' : '' }}>
            <span class="ml-2 text-gray-800">{{ $boxType->name }}</span>
        </label>
        @endforeach
    </div>
    @error('box_type_id')
    <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

             
                
            </div>
            <button type="submit" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">Update Box</button>
        </form>
    </div>
</x-admin>
