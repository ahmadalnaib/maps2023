<nav class="relative" x-data="{ open: false }" @click.away="open = false" style="margin-left: -20px; margin-top:-2px">
    <button type="button" class="inline-flex items-center justify-center w-full px-1 py-5 text-sm font-medium text-white rounded-md focus:outline-none " @click="open = !open">
      <svg class="w-6 h-6 mr-1" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M49.9583 8.33334C26.9583 8.33334 8.33334 27 8.33334 50C8.33334 73 26.9583 91.6667 49.9583 91.6667C73 91.6667 91.6667 73 91.6667 50C91.6667 27 73 8.33334 49.9583 8.33334ZM78.8333 33.3333H66.5417C65.2376 28.1727 63.3066 23.1912 60.7917 18.5C68.3921 21.1167 74.7965 26.3822 78.8333 33.3333ZM50 16.8333C53.4583 21.8333 56.1667 27.375 57.9583 33.3333H42.0417C43.8333 27.375 46.5417 21.8333 50 16.8333ZM17.75 58.3333C17.0833 55.6667 16.6667 52.875 16.6667 50C16.6667 47.125 17.0833 44.3333 17.75 41.6667H31.8333C31.5 44.4167 31.25 47.1667 31.25 50C31.25 52.8333 31.5 55.5833 31.8333 58.3333H17.75ZM21.1667 66.6667H33.4583C34.7917 71.875 36.7083 76.875 39.2083 81.5C31.5999 78.8976 25.191 73.6284 21.1667 66.6667ZM33.4583 33.3333H21.1667C25.191 26.3716 31.5999 21.1024 39.2083 18.5C36.6934 23.1912 34.7624 28.1727 33.4583 33.3333ZM50 83.1667C46.5417 78.1667 43.8333 72.625 42.0417 66.6667H57.9583C56.1667 72.625 53.4583 78.1667 50 83.1667ZM59.75 58.3333H40.25C39.875 55.5833 39.5833 52.8333 39.5833 50C39.5833 47.1667 39.875 44.375 40.25 41.6667H59.75C60.125 44.375 60.4167 47.1667 60.4167 50C60.4167 52.8333 60.125 55.5833 59.75 58.3333ZM60.7917 81.5C63.2917 76.875 65.2083 71.875 66.5417 66.6667H78.8333C74.7965 73.6178 68.3921 78.8833 60.7917 81.5ZM68.1667 58.3333C68.5 55.5833 68.75 52.8333 68.75 50C68.75 47.1667 68.5 44.4167 68.1667 41.6667H82.25C82.9167 44.3333 83.3333 47.125 83.3333 50C83.3333 52.875 82.9167 55.6667 82.25 58.3333H68.1667Z" fill="white"/>
        </svg>
        
        
        {{ config('locales.languages')[app()->getLocale()]['name'] }}
      <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </button>
  
    <nav x-show="open" class="absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg z-10">
      @foreach (config('locales.languages') as $key => $lang)
        @if ($key !== app()->getLocale())
          <a href="{{ route('change.language', $key) }}" class="block px-6 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ $lang['name'] }}</a>
        @endif
      @endforeach
    </nav>
  </nav>
  