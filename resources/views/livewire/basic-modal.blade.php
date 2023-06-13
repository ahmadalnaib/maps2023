<div class="border p-4 rounded-xl shadow-sm" >
    <a href="#" wire:click="openModal" >
        <div class="flex items-center justify-center w-12 h-12 mb-4 text-blue-600 bg-blue-100 rounded-full" data-primary="blue-600" data-rounded="rounded-full">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
        </div>
        <h3 class="mb-2 text-base font-semibold leading-tight text-gray-900 lg:text-lg">{{__('basic.Need help and support')}}</h3>
        <p class="text-sm text-gray-500 lg:text-base">{{__("basic.For any issues, just contact us here and we'll be able to help")}}</p>
    </a> 


    @if($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
            <div class="bg-white p-4 rounded-xl">
                <h3 class="mb-2 text-base font-semibold leading-tight text-gray-900">{{__('basic.Need help and support')}}</h3>
                <p class="text-sm text-gray-500">{{__("basic.For any issues, just contact us here and we'll be able to help")}}</p>

                <div class="mt-4">
                    <!-- Modal content goes here -->
                    <div class="mt-4">
                        <p class="text-sm text-gray-500"><strong>Email:</strong> info@locktec.com</p>
                        <p class="text-sm text-gray-500"><strong>Mobile:</strong>0049 9261 60 75 90</p>
                    </div>
                    
                 
                </div>

                <div class="flex justify-end mt-4">
                    <button wire:click="closeModal" class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 hover:bg-gray-300 rounded-md">{{__('basic.Close')}}</button>
                </div>
            </div>
        </div>
    @endif
</div>
