<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('locker.Lockers') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <a href="{{route('admin.system.create')}}" type="button" class="py-2.5 px-5 mr-2 mb-10 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 ">{{__('locker.Create New Locker')}}</a>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    @if($systems->count())
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   {{__('locker.Locker name')}}
                </th>
               
                <th scope="col" class="px-6 py-3">
                   {{__('locker.Place name')}}
                </th>
           
                <th scope="col" class="px-6 py-3 ">
                    {{__('place.Action')}}
                </th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($systems as $system)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$system->system_name}}
                </th>
              
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$system->place->name ?? "Error"}}
                </th>
             
               
               
              
                <td class="px-6 py-4 flex  flex-wrap">
                    <a href="{{route('admin.system.edit',$system)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline m-2">{{__('place.Edit')}}</a>
                   
    
                        <form action="{{route('admin.system.destroy',$system)}}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Sind Sie sicher, dass du diesen Beitrag löschen möchtest? Es gibt keinen Weg zurück. 😯')"    class="font-medium text-red-600 dark:text-red-500 hover:underline m-2" type="submit">{{__('place.delete')}}</button>
                        </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">
    
    {!! $systems->links() !!}
</div>
@else
<div class="text-center p-4 bg-gray-100">
    <p>No System</p>
</div>
@endif
        </div>
    </div>
</x-admin>
