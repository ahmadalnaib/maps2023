<div class="flex flex-col">
    <form wire:submit.prevent="createUser" class="space-y-4">
        <div class="flex flex-col">
            <label for="name" class="text-gray-700">Name</label>
            <input type="text" wire:model="name" id="name" placeholder="Name"
                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="flex flex-col">
            <label for="email" class="text-gray-700">Email</label>
            <input type="email" wire:model="email" id="email" placeholder="Email"
                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
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
        </div>

        <div class="flex flex-col">
            <label for="password" class="text-gray-700">Password</label>
            <input type="password" wire:model="password" id="password" placeholder="Password"
                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

  

        <button type="submit"
            class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none">
            Create User
        </button>
    </form>

    @if (session()->has('message'))
        <div class="mt-4 text-gray-700">{{ session('message') }}</div>
    @endif
</div>
