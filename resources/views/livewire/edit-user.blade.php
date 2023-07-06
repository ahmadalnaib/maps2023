<div>
  <form wire:submit.prevent="updateUser">
      <div class="flex flex-col">
          <label for="name" class="text-gray-700">Name</label>
          <input type="text" wire:model="user.name" id="name" placeholder="Name"
              class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <div class="flex flex-col">
          <label for="email" class="text-gray-700">Email</label>
          <input type="email" wire:model="user.email" id="email" placeholder="Email"
              class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
      </div>
      <div class="flex flex-col">
        <label for="address" class="text-gray-700">Adress</label>
        <input type="text" wire:model="user.address" id="address" placeholder="Adress"
            class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    </div>
    <div class="flex flex-col">
        <label for="phone_number" class="text-gray-700">Phone number</label>
        <input type="phone_number" wire:model="user.phone_number" id="phone_number" placeholder="Email"
            class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    </div>

      <div class="flex flex-col">
          <label for="role" class="text-gray-700">Role</label>
          <select wire:model="user.role" id="role"
              class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              <option value="admin">Admin</option>
              <option value="user">User</option>
          </select>
      </div>

      <div class="flex flex-col">
          <label for="password" class="text-gray-700">Password</label>
          <input type="password" wire:model="user.password" id="password" placeholder="Password"
              class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <div class="flex justify-between mt-4">
          <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-500">Save</button>
          <button type="button" wire:click="cancelEdit" class="text-red-600">Cancel</button>
      </div>
  </form>
</div>
