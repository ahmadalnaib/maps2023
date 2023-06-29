<x-admin>
  <x-slot name="header" >
      <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
       {{__('type.Boxes Types')}}
      </h2>
  </x-slot>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam,'create'))
          <a href="{{route('admin.boxtype.create')}}" type="button" class="py-2.5 px-5 mr-2 mb-10 text-sm font-medium text-white focus:outline-none bg-slate-500 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{__('type.Create new Box Type')}}</a>
          @endif
<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
  @if($boxTypes->count())
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
            {{__('type.Box Type Name')}}
              </th>
              <th scope="col" class="px-6 py-3">
         {{__('type.Depth')}}
              </th>
              <th scope="col" class="px-6 py-3">
                {{__('type.Width')}}
              </th>
              <th scope="col" class="px-6 py-3">
                {{__('type.Height')}}
              </th>
              <th scope="col" class="px-6 py-3">
             {{__('type.Description')}}
              </th>
              <th scope="col" class="px-6 py-3">
             {{__('type.Box Size')}}
              </th>
              <th scope="col" class="px-6 py-3">
              {{__('type.Box Type')}}
              </th>
              <th scope="col" class="px-6 py-3">
            {{__('type.Box Floor')}}
              </th>
             
              
           
         
              <th scope="col" class="px-6 py-3 ">
              {{__('place.Action')}}
              </th>
              <th></th>
              
          </tr>
      </thead>
      <tbody>
          @foreach($boxTypes as $type)
          <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{$type->name}}
              </th>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$type->depth}}
              </th>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$type->width}}
              </th>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$type->height}}
              </th>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
               
                {{ Str::limit($type->description, 30) }}
              </th>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $type->big ? 'Groß' : 'Klein' }}

              </th>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $type->ebike_option ? 'Mit elektrischer Ladung' : 'Ohne elektrische Ladung' }}

              </th>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$type->first_floor_option ? "Erster Etage" : "Zweite Etage"}}
              </th>
             
           
             
             
            
              <td class="px-6 py-4 flex  flex-wrap">
                @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam,'update'))
                  <a href="{{route('admin.boxtype.edit',$type)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline m-2">{{__('place.Edit')}}</a>
                 @endif
                 @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam,'delete'))
                      <form action="{{route('admin.boxtype.destroy',$type)}}" method="post">
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
  
  {!! $boxTypes->links() !!}
</div>
@else
<div class="text-center p-4 bg-gray-100">
  <p>{{__('type.there_are_no_products')}}</p>
</div>
@endif
      </div>
  </div>
</x-admin>
