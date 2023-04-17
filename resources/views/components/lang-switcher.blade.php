<nav class="relative" x-data="{ open: false }" @click.away="open = false">
    <button type="button" class="inline-flex items-center justify-center w-full px-1 py-5 text-sm font-medium text-white rounded-md focus:outline-none " @click="open = !open">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
      </svg>
        {{ config('locales.languages')[app()->getLocale()]['name'] }}
      <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </button>
  
    <nav x-show="open" class="absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg z-10">
      @foreach (config('locales.languages') as $key => $lang)
        @if ($key !== app()->getLocale())
          <a href="{{ route('change.language', $key) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ $lang['name'] }}</a>
        @endif
      @endforeach
    </nav>
  </nav>
  