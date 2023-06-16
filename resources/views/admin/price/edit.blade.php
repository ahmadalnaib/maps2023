<x-admin>
  <x-slot name="header" >
      <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
        {{__('nav.Pricing')}}
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
                       
                          <!-- Add other fields here -->
                          <div>
                            <label for="main_title">Main Title ({{ $key }})</label>
                            <textarea class="ckeditor" name="main_title[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('main_title.' . $key, $price->getTranslation('main_title', $key)) }}
                            </textarea>
                        {{-- </div>
                          <div>
                            <label for="main_subtitle">Main subtitle({{ $key }})</label>
                            <textarea class="ckeditor" name="main_subtitle[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('main_subtitle.' . $key, $price->getTranslation('main_subtitle', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="title_one">Title one({{ $key }})</label>
                            <textarea class="ckeditor" name="title_one[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('title_one.' . $key, $price->getTranslation('title_one', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="subtitle_one">Subtitle one({{ $key }})</label>
                            <textarea class="ckeditor" name="subtitle_one[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('subtitle_one.' . $key, $price->getTranslation('subtitle_one', $key)) }}
                            </textarea>
                        </div>
                        <div>
                          <label for="price_one">Price one({{ $key }})</label>
                         
                          <input type="text" name="price_one[{{ $key }}]" id="price_one" autocomplete="price_one" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value=" {{ old('price_one.' . $key, $price->getTranslation('price_one', $key)) }}">
                      </div>

                      <div>
                        <label for="tag_one_one">Tag one({{ $key }})</label>
                       
                        <input type="text" name="tag_one_one[{{ $key }}]" id="tag_one_one" autocomplete="tag_one_one" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value=" {{ old('tag_one_one.' . $key, $price->getTranslation('tag_one_one', $key)) }}">
                    </div>
                      <div>
                        <label for="tag_one_two">Tag three({{ $key }})</label>
                       
                        <input type="text" name="tag_one_two[{{ $key }}]" id="tag_one_two" autocomplete="tag_one_two" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value=" {{ old('tag_one_two.' . $key, $price->getTranslation('tag_one_two', $key)) }}">
                    </div>
                      <div>
                        <label for="tag_one_three">Tag three({{ $key }})</label>
                       
                        <input type="text" name="tag_one_three[{{ $key }}]" id="tag_one_three" autocomplete="tag_one_three" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value=" {{ old('tag_one_three.' . $key, $price->getTranslation('tag_one_three', $key)) }}">
                    </div>
                      <div>
                        <label for="tag_one_four">Tag four({{ $key }})</label>
                       
                        <input type="text" name="tag_one_four[{{ $key }}]" id="tag_one_four" autocomplete="tag_one_four" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value=" {{ old('tag_one_four.' . $key, $price->getTranslation('tag_one_four', $key)) }}">
                    </div>
                      <div>
                        <label for="tag_one_five">Tag five({{ $key }})</label>
                       
                        <input type="text" name="tag_one_five[{{ $key }}]" id="tag_one_five" autocomplete="tag_one_five" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value=" {{ old('tag_one_five.' . $key, $price->getTranslation('tag_one_five', $key)) }}">
                    </div>
                      <div>
                        <label for="tag_one_six">Tag Six({{ $key }})</label>
                       
                        <input type="text" name="tag_one_six[{{ $key }}]" id="tag_one_six" autocomplete="tag_one_six" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value=" {{ old('tag_one_six.' . $key, $price->getTranslation('tag_one_six', $key)) }}">
                    </div> --}}

                   

               
                      </div>
                  </div>
              @endforeach
             
            </div>
            <button type="submit" class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 mt-4">{{__('place.Update')}}</button>
        </form>
    </div>
</div>
</x-admin>
