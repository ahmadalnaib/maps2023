<x-app-layout>
    <div class="pt-4 bg-white">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
           

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-gray-100 shadow-md overflow-hidden sm:rounded-lg prose">
               {{$term->content}}
            </div>
        </div>
    </div>
</x-app-layout>
