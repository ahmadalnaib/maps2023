
<footer class="bg-red-600 dark:bg-gray-900">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0 ">
            <a href="{{ route('home') }}" >
                <x-application-mark class="block h-9  w-auto bg-white p-1  rounded" />
            </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-white uppercase dark:text-white">Resources</h2>
                  <ul class="text-white dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="hhttps://www.lockport.online/de" class="hover:underline">Lockport</a>
                      </li>
                      <li>
                          <a href="https://www.locktec.com/" class="hover:underline">Locktec</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-white uppercase dark:text-white">Follow us</h2>
                  <ul class="text-white dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="https://www.facebook.com/locktecgmbh/" class="hover:underline ">Facebook</a>
                      </li>
                     
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-white uppercase dark:text-white">Legal</h2>
                  <ul class="text-white dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a target="__blank" href="{{url('privacy/Datenschutzerklärung_lockport.pdf')}}" class="hover:underline">{{__('footer.Privacy Policy')}}</a>
                      </li>
                      <li>
                          <a target="__blank" href="{{url('terms/AGB_lockport.online.pdf')}}" class="hover:underline">{{__('footer.Terms &amp; Conditions')}}</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-white sm:text-center dark:text-gray-400">© 2023 <a href="https://www.lockport.online/de" class="hover:underline">Lockport</a>. {{__('actions.All Rights Reserved.')}}
          </span>
          <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
              <a href="https://www.facebook.com/locktecgmbh/" class="text-white hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                  <span class="sr-only">Facebook page</span>
              </a>
          
          </div>
      </div>
    </div>
</footer>
