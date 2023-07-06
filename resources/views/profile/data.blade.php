<x-action-section>
  <x-slot name="title">
{{__('download.Download information')}}
  </x-slot>
  <x-slot name="description">
{{__('download.You can download a copy of your information such as booking information or personal data at any time.')}}
  </x-slot>

  <x-slot name="content">
      <div class="max-w-xl text-sm text-gray-600">
      
      {{__('download.Downloading your data is a function that only you can perform.')}}
      </div>

      <div class="mt-5">
        <a href="{{route('data.generate')}}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-gray-700" >
        {{__('download.Download')}}
         </a>
      </div>

      <!-- Delete User Confirmation Modal -->
  
  </x-slot>
</x-action-section>
