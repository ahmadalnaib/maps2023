<x-admin>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                             
                                <svg  class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                  </svg>
                                  
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                  {{__('super.Basic Users')}}
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl leading-8 font-semibold text-gray-900">
                                            {{$basicUsers}}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm leading-5">
                            <a href="{{route('admin.user.index')}}"
                               class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                             {{__('super.View all')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                        {{__('super.Tenant Users')}}
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl leading-8 font-semibold text-gray-900">
                                            {{$tenantUsers}}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm leading-5">
                            <a href="{{route('tenant')}}"
                               class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                               {{__('super.View all')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                      {{__('super.logins')}}
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl leading-8 font-semibold text-gray-900">
                                            {{$loginsCount}}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm leading-5">
                            <a href="{{route('userLogin')}}"
                               class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                               {{__('super.View all')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                            
                                  <svg class="h-6 w-6 text-white" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4281 3.2V7.77187H16V3.2H11.4281ZM14.8562 6.62812H12.5719V4.34375H14.8562V6.62812ZM0 13.4875H4.57188V8.91562H0V13.4875ZM1.14375 10.0594H3.42812V12.3437H1.14375V10.0594ZM0 7.77187H4.57188V3.2H0V7.77187ZM1.14375 4.34375H3.42812V6.62812H1.14375V4.34375ZM5.71562 7.77187H10.2875V3.2H5.71562V7.77187ZM6.85625 4.34375H9.14062V6.62812H6.85625V4.34375ZM5.71562 13.4875H10.2875V8.91562H5.71562V13.4875ZM6.85625 10.0594H9.14062V12.3437H6.85625V10.0594ZM11.4281 13.4875H16V8.91562H11.4281V13.4875ZM12.5719 10.0594H14.8562V12.3437H12.5719V10.0594Z" fill="white"/>
                                    </svg>
                                    
                                  
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                     {{__('super.Lockers')}}
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl leading-8 font-semibold text-gray-900">
                                            {{$lockersCount}}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm leading-5">
                            <a href="{{route('supersystem')}}"
                               class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                               {{__('super.View all')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                               
                            
                                  <svg class="h-6 w-6 text-white" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_4_4)">
                                    <path d="M11.3333 14.6667V10.6667C11.3333 9.40933 11.3333 8.78133 10.9427 8.39067C10.552 8 9.92399 8 8.66666 8H7.33332C6.07599 8 5.44799 8 5.05732 8.39067C4.66666 8.78133 4.66666 9.40933 4.66666 10.6667V14.6667" stroke="white"/>
                                    <path opacity="0.5" d="M14 14.6667V5.18133C14 4.288 14 3.84066 13.7627 3.498C13.5253 3.15533 13.1067 2.998 12.2693 2.68466C10.6327 2.07066 9.81466 1.764 9.24066 2.16133C8.66666 2.56 8.66666 3.43333 8.66666 5.18133V8" stroke="white"/>
                                    <path opacity="0.5" d="M2.16665 5.33333C2.16665 5.46594 2.21933 5.59311 2.3131 5.68688C2.40687 5.78065 2.53405 5.83333 2.66665 5.83333C2.79926 5.83333 2.92644 5.78065 3.02021 5.68688C3.11398 5.59311 3.16665 5.46594 3.16665 5.33333H2.16665ZM6.16665 5.33333C6.16665 5.46594 6.21933 5.59311 6.3131 5.68688C6.40687 5.78065 6.53405 5.83333 6.66665 5.83333C6.79926 5.83333 6.92644 5.78065 7.02021 5.68688C7.11398 5.59311 7.16665 5.46594 7.16665 5.33333H6.16665ZM4.16665 2.66666C4.16665 2.79927 4.21933 2.92645 4.3131 3.02022C4.40687 3.11398 4.53405 3.16666 4.66665 3.16666C4.79926 3.16666 4.92644 3.11398 5.02021 3.02022C5.11398 2.92645 5.16665 2.79927 5.16665 2.66666H4.16665ZM5.16665 1.33333C5.16665 1.20072 5.11398 1.07354 5.02021 0.979775C4.92644 0.886007 4.79926 0.833328 4.66665 0.833328C4.53405 0.833328 4.40687 0.886007 4.3131 0.979775C4.21933 1.07354 4.16665 1.20072 4.16665 1.33333H5.16665ZM2.49999 14.6667V8H1.49999V14.6667H2.49999ZM4.66665 5.83333C5.30932 5.83333 5.74132 5.83466 6.06332 5.878C6.37065 5.91933 6.50265 5.99066 6.58932 6.07799L7.29599 5.37C6.99265 5.06666 6.61465 4.94333 6.19599 4.88666C5.79199 4.83199 5.28132 4.83333 4.66665 4.83333V5.83333ZM7.83332 8C7.83332 7.38533 7.83465 6.87466 7.77999 6.47066C7.72399 6.052 7.59999 5.67333 7.29599 5.37L6.58932 6.07799C6.67599 6.16466 6.74732 6.296 6.78932 6.604C6.83199 6.92533 6.83332 7.35733 6.83332 8H7.83332ZM4.66665 4.83333C4.05199 4.83333 3.54132 4.83199 3.13732 4.88666C2.71865 4.94266 2.34065 5.06666 2.03732 5.37L2.74399 6.07733C2.83065 5.99066 2.96265 5.91933 3.27065 5.87733C3.59199 5.83466 4.02399 5.83333 4.66665 5.83333V4.83333ZM2.49999 8C2.49999 7.35733 2.50132 6.92533 2.54465 6.60333C2.58599 6.29599 2.65665 6.164 2.74399 6.07733L2.03665 5.37066C1.73332 5.67399 1.60999 6.052 1.55332 6.47066C1.49865 6.87466 1.49999 7.38533 1.49999 8H2.49999ZM3.16665 5.33333V4.33333H2.16665V5.33333H3.16665ZM3.99999 3.49999H5.33332V2.49999H3.99999V3.49999ZM6.16665 4.33333V5.33333H7.16665V4.33333H6.16665ZM5.33332 3.49999C5.66199 3.49999 5.85799 3.50133 5.99799 3.52C6.03907 3.52424 6.07942 3.53388 6.11799 3.54866L6.82465 2.84199C6.61865 2.63533 6.36865 2.56066 6.13132 2.52866C5.90865 2.49866 5.63332 2.49999 5.33332 2.49999V3.49999ZM7.16665 4.33333C7.16665 4.03333 7.16799 3.75799 7.13799 3.53533C7.10599 3.29799 7.03132 3.04799 6.82465 2.84199L6.11799 3.54866L6.11865 3.55066C6.13304 3.58862 6.14245 3.62829 6.14665 3.66866C6.16532 3.80866 6.16665 4.00466 6.16665 4.33333H7.16665ZM3.16665 4.33333C3.16665 4.00466 3.16799 3.80866 3.18665 3.66866C3.1909 3.62758 3.20054 3.58723 3.21532 3.54866L2.50865 2.84199C2.30199 3.04799 2.22732 3.29799 2.19532 3.53533C2.16532 3.75799 2.16665 4.03333 2.16665 4.33333H3.16665ZM3.99999 2.49999C3.69999 2.49999 3.42465 2.49866 3.20199 2.52866C2.96465 2.56066 2.71465 2.63533 2.50865 2.84199L3.21532 3.54866L3.21732 3.548C3.25528 3.53361 3.29494 3.5242 3.33532 3.52C3.47532 3.50133 3.67132 3.49999 3.99999 3.49999V2.49999ZM5.16665 2.66666V1.33333H4.16665V2.66666H5.16665Z" fill="white"/>
                                    <path d="M14.6667 14.6667H1.33333" stroke="white" stroke-linecap="round"/>
                                    <path opacity="0.5" d="M6.66666 10H9.33333M6.66666 12H9.33333" stroke="white" stroke-linecap="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_4_4">
                                    <rect width="16" height="16" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                    
                                  
                                  
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                        {{__('super.state')}}
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl leading-8 font-semibold text-gray-900">
                                            {{$citycount}}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm leading-5">
                            <a href="{{ route('category.admin.index') }}"
                               class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                               {{__('super.View all')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                               
                              
                             
                                  <svg  class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                                  </svg>
                                  
                                  
                                  
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                     {{__('super.Rentals')}}
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl leading-8 font-semibold text-gray-900">
                                            {{$rentCount}}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm leading-5">
                            <a href="{{route('superrental')}}"
                               class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                               {{__('super.View all')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                               
                              
                             
                          
                               

                                  <svg class="h-6 w-6 text-white" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_5_11" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="1" y="0" width="14" height="16">
                                    <path d="M6.66666 1.33333V14.6667L14 12.6667V3.33333L6.66666 1.33333Z" fill="white" stroke="white" stroke-width="1.33333" stroke-linejoin="round"/>
                                    <path d="M2 3.33333H6.66667V12.6667H2V3.33333Z" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.33334 7.33333V8.66666" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                    </mask>
                                    <g mask="url(#mask0_5_11)">
                                    <path d="M0 0H16V16H0V0Z" fill="white"/>
                                    </g>
                                    </svg>
                                    
                                  
                                  
                                  
                                  
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                      {{__('super.door')}}
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl leading-8 font-semibold text-gray-900">
                                            {{$doorCount}}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm leading-5">
                            <a href="{{route('superbox')}}"
                               class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                               {{__('super.View all')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                               
                
        
                                  <svg class="h-6 w-6 text-white" viewBox="0 0 11 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_5_19)">
                                    <path d="M10.2008 3.80327C10.179 3.7377 10.1407 3.63387 10.0861 3.4918C10.0314 3.34972 9.99317 3.25682 9.97131 3.21311C9.5123 2.14207 8.84017 1.34972 7.95492 0.836059C7.06967 0.322398 6.14618 0.065567 5.18443 0.065567C3.93853 0.065567 2.81284 0.475403 1.80738 1.29508C0.801915 2.11475 0.211752 3.26775 0.0368881 4.75409V5.37704L0.069675 5.54098V5.77048C0.113391 6.12021 0.228145 6.51912 0.413937 6.96721C0.59973 7.41529 0.769129 7.77595 0.922134 8.04917C1.07514 8.3224 1.32104 8.7377 1.65984 9.29507C1.99864 9.85245 2.22268 10.2186 2.33197 10.3934C2.96585 11.4645 3.93853 13.0492 5.25 15.1475C5.42487 14.8634 6.02596 13.8361 7.05328 12.0656C7.097 12 7.17896 11.8688 7.29918 11.6721C7.4194 11.4754 7.50137 11.3224 7.54508 11.2131C7.5888 11.1475 7.65984 11.0546 7.7582 10.9344C7.85656 10.8142 7.9276 10.7213 7.97131 10.6557C8.12432 10.3716 8.45765 9.83059 8.97131 9.03278C9.48498 8.23497 9.86202 7.56283 10.1025 7.01639C10.3429 6.46994 10.4631 5.93442 10.4631 5.40983V4.68852C10.4631 4.44808 10.3757 4.153 10.2008 3.80327ZM5.21722 7.04917C4.36476 7.04917 3.77459 6.63387 3.44672 5.80327C3.42487 5.69398 3.41394 5.53005 3.41394 5.31147V4.88524C3.41394 4.33879 3.59973 3.91803 3.97131 3.62294C4.3429 3.32786 4.78006 3.18032 5.28279 3.18032C5.82924 3.18032 6.28279 3.36611 6.64345 3.7377C7.0041 4.10928 7.18443 4.5683 7.18443 5.11475C7.18443 5.6612 6.99317 6.12021 6.61066 6.4918C6.22814 6.86338 5.76366 7.04917 5.21722 7.04917Z" fill="white"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_5_19">
                                    <rect width="10.5" height="16" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                  
                                  
                                  
                                  
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                        {{__('super.places')}}
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl leading-8 font-semibold text-gray-900">
                                            {{$placeCount}}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm leading-5">
                            <a href=""
                               class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                               {{__('super.View all')}}
                            </a>
                        </div>
                    </div>
                </div>
           
           
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                               
                              
                             
                          
                           
                                  
                    
                                

                                  <svg class="h-6 w-6 text-white" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_9_23)">
                                    <path d="M1.5 1V15H6.5C6.44792 15.1667 6.39844 15.3333 6.35156 15.5C6.30469 15.6667 6.26042 15.8333 6.21875 16H0.5V0H14.5V5.78906C14.3177 5.8151 14.1458 5.85677 13.9844 5.91406C13.8229 5.97135 13.6615 6.04948 13.5 6.14844V1H1.5ZM16.5078 8.54688C16.5078 8.75 16.4688 8.94792 16.3906 9.14062C16.3125 9.33333 16.2005 9.5026 16.0547 9.64844L10.4531 15.25L7.50781 15.9844L8.24219 13.0391L13.8438 7.44531C13.9948 7.29427 14.1615 7.18229 14.3438 7.10938C14.526 7.03646 14.7266 7 14.9453 7C15.1641 7 15.3672 7.03906 15.5547 7.11719C15.7422 7.19531 15.9089 7.30208 16.0547 7.4375C16.2005 7.57292 16.3099 7.73698 16.3828 7.92969C16.4557 8.1224 16.4974 8.32812 16.5078 8.54688ZM15.5078 8.54688C15.5078 8.38021 15.4557 8.2474 15.3516 8.14844C15.2474 8.04948 15.112 8 14.9453 8C14.8724 8 14.8021 8.01042 14.7344 8.03125C14.6667 8.05208 14.6068 8.09115 14.5547 8.14844L9.14844 13.5547L8.88281 14.6094L9.9375 14.3438L15.3438 8.94531C15.4531 8.83594 15.5078 8.70312 15.5078 8.54688ZM12.5 7H2.5V2.01562H12.5V7ZM3.5 3V6H11.5V3H3.5ZM3.5 12H7.51562L7.32031 12.1953C7.25781 12.2578 7.1875 12.3255 7.10938 12.3984C7.08333 12.5026 7.0599 12.6042 7.03906 12.7031C7.01823 12.8021 6.99219 12.901 6.96094 13H2.5V8H11.5156L10.5078 9H3.5V12Z" fill="white"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_9_23">
                                    <rect width="16" height="16" fill="white" transform="translate(0.5)"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                    
                                  
                                  
                                  
                                  
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                     {{__('super.Pages')}}
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl leading-8 font-semibold text-gray-900">
                                          
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm leading-5">
                            <a href="{{route('pages')}}"
                               class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                               {{__('super.View all')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                                                     

                                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                  </svg>
                                  
                                    
                                  
                                  
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                        {{__('super.Diagram')}}
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl leading-8 font-semibold text-gray-900">
                                          
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm leading-5">
                            <a href=""
                               class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                               {{__('super.View all')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                                                     
                                <svg class="h-6 w-6 text-white"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  </svg>
                                  
                                  
                                    
                                  
                                  
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                        Impersonate
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl leading-8 font-semibold text-gray-900">
                                          
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm leading-5">
                            <a href="{{route('team.index')}}"
                               class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                               {{__('super.View all')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  </x-admin>