<x-admin>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('locker.Lockers') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam,'create'))
            <a href="{{route('admin.locker.create')}}" type="button" class="py-2.5 px-5 mr-2 mb-10 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 ">{{__('locker.Create New Locker')}}</a>
            @endif
<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    @if($lockers->count())
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   {{__('locker.Locker name')}}
                </th>
                <th scope="col" class="px-6 py-3">
                  Address
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
            @foreach($lockers as $locker)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$locker->locker_name}}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$locker->address}}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$locker->place->name ?? "Error"}}
                </th>
             
               
               
              
                <td class="px-6 py-4 flex  flex-wrap">
                    @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam,'update'))
                    <a href="{{route('admin.locker.edit',$locker)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline m-2">{{__('place.Edit')}}</a>
                    @endif
                    @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam,'delete'))
                        <form action="{{route('admin.locker.destroy',$locker)}}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Sind Sie sicher, dass du diesen Beitrag löschen möchtest? Es gibt keinen Weg zurück. 😯')"    class="font-medium text-red-600 dark:text-red-500 hover:underline m-2" type="submit">{{__('place.delete')}}</button>
                        </form>
                        @endif
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">
    
    {!! $lockers->links() !!}
</div>
@else
<div class="text-center p-4 bg-gray-100">
    <p>{{__('actions.there_are_no_products')}}</p>
</div>
@endif
        </div>
    </div>
</x-admin>
