<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Box Types
        </h2>
    </x-slot>

    <div class="container my-12 mx-auto md:px-12 p-5">
        <h1 class="text-2xl p-5 mb-2">Add New Box Type</h1>
        <hr class="mb-5" />

        <form class="form-contact" action="{{ route('admin.boxtype.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-col-2 gap-4">
                <div>
                    <label for="name">Name</label>
                    <input name="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter name" required>
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="depth">Depth</label>
                    <input name="depth" type="number" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter depth" required>
                    @error('depth')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="width">Width</label>
                    <input name="width" type="number" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter width" required>
                    @error('width')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="height">Height</label>
                    <input name="height" type="number" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter height" required>
                    @error('height')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter description" required></textarea>
                    @error('description')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="big">Box is Big</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="big" value="1" class="form-radio text-blue-500 focus:ring-blue-300 focus:border-blue-500">
                            <span class="ml-2">Yes</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" name="big" value="0" class="form-radio text-blue-500 focus:ring-blue-300 focus:border-blue-500">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                    @error('big')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="ebike_option">E-Bike Option</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="ebike_option" value="1" class="form-radio text-blue-500 focus:ring-blue-300 focus:border-blue-500">
                            <span class="ml-2">Yes</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" name="ebike_option" value="0" class="form-radio text-blue-500 focus:ring-blue-300 focus:border-blue-500">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                    @error('ebike_option')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="first_floor_option">First Floor Option</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="first_floor_option" value="1" class="form-radio text-blue-500 focus:ring-blue-300 focus:border-blue-500">
                            <span class="ml-2">Yes</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" name="first_floor_option" value="0" class="form-radio text-blue-500 focus:ring-blue-300 focus:border-blue-500">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                    @error('first_floor_option')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

            <button type="submit" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">Create</button>
        </form>
    </div>
</x-admin>
