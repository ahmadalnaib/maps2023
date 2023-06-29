<div class="flex flex-col">
    <form wire:submit.prevent="createUser" class="space-y-4">
        <div class="flex flex-col">
            <label for="name" class="text-gray-700">Name</label>
            <input type="text" wire:model="name" id="name" placeholder="Name"
                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col">
            <label for="email" class="text-gray-700">Email</label>
            <input type="email" wire:model="email" id="email" placeholder="Email"
                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col">
            <label for="address" class="text-gray-700">address</label>
            <input type="address" wire:model="address" id="address" placeholder="address"
                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col">
            <label for="phone_number" class="text-gray-700">phone_number</label>
            <input type="phone_number" wire:model="phone_number" id="phone_number" placeholder="phone_number"
                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('phone_number') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col">
            <label for="role" class="text-gray-700">Role</label>
            <div class="space-x-4">
                <label>
                    <input type="radio" wire:model="role" value="admin" class="form-radio text-indigo-600">
                    <span class="ml-2 text-gray-700">Admin</span>
                </label>
                <label>
                    <input type="radio" wire:model="role" value="user" class="form-radio text-indigo-600">
                    <span class="ml-2 text-gray-700">User</span>
                </label>
            </div>
            @error('role') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col">
            <label for="password" class="text-gray-700">Password</label>
            <input type="password" wire:model="password" id="password" placeholder="Password"
                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit"
            class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none"
            wire:loading.attr="disabled">
            <span wire:loading wire:target="createUser" class="mr-2">
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </span>
            Create User
        </button>
    </form>

    @if (session()->has('message'))
        <div class="mt-4 text-gray-700">{{ session('message') }}</div>
    @endif
</div>
