<x-admin>
  <x-slot name="header" >
      <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
        Policy
      </h2>
  </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{route('policy.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $privacy->id }}">
            <div x-data="{ activeTab: '{{ array_key_first(config('locales.languages')) }}' }">
                <ul class="flex mb-4" id="myTab" role="tablist">
                    @foreach(config('locales.languages') as $key => $val)
                        <li role="presentation" class="mr-2">
                            <a :class="{ 'bg-gray-300': activeTab === '{{ $key }}' }" x-on:click="activeTab = '{{ $key }}'" id="{{ $key }}-tab" role="tab" :aria-controls="{{ $key }}" :aria-selected="(activeTab === '{{ $key }}').toString()" class="py-2 px-4 bg-gray-200 rounded-md hover:bg-gray-300">{{ $val['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
    
                @foreach (config('locales.languages') as $key => $val)
                    <div x-show="activeTab === '{{ $key }}'" id="{{ $key }}" role="tabpanel" :aria-labelledby="{{ $key }}-tab">
                        <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <div>
                                <label for="overview">privacy Content ({{ $key }})</label>
                            
                                <textarea class="ckeditor" name="content[{{ $key }}]" id="" cols="30" rows="10">
                                    {{ old('privacy.' . $key, $privacy->getTranslation('content', $key)) }}
                              </textarea>
                              @error('privacy')
                              <span class="text-red-500">{{ $message }}</span>
                              @enderror
                              
                            </div>
                
                        
                                           
                           
                        </div>
                    </div>
                @endforeach

            <button type="submit" class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 mt-4">{{__('place.Update')}}</button>
        </form>
    </div>
</div>
</x-admin>
