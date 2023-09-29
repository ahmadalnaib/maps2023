<x-app-layout>
    <section class="py-24 bg-white tails-selected-element" >
        <div class="max-w-4xl px-8 mx-auto lg:px-16">
            <h2 class="mb-2 text-xl font-bold text-center md:text-3xl">{{__('faq.Frequently Asked Questions')}}</h2>
    
            <div class="relative  mt-12 space-y-5">
                <!-- Question 1 -->
                <div x-data="{ show: true }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>{!! $faq->question_one !!}</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">
                        {!! $faq->answer_one !!}</p>
                </div>
    
                <!-- Question 2 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>{!! $faq->question_two !!}</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">
                    {!! $faq->answer_two !!}</p>
                </div>
    
                <!-- Question 3 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>{!! $faq->question_three !!}</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">
                        {!! $faq->answer_three !!}</p>
                </div>
    
                 <!-- Question 4 -->
                 <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>{!! $faq->question_four !!}</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">{!! $faq->answer_four !!}</p>
                </div>
    
                <!-- Question 5 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>{!! $faq->question_five !!}</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">
                        {!! $faq->answer_five !!}</p>
                </div>

                     <!-- Question 6 -->
                     <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                        <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                            <span>{!! $faq->question_six !!}</span>
                            <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </h4>
                        <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">{!! $faq->answer_six !!}</p>
                    </div>

                        <!-- Question 7 -->
                        <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                            <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                                <span>{{$faq->question_seven}}</span>
                                <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </h4>
                            <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">{!! $faq->answer_seven !!}</p>
                        </div>

                                    <!-- Question 8 -->
                                    <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                                        <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                                            <span>{!! $faq->question_eight !!}</span>
                                            <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                        </h4>
                                        <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">{!! $faq->answer_eight !!}</p>
                                    </div>


                                          <!-- Question 9 -->
                                          <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                                            <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                                                <span>{!! $faq->question_nine !!}</span>
                                                <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                            </h4>
                                            <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">{!! $faq->answer_nine !!}</p>
                                        </div>

                                            <!-- Question 10 -->
                                            <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                                                <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                                                    <span>{!! $faq->question_ten !!}</span>
                                                    <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                                </h4>
                                                <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">{!! $faq->answer_ten !!}</p>
                                            </div>

                                                      <!-- Question 11 -->
                                                      <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                                                        <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                                                            <span>{!! $faq->question_eleven !!}</span>
                                                            <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                                        </h4>
                                                        <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">{!! $faq->answer_eleven !!}</p>
                                                    </div>

                                    <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                                        <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                                            <span>Wer ist LockTec?</span>
                                            <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                        </h4>
                                        <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">LockTec ist ein mittelständischen Unternehmen mit Sitz in Oberfranken. LockTec ist seit mehr als 35 Jahren spezialisiert auf die Herstellung von elektronischen Schließfachanlagen für Gepäck, Fahrrädern, Pakete, Werkzeuge und Lebensmittel. </p>
                                    </div>

                                        
                                     
    
            </div>
    
        </div>
    </section>

</x-app-layout>