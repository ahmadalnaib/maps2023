<x-admin>
  <x-slot name="header" >
    <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
     Pages
    </h2>
</x-slot>
  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="py-3 px-4 text-left text-gray-700">Page Name</th>
          <th class="py-3 px-4 text-left text-gray-700">Visit Page</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr>
          <td class="py-3 px-4">{{__('nav.How it works')}}</td>
          <td class="py-3 px-4"><a href="{{route('how.edit')}}"><span class="text-red-800 text-4xl">&#8594;</span></a></td>
        </tr>
        <tr>
          <td class="py-3 px-4">About</td>
          <td class="py-3 px-4"><a href="/about">About</a></td>
        </tr>
        <!-- Add more rows for other pages -->
      </tbody>
    </table>
  </div>
    </div>
  </div>
</x-admin>