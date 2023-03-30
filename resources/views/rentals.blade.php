<x-app-layout>



    <div class="container my-12 mx-auto md:px-12 p-5">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
        @if(isset($rental))
        <h4 class="mt-8 text-lg font-bold">Rental Details</h4>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="bg-gray-200 text-gray-700">
                    <th scope="col" class="px-6 py-3">Door Number</th>
                    <th scope="col" class="px-6 py-3">Start Date</th>
                    <th scope="col" class="px-6 py-3">End Date</th>
                    <th scope="col" class="px-6 py-3">Period</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Door {{ $rental->door->door_number }}</td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $rental->start_time }}</td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $rental->end_time}}</td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $rental->duration }} </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $rental->price }}</td>
                </tr>
            </tbody>
        </table>
    @endif
    
    
    </div>
</x-app-layout>

