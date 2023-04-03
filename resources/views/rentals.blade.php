<x-app-layout>
    <div class="container my-12 mx-auto md:px-12 p-5">
        <div class="bg-white rounded-lg shadow-xl overflow-hidden">
            @if(isset($rental))
                <div class="px-4 py-5 sm:px-6">
                    <h4 class="mt-2 text-lg font-bold">Rental Details</h4>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Door Number
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                0 {{ $rental->door->door_number }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Start Date
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $rental->start_time }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                End Date
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $rental->end_time}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Period
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $rental->duration }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Price
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $rental->price }} &#8364;
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:px-6 flex justify-end">
                            <form method="POST">
                                @csrf
                                <a href="{{route('success')}}" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Pay with PayPal</a>
                            </form>
                            <a href="{{route('cancel')}}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">Cancel</a>
                        </div>
                    </dl>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>


