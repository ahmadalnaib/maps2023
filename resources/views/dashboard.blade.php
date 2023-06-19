<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8 ">
   
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-10 mt-5 mb-24">
           <livewire:stats.users-count/>
           <livewire:stats.rentals-count/>
           <livewire:stats.revenue-count/>
           
              
              
              
        </div>
            <div class="bg-white border overflow-hidden shadow-xl sm:rounded-lg p-5">
            
               <livewire:chart-orders/>
               
         
            </div>
            <div class="bg-gray-100 border overflow-hidden shadow-xl sm:rounded-lg p-5 mt-5">
                <livewire:rentals-table />
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @endpush
</x-admin>
