<x-admin>
  <x-slot name="header" >
      <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
        {{__('nav.How it works')}}
      </h2>
  </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{route('how.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $how->id }}">
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
                          <div>
                              <label for="main_title">Main title ({{ $key }})</label>
                          
                              <textarea class="ckeditor" name="main_title[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('main_title.' . $key, $how->getTranslation('main_title', $key)) }}
                            </textarea>
                            
                          </div>
                          <!-- Add other fields here -->
                          <div>
                            <label for="main_subtitle">Main subtitle ({{ $key }})</label>
                            <textarea class="ckeditor" name="main_subtitle[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('main_subtitle.' . $key, $how->getTranslation('main_subtitle', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="title_one">Title One ({{ $key }})</label>
                            <textarea class="ckeditor" name="title_one[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('title_one.' . $key, $how->getTranslation('title_one', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="subtitle_one">Subtitle one ({{ $key }})</label>
                            <textarea class="ckeditor" name="subtitle_one[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('subtitle_one.' . $key, $how->getTranslation('subtitle_one', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="title_two">Title two ({{ $key }})</label>
                         
                            <textarea class="ckeditor" name="title_two[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('title_two.' . $key, $how->getTranslation('title_two', $key)) }}
                            </textarea>
                        </div>
                        <div>
                            <label for="subtitle_two">Subtitle two ({{ $key }})</label>
                         
                            <textarea class="ckeditor" name="subtitle_two[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('subtitle_two.' . $key, $how->getTranslation('subtitle_two', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="title_three">Title Three ({{ $key }})</label>
                          
                            <textarea class="ckeditor" name="title_three[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('title_three.' . $key, $how->getTranslation('title_three', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="subtitle_three">Subtitle Three ({{ $key }})</label>
                            <textarea class="ckeditor" name="subtitle_three[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('subtitle_three.' . $key, $how->getTranslation('subtitle_three', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="title_four">Title Four ({{ $key }})</label>
                            <textarea class="ckeditor" name="title_four[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('title_four.' . $key, $how->getTranslation('title_four', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="subtitle_four">Subtitle Four ({{ $key }})</label>
                         
                            <textarea class="ckeditor" name="subtitle_four[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('subtitle_four.' . $key, $how->getTranslation('subtitle_four', $key)) }}
                            </textarea>
                        </div>
                      </div>
                  </div>
              @endforeach
              <div class="bg-white  shadow-sm rounded mt-4">
                <h2 class="">Video-Bereich</h2>
            <div class=" mb-2">
                <label for="title">
                    video-Link
                </label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" class="form-control p-3" name="video"  value="{{$how->video}}">
            </div>
            <div class="relative overflow-hidden rounded-md  cursor-pointer group">
                <div id="player" class="embed-container">
                    <iframe id="videoFrame" width="500px" height="200px" src="{{$how->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            
        </div>

          </div>
          <button type="submit" class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 mt-4">{{ __('place.Update') }}</button>
      </form>
  </div>
</div>
</x-admin>
