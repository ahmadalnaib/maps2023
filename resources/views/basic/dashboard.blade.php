


<x-admin>
    <section class="pt-20 pb-32 bg-white">
        <div class="px-20 mx-auto max-w-7xl">
         
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-16 lg:gap-x-24 gap-y-20">
                <a href="{{route('invoices.index')}}" class="border p-4 rounded-xl shadow-sm">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 text-red-600 bg-red-100 rounded-full" data-primary="red-600" data-rounded="rounded-full">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-base font-semibold leading-tight text-gray-900 lg:text-lg">Purchases</h3>
                    <p class="text-sm text-gray-500 lg:text-base">Here you'll find all your purchased Lockers.</p>
                </a>
    
                <a href="{{route('profile.show')}}" class="border p-4 rounded-xl shadow-sm">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 text-green-600 bg-green-100 rounded-full" data-primary="green-600" data-rounded="rounded-full">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-base font-semibold leading-tight text-gray-900 lg:text-lg">Profile Configuration</h3>
                    <p class="text-sm text-gray-500 lg:text-base">Here you'll find all your Info.</p>
                </a>
    
                <a href="" class="border p-4 rounded-xl shadow-sm">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 text-blue-600 bg-blue-100 rounded-full" data-primary="blue-600" data-rounded="rounded-full">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-base font-semibold leading-tight text-gray-900 lg:text-lg">Need help and support</h3>
                    <p class="text-sm text-gray-500 lg:text-base">For any issues, just contact us here and we'll be able to help</p>
                </a>
    
             
    
            </div>
        </div>
    </section>
</x-admin>
