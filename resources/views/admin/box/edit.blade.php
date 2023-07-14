<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{__('box.Boxes')}}
        </h2>
    </x-slot>
    <div class="container my-12 mx-auto md:px-12 p-5">
      
        <form class="form-contact" action="{{ route('admin.box.update', $box) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-col-2 gap-4">
                <div>
                    {{__('box.Box Number')}}
                    <input name="number" type="text" value="{{ $box->number }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('number')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="catg">{{__('box.Choose System')}}</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="system_id" id="system_id">
                        @foreach ($systems as $system)
                            <option value="{{ $system->id }}" {{ $system->id === $box->system_id ? 'selected' : '' }}>{{ $system->system_name }}</option>
                        @endforeach
                    </select>
                </div>
                
                
              <!-- Plans -->
              <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">{{__('box.Choose Plan')}}</label>
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
    <label for="box_type_id" class="block text-gray-700 font-bold mb-2">{{__('box.Choose Box Type')}}</label>
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


<div class="m-2">
   
    <span class="text-lg font-bold mr-3 ">{{__('box.Box Status')}}</span>
    <label class="flex items-center relative w-max cursor-pointer select-none mt-2">
        <input type="checkbox" name="status"   value="{{$box->status}}" {{ $box->status === 1 ? 'checked' : 0 }}  class="appearance-none transition-colors cursor-pointer w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-blue-500 bg-red-500" />
        <span class="absolute font-medium text-xs uppercase right-1 text-white"> Aus </span>
        <span class="absolute font-medium text-xs uppercase right-8 text-white"> ON </span>
        <span class="w-7 h-7 right-7 absolute rounded-full transform transition-transform bg-gray-200" />
      </label>
    </div>
       
                
            </div>
            <button type="submit" class="text-white bg-slate-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-10">{{__('policy.Update')}}</button>
        </form>
    </div>
</x-admin>
<style>
    input:checked {
    background-color: #3bdc76 !important; /* bg-green-500 */
  }

  input:checked ~ span:last-child {
    --tw-translate-x: 1.75rem; /* translate-x-7 */
  }
</style>