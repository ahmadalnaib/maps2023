<x-app-layout>
    <section class="py-24 bg-white">
        <div class="max-w-4xl px-8 mx-auto lg:px-16">
            <h2 class="mb-2 text-xl font-bold text-center md:text-3xl">Frequently Asked Questions</h2>
    
            <div class="relative  mt-12 space-y-5">
                <!-- Question 1 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span> What are the advantages of the bike box system?</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <ul class="list-disc" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> A dry and clean parking space.</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> An increased protection against theft compared to a freely accessible parking space.</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> More protection against vandalism.</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7">Safe use thanks to the illuminated interior *. Access to the system is only possible with a code.</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7">  Easy online registration via an electronic access and booking system.</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> Quick access to the system via a code, no key organization is necessary.</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> Sufficient space for additional storage of utensils, e.g. a bicycle helmet and clothes.</li>
                       

                    </ul>
                 
                </div>
                <!-- Question 2 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span> How can I rent a parking space?</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <ul class="list-disc" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> You choose your location, a parking space and the desired rental period.</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> You register by entering your contact details.</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> You choose a payment method. The following are possible: PayPal, credit card, SEPA direct debit.</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7">After successful payment you will receive your personal access code by email.</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> Now you can use the bike and ride facility on site.</li>
                      
                       

                    </ul>
                </div>
    
                <!-- Question 3 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>  How do I know that boxes/ lockers have charging sockets?</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">   After you have selected a location , a visualisation of the system appears. This visualisation shows the different parking spaces/ lockers, including the respective parking space/ locker number.

                        If the symbol of a plug is shown below the parking space/ locker number of an available parking space/ locker, this parking space/ locker has a charging socket for e-bikes and pedelecs.</p>
                </div>
    
                 <!-- Question 4 -->
                 <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>   What does the "1 day" rental term mean?</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">   If you book now for one day, this booking is now valid until 11:59 p.m. the following day.</p>
                </div>
    
                <!-- Question 5 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>     What happens after I have entered my personal data for profile registration?</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">       An e-mail with the subject "Please confirm your profile at the BR portal" will be sent afterwards. Please check your inbox! In this e-mail you have to confirm your e-mail address. After successful confirmation, an e-mail with the subject "Welcome to the BR portal" will be sent and the profile is created.</p>
                </div>
                <!-- Question 6 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>     What payment methods are available?</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">           There are the three payment options: PayPal, credit card and SEPA direct debit. For all payment methods, the payment is made via PayPal Plus. Therefore, PayPal Plus must be selected in the booking process for all payment methods. After the booking you will be redirected to PayPal and can choose between the three payment methods. The payment is possible without an own PayPal account.</p>
                </div>
                <!-- Question 7 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>     What information do I receive by e-mail?</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <ul class="list-disc" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> A profile confirmation message</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> A registration confirmation for your profile</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> A booking confirmation with your access data to the facility</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7">Payment reminders</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> A payment confirmation or invoice</li>
                        <li class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7"> Information about extending a booking</li>
                      
                       

                    </ul>
                </div>

                    <!-- Question 8 -->
                    <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                        <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                            <span>       How can I change my e-mail address stored in my user account?</span>
                            <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </h4>
                        <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">              You can go to profile page and change it.</p>
                    </div>
                    <!-- Question 8 -->
                    <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                        <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                            <span>         How can I view my access data?</span>
                            <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </h4>
                        <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">                    You can view your access data at any time in the Bike login area under "Manage bookings". To do this, you have to log in with your e-mail address and password. You will also receive an e-mail with the access data after the booking. The subject is "Your PIN for your booking - booking number: 7-XXXXXX".</p>
                    </div>
                    <!-- Question 8 -->
                    <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                        <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                            <span>       Benötigen Sie weitere Hilfe?<br>
                                Mögliche weitere Schritte:</span>
                            <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </h4>
                        <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" style="display: none;">                   +49 9261 -60 75 90 <br>  info@locktec.com</p>
                    </div>
    
            </div>
    
        </div>
    </section>

</x-app-layout>