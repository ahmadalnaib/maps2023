<x-admin>
  <x-slot name="header" >
    <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
     {{__('super.Pages')}}
    </h2>
</x-slot>
  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="py-3 px-4 text-left text-gray-700">{{__('super.Page Name')}}</th>
          <th class="py-3 px-4 text-left text-gray-700">{{__('super.view')}}</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr>
          <td class="py-3 px-4">{{__('nav.How it works')}}</td>
          <td class="py-3 px-4"><a href="{{route('how.edit')}}"><span class="text-red-800 text-4xl">&#8594;</span></a></td>
        </tr>
        <tr>
          <td class="py-3 px-4">FAQ</td>
          <td class="py-3 px-4"><a href="{{route('faq.edit')}}"><span class="text-red-800 text-4xl">&#8594;</span></a></td>
        </tr>

        <tr>
          <td class="py-3 px-4">Preis</td>
          <td class="py-3 px-4"><a href="{{route('price.edit')}}"><span class="text-red-800 text-4xl">&#8594;</span></a></td>
        </tr>
        <tr>
          <td class="py-3 px-4">Policy</td>
          <td class="py-3 px-4"><a href="{{route('policy.edit')}}"><span class="text-red-800 text-4xl">&#8594;</span></a></td>
        </tr>
        <tr>
          <td class="py-3 px-4">Terms</td>
          <td class="py-3 px-4"><a href="{{route('term.edit')}}"><span class="text-red-800 text-4xl">&#8594;</span></a></td>
        </tr>
        <!-- Add more rows for other pages -->
      </tbody>
    </table>
  </div>
    </div>
  </div>
</x-admin>