


<x-admin>
    
    <section class="pt-20 pb-32 bg-white">
        <div class="px-20 mx-auto max-w-7xl">
         
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-16 lg:gap-x-24 gap-y-20">
                <a href="{{route('invoices.index')}}" class="border p-4 rounded-xl shadow-sm">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 text-red-600 bg-red-100 rounded-full" data-primary="red-600" data-rounded="rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
                          </svg>
                          
                    </div>
                    <h3 class="mb-2 text-base font-semibold leading-tight text-gray-900 lg:text-lg">{{__('basic.Purchases')}}</h3>
                    <p class="text-sm text-gray-500 lg:text-base">{{__("basic.Here you'll find all your purchased Lockers.")}}</p>
                </a>
    
                <a href="{{route('profile.show')}}" class="border p-4 rounded-xl shadow-sm">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 text-green-600 bg-green-100 rounded-full" data-primary="green-600" data-rounded="rounded-full">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-base font-semibold leading-tight text-gray-900 lg:text-lg">{{__('basic.Profile Configuration')}}</h3>
                    <p class="text-sm text-gray-500 lg:text-base">{{__("basic.Here you'll find all your Info.")}}</p>
                </a>

                <livewire:basic-modal />
    
             
    
            </div>
        </div>
    </section>
</x-admin>
