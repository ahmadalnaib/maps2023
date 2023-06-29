<x-app-layout>


  <div class="container my-12 mx-auto md:px-12 bg-white border px-4">
    @if (session('success'))
      <x-alert color="blue" message="{{session('success')}}"/>
    @endif
    <form action="{{route('report.store')}}" method="post">
     @csrf
     <h4 class="mb-4 mt-4">Report</h4>
     <hr/>
     <div class="mt-4">
      <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400" value="{{rawurldecode(url()->previous())}}" id="place_url" name="place_url" readonly>
      
     </div>
     <div class="">
      <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400" name="name" placeholder="Name" value="{{auth()->user()->name}}" readonly>
      
     </div>
     <div class="">
      <input type="email" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400" name="email" placeholder="Email" value="{{auth()->user()->email}}" readonly>
      
     </div>
     <input type="submit" class="mt-3 bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none mb-3" value="Report">
    </form>
  </div>
</x-app-layout>
