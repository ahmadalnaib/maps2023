<div>
    <input type="text" wire:model.debounce.300ms="search" placeholder="{{__('admin.Search Rentals...')}}" class="border border-gray-300 rounded px-4 py-2 mb-4">

    <table class="min-w-full divide-y divide-slate-200 ">
        <!-- Table header -->
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">System</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Box</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Plan</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('rental.Valid from')}}</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('rental.Booked until')}}</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('rental.Price')}}</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{__('admin.Created At')}}</th>
                <!-- Add more table columns as needed -->
            </tr>
        </thead>
        
        <!-- Table body -->
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($rentals as $rental)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap">
                    {{ $rental->user->name }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    {{ $rental->user->email }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    {{ $rental->system->system_name }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    {{ $rental->box->number }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    {{ $rental->duration }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    {{ $rental->start_time }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    {{ $rental->end_time }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    {{ $rental->price }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    {{ $rental->created_at }}
                </td>
                <!-- Add more table cells for other rental attributes -->
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $rentals->links() }} <!-- Display the pagination links -->
    </div>
</div>
