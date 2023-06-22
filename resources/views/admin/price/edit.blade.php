<x-admin>
  <x-slot name="header" >
      <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
       Price pag
      </h2>
  </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{route('price.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $price->id }}">
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
                      <div class="grid grid-cols-2 gap-4">
                          <div >
                              <label class="bg-red-500 p-1  rounded text-red-100" for="main_title">Main title ({{ $key }})</label>
                              <textarea class="ckeditor" name="main_title[{{ $key }}]" id="" cols="30" rows="10" >
                                {{ old('main_title.' . $key, $price->getTranslation('main_title', $key)) }}
                            </textarea>
                          </div>
                          <div>
                            <label class="bg-red-500 p-1  rounded text-red-100" for="main_subtitle">Main subtitle ({{ $key }})</label>
                            <textarea class="ckeditor" name="main_subtitle[{{ $key }}]" id="" cols="30" rows="10">
                              {{ old('main_subtitle.' . $key, $price->getTranslation('main_subtitle', $key)) }}
                          </textarea>
                          
                        </div>

                        <div>
                          <label class="bg-red-500 p-1  rounded text-red-100" for="title_one">Title one ({{ $key }})</label>
                          <textarea class="ckeditor" name="title_one[{{ $key }}]" id="" cols="30" rows="10">
                            {{ old('title_one.' . $key, $price->getTranslation('title_one', $key)) }}
                        </textarea>
                        
                      </div>
                        <div>
                          <label class="bg-red-500 p-1  rounded text-red-100" for="subtitle_one"> subtitle one ({{ $key }})</label>
                          <textarea class="ckeditor" name="subtitle_one[{{ $key }}]" id="" cols="30" rows="10">
                            {{ old('subtitle_one.' . $key, $price->getTranslation('subtitle_one', $key)) }}
                        </textarea>
                        
                      </div>
                        <div>
                          <label class="bg-red-500 p-1  rounded text-red-100" for="price_one"> Price one ({{ $key }})</label>
                          <textarea class="ckeditor" name="price_one[{{ $key }}]" id="" cols="30" rows="10">
                            {{ old('price_one.' . $key, $price->getTranslation('price_one', $key)) }}
                        </textarea>
                        
                      </div>
                        <div>
                          <label class="bg-red-500 p-1  rounded text-red-100" for="tag_one_one"> tag one  ({{ $key }})</label>
                          <textarea class="ckeditor" name="tag_one_one[{{ $key }}]" id="" cols="30" rows="10">
                            {{ old('tag_one_one.' . $key, $price->getTranslation('tag_one_one', $key)) }}
                        </textarea>
                        
                      </div>
                        <div>
                          <label class="bg-red-500 p-1  rounded text-red-100" for="tag_one_two"> tag two  ({{ $key }})</label>
                          <textarea class="ckeditor" name="tag_one_two[{{ $key }}]" id="" cols="30" rows="10">
                            {{ old('tag_one_two.' . $key, $price->getTranslation('tag_one_two', $key)) }}
                        </textarea>
                        
                      </div>
                        <div>
                          <label class="bg-red-500 p-1  rounded text-red-100" for="tag_one_three"> tag three  ({{ $key }})</label>
                          <textarea class="ckeditor" name="tag_one_three[{{ $key }}]" id="" cols="30" rows="10">
                            {{ old('tag_one_three.' . $key, $price->getTranslation('tag_one_three', $key)) }}
                        </textarea>
                        
                      </div>
          
                      </div>
                  </div>
              @endforeach


          </div>
          <button type="submit" class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 mt-4">Update</button>
      </form>
  </div>
</div>
</x-admin>
