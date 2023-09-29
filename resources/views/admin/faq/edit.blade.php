<x-admin>
  <x-slot name="header" >
      <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
       FAQ
      </h2>
  </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{route('faq.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $faq->id }}">
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
                            <label for="question_one">Question one ({{ $key }})</label>
                            <textarea class="ckeditor" name="question_one[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('question_one.' . $key, $faq->getTranslation('question_one', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="answer_one">Answer one ({{ $key }})</label>
                            <textarea class="ckeditor" name="answer_one[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('answer_one.' . $key, $faq->getTranslation('answer_one', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="question_two">Question two ({{ $key }})</label>
                            <textarea class="ckeditor" name="question_two[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('question_two.' . $key, $faq->getTranslation('question_two', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="answer_two">Answer two ({{ $key }})</label>
                            <textarea class="ckeditor" name="answer_two[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('answer_two.' . $key, $faq->getTranslation('answer_two', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="question_three">Question three({{ $key }})</label>
                            <textarea class="ckeditor" name="question_three[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('question_three.' . $key, $faq->getTranslation('question_three', $key)) }}
                            </textarea>
                        </div>
                          <div>
                            <label for="answer_three">Answer three({{ $key }})</label>
                            <textarea class="ckeditor" name="answer_three[{{ $key }}]" id="" cols="30" rows="10">
                                {{ old('answer_three.' . $key, $faq->getTranslation('answer_three', $key)) }}
                            </textarea>
                        </div>
                        <div>
                          <label for="question_four"> Question four({{ $key }})</label>
                          <textarea class="ckeditor" name="question_four[{{ $key }}]" id="" cols="30" rows="10">
                              {{ old('question_four.' . $key, $faq->getTranslation('question_four', $key)) }}
                          </textarea>
                      </div>

                      <div>
                        <label for="answer_four">Answer four({{ $key }})</label>
                        <textarea class="ckeditor" name="answer_four[{{ $key }}]" id="" cols="30" rows="10">
                            {{ old('answer_four.' . $key, $faq->getTranslation('answer_four', $key)) }}
                        </textarea>
                    </div>

                    <div>
                      <label for="question_five"> Question five({{ $key }})</label>
                      <textarea class="ckeditor" name="question_five[{{ $key }}]" id="" cols="30" rows="10">
                          {{ old('question_five.' . $key, $faq->getTranslation('question_five', $key)) }}
                      </textarea>
                  </div>

                  <div>
                    <label for="answer_five">Answer five({{ $key }})</label>
                    <textarea class="ckeditor" name="answer_five[{{ $key }}]" id="" cols="30" rows="10">
                        {{ old('answer_five.' . $key, $faq->getTranslation('answer_five', $key)) }}
                    </textarea>
                </div>

                <div>
                  <label for="question_six"> Question six({{ $key }})</label>
                  <textarea class="ckeditor" name="question_six[{{ $key }}]" id="" cols="30" rows="10">
                      {{ old('question_six.' . $key, $faq->getTranslation('question_six', $key)) }}
                  </textarea>
              </div>

              <div>
                <label for="answer_six">Answer six({{ $key }})</label>
                <textarea class="ckeditor" name="answer_six[{{ $key }}]" id="" cols="30" rows="10">
                    {{ old('answer_six.' . $key, $faq->getTranslation('answer_six', $key)) }}
                </textarea>
            </div>

            <div>
              <label for="question_seven"> Question seven({{ $key }})</label>
              <textarea class="ckeditor" name="question_seven[{{ $key }}]" id="" cols="30" rows="10">
                  {{ old('question_seven.' . $key, $faq->getTranslation('question_seven', $key)) }}
              </textarea>
          </div>

          <div>
            <label for="answer_seven">Answer seven({{ $key }})</label>
            <textarea class="ckeditor" name="answer_seven[{{ $key }}]" id="" cols="30" rows="10">
                {{ old('answer_seven.' . $key, $faq->getTranslation('answer_seven', $key)) }}
            </textarea>
        </div>

        <div>
          <label for="question_eight"> Question eight({{ $key }})</label>
          <textarea class="ckeditor" name="question_eight[{{ $key }}]" id="" cols="30" rows="10">
              {{ old('question_eight.' . $key, $faq->getTranslation('question_eight', $key)) }}
          </textarea>
      </div>

      <div>
        <label for="answer_eight">Answer eight({{ $key }})</label>
        <textarea class="ckeditor" name="answer_eight[{{ $key }}]" id="" cols="30" rows="10">
            {{ old('answer_eight.' . $key, $faq->getTranslation('answer_eight', $key)) }}
        </textarea>
    </div>


    <div>
        <label for="question_nine"> Question nine({{ $key }})</label>
        <textarea class="ckeditor" name="question_nine[{{ $key }}]" id="" cols="30" rows="10">
            {{ old('question_nine.' . $key, $faq->getTranslation('question_nine', $key)) }}
        </textarea>
    </div>

    <div>
      <label for="answer_nine">Answer nine({{ $key }})</label>
      <textarea class="ckeditor" name="answer_nine[{{ $key }}]" id="" cols="30" rows="10">
          {{ old('answer_nine.' . $key, $faq->getTranslation('answer_nine', $key)) }}
      </textarea>
  </div>


  

  <div>
    <label for="question_ten"> Question ten({{ $key }})</label>
    <textarea class="ckeditor" name="question_ten[{{ $key }}]" id="" cols="30" rows="10">
        {{ old('question_ten.' . $key, $faq->getTranslation('question_ten', $key)) }}
    </textarea>
</div>

<div>
  <label for="answer_ten">Answer ten({{ $key }})</label>
  <textarea class="ckeditor" name="answer_ten[{{ $key }}]" id="" cols="30" rows="10">
      {{ old('answer_ten.' . $key, $faq->getTranslation('answer_ten', $key)) }}
  </textarea>
</div>

<div>
    <label for="question_eleven"> Question eleven({{ $key }})</label>
    <textarea class="ckeditor" name="question_eleven[{{ $key }}]" id="" cols="30" rows="10">
        {{ old('question_eleven.' . $key, $faq->getTranslation('question_eleven', $key)) }}
    </textarea>
</div>

<div>
  <label for="answer_eleven">Answer eleven({{ $key }})</label>
  <textarea class="ckeditor" name="answer_eleven[{{ $key }}]" id="" cols="30" rows="10">
      {{ old('answer_eleven.' . $key, $faq->getTranslation('answer_eleven', $key)) }}
  </textarea>
</div>

               
                      </div>
                  </div>
              @endforeach
             
            </div>
            <button type="submit" class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 mt-4">{{__('place.Update')}}</button>
        </form>
    </div>
</div>
</x-admin>
