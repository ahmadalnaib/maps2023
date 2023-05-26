<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('door.Doors') }}
        </h2>
    </x-slot>
    <div class="container my-12 mx-auto md:px-12 p-5">
        <h1 class="text-2xl p-5 mb-2">{{__('door.Edit Door')}}</h1>
        <hr class="mb-5"/>
        <form class="form-contact" action="{{ route('admin.door.update', $door) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-col-2 gap-4">
                <div>
                    <label for="door_number">{{__('door.Door number')}}</label>
                    <input name="door_number" type="text" value="{{ $door->door_number }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('door_number')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="locker_id">{{__('door.Choose Locker')}}</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="locker_id" id="locker_id">
                        @foreach ($lockers as $locker)
                            <option value="{{ $locker->id }}" @if ($locker->id === $door->locker_id) selected @endif>{{ $locker->locker_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="size">{{__('door.Choose Locker')}}</label>
                    <select name="size" id="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="big" @if ($door->size === 'big') selected @endif>{{__('door.Big')}}</option>
                        <option value="small" @if ($door->size === 'small') selected @endif>{{__('door.Small')}}</option>
                    </select>
                </div>
                <div>
                    <label for="charge">{{__('door.Charge')}}</label>
                    <input name="charge" type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" @if ($door->charge) checked @endif>
                </div>
                
            </div>
            <button type="submit" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">{{__('place.Update')}}</button>
        </form>
    </div>
</x-admin>
