<x-app-layout>
    <section class="relative flex flex-col items-center justify-center w-full px-6 py-24 bg-white bg-cover lg:py-32 min-w-screen">
        <div class="flex flex-col items-center justify-center mx-auto sm:p-6 xl:p-8 lg:flex-row lg:max-w-6xl lg:p-0">
            <div class="container relative z-20 flex flex-col w-full px-5 pb-1 pr-12 mb-16 text-2xl text-gray-700 lg:w-1/2 sm:pr-0 md:pr-6 md:pl-0 lg:pl-5 xl:pr-10 sm:items-center lg:items-start lg:mb-0">
                <h1 class="relative z-20 text-5xl font-extrabold leading-none text-red-600 xl:text-6xl sm:text-center lg:text-left" data-primary="purple-500">
                   {!! $how->main_title !!}<br>
                  
                </h1>
                <p class="relative z-20 block mt-6 text-base text-gray-500 xl:text-xl sm:text-center lg:text-left">{!! $how->main_subtitle !!}</p>
                <div class="relative flex mt-4">
                    <a href="#park" class="flex items-center self-start justify-center px-5 py-2 mt-5 text-base font-medium leading-tight text-white transition duration-150 ease-in-out bg-red-500 border border-transparent rounded-full shadow lg:py-4 hover:bg-red-600 focus:outline-none focus:border-red-600 focus:shadow-outline-red md:text-lg xl:text-xl md:px-5 xl:px-10" data-primary="red-500" data-rounded="rounded-full">{{__('how.Get Started')}}</a>
                    <a href="#_" class="relative flex items-center self-start justify-center py-2 pl-10 pr-5 mt-5 ml-5 text-base font-medium leading-tight text-gray-400 transition duration-150 ease-in-out bg-gray-100 border-transparent rounded-full shadow-sm lg:py-4 md:pl-16 md:pr-5 xl:pr-10 hover:text-red-500 focus:outline-none md:text-lg xl:text-xl" data-primary="red-500" data-rounded="rounded-full" onclick="toggleVideo()">
                        <svg class="absolute left-0 w-6 h-6 ml-3 md:w-10 md:h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg>
                        <span class="text-red-500" data-primary="red-600">{{__('how.How It Works')}}</span>
                    </a>
                </div>
            </div>
            <div class="relative w-full px-5 rounded-lg cursor-pointer lg:w-1/2 group xl:px-0">
                <div id="videoContainer" class="absolute top-0 left-0 w-11/12 -mt-20 opacity-50">
                    <svg class="w-full h-full ml-4 text-res-100" data-primary="red-500" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M45,-78C58.3,-70.3,69,-58.2,75.2,-44.4C81.3,-30.7,82.9,-15.3,83.5,0.4C84.2,16,83.8,32.1,76.5,43.9C69.2,55.7,55.1,63.3,41.2,69.4C27.3,75.4,13.6,80,-0.7,81.2C-15.1,82.5,-30.1,80.3,-41.2,72.6C-52.2,64.9,-59.2,51.6,-67.1,38.5C-75.1,25.5,-83.9,12.8,-83.8,0C-83.8,-12.7,-74.9,-25.4,-65.8,-36.4C-56.7,-47.4,-47.4,-56.7,-36.4,-65.7C-25.4,-74.7,-12.7,-83.5,1.6,-86.2C15.9,-89,31.8,-85.7,45,-78Z" transform="translate(100 100)"></path></svg>
                </div>
                <div class="relative overflow-hidden rounded-md  cursor-pointer group">
                    <div id="player" class="embed-container">
                        <iframe id="videoFrame" width="500px" height="300px" src="{{$how->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="park" class="w-full py-20 bg-gray-50 ">
        <div class="px-10 mx-auto max-w-7xl">
            <div class="px-10 mb-8 space-y-5 lg:px-0 lg:text-center lg:mb-16">
                <h2 class="text-4xl font-bold sm:text-5xl">{{__('how.How do I use a locker?')}}</h2>
                <p class="text-lg text-gray-600 w-ful sm:text-xl"></p>
            </div>
            <div class="grid overflow-hidden lg:rounded-xl">
                <div class="grid items-center lg:grid-cols-2">
                    <div class="flex flex-col items-start justify-center h-full py-16 pl-16 pr-16 space-y-4 bg-white lg:pr-20 lg:py-0">
                        <h3 class="text-2xl font-semibold sm:text-4xl">{!! $how->title_one !!}</h3>
                        <p class="text-lg text-gray-600">
                           {!! $how->subtitle_one !!}
                        </p>
                    </div>
                    <div class="overflow-hidden bg-gray-100 h-96">
                        <img src="{{ asset('/images/howpage/markup.png') }}" class="object-cover w-full h-full" alt="">
                    </div>
                </div>
    
                <div class="grid items-center lg:grid-cols-2">
                    <div class="order-last overflow-hidden bg-gray-100 h-96 lg:order-first">
                        <img src="{{ asset('/images/howpage/mob.png') }}" class="object-cover w-full h-full" alt="">
                    </div>
                    <div class="flex flex-col items-start justify-center h-full py-16 pl-16 pr-16 space-y-4 bg-white lg:pr-20 lg:py-0">
                        <h3 class="text-2xl font-semibold sm:text-4xl">{!! $how->title_two !!}</h3>
                        <p class="text-lg text-left text-gray-600">{!! $how->subtitle_two !!}</p>
                     
                    </div>
                </div>
    
                <div class="grid items-center lg:grid-cols-2">
                    <div class="flex flex-col items-start justify-center h-full py-16 pl-16 pr-16 space-y-4 bg-white lg:pr-20 lg:py-0">
                        <h3 class="text-2xl font-semibold sm:text-4xl">{!! $how->title_three !!}</h3>
                        <p class="text-lg text-left text-gray-600">{!! $how->subtitle_three !!}</p>
                    </div>
                    <div class="bg-gray-100 h-full">
                        <img  src="{{ asset('/images/howpage/bike.jpg') }}" class="object-cover w-full h-full" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="w-full bg-white " >
        <div class="px-10 pt-16 pb-16 ml-auto mr-auto max-w-7xl md:px-24 lg:px-12 lg:py-20">
            <div class="grid gap-5 lg:grid-cols-2">
                <div class="flex flex-col justify-center md:pr-8 xl:pr-0 lg:max-w-lg">
                    <div class="flex items-center justify-center w-16 h-16 mb-5 rounded-full bg-gradient-to-r from-red-500 to-red-500">
                       
                        <svg width="211" height="211" viewBox="0 0 211 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M105.091 0C47.1397 0 6.51641e-05 47.1396 6.51641e-05 105.091C-0.0164979 119.925 3.12456 134.593 9.21448 148.12C25.6843 184.674 62.4578 210.182 105.091 210.182C132.958 210.167 159.68 199.09 179.385 179.385C199.09 159.68 210.167 132.958 210.182 105.091C210.182 47.1397 163.034 0 105.091 0ZM192.039 147.338C184.103 163.647 171.744 177.399 156.371 187.024C140.998 196.649 123.229 201.76 105.091 201.775C64.1224 201.775 29.022 176.158 14.9734 140.099C10.6195 128.942 8.39245 117.068 8.40733 105.091C8.40733 51.7804 51.7805 8.40729 105.091 8.40729C158.402 8.40729 201.775 51.7804 201.775 105.091C201.793 119.731 198.463 134.182 192.039 147.338Z" fill="white"/>
                            <path d="M105.091 210.494C85.185 210.478 65.6893 204.832 48.8552 194.208C32.0211 183.584 18.5351 168.415 9.95449 150.453C9.61198 149.737 9.46328 148.943 9.52321 148.152C9.58314 147.36 9.84961 146.598 10.296 145.942L10.3524 145.859C10.7982 145.213 11.406 144.696 12.1148 144.359C12.8237 144.023 13.6086 143.878 14.3908 143.941C15.173 144.004 15.925 144.271 16.5714 144.716C17.2177 145.161 17.7355 145.768 18.073 146.477C34.0169 179.879 68.1735 201.463 105.091 201.463C121.962 201.42 138.528 196.967 153.147 188.545C167.766 180.124 179.928 168.026 188.429 153.453C188.824 152.769 189.393 152.201 190.079 151.808C190.764 151.415 191.542 151.211 192.332 151.216C193.114 151.213 193.883 151.42 194.558 151.814C195.234 152.208 195.792 152.775 196.176 153.456L196.225 153.542C196.614 154.23 196.816 155.007 196.812 155.797C196.808 156.588 196.597 157.363 196.201 158.046C186.901 173.97 173.602 187.186 157.62 196.386C141.639 205.586 123.531 210.449 105.091 210.494Z" fill="white"/>
                            <path d="M81.4043 114.703C84.2607 114.685 87.0351 115.658 89.2537 117.457C91.4723 119.257 92.9977 121.77 93.5693 124.569C94.141 127.368 93.7235 130.278 92.3882 132.803C91.0529 135.328 88.8826 137.312 86.2476 138.415C83.6127 139.518 80.6766 139.673 77.9405 138.852C75.2044 138.031 72.838 136.286 71.2452 133.915C69.6525 131.544 68.9321 128.693 69.2071 125.85C69.4821 123.007 70.7354 120.347 72.753 118.325C73.8839 117.179 75.2308 116.269 76.7158 115.647C78.2008 115.026 79.7944 114.705 81.4043 114.703ZM81.4043 109.449C77.9395 109.447 74.552 110.472 71.6701 112.396C68.7882 114.319 66.5413 117.054 65.2137 120.254C63.8861 123.455 63.5373 126.977 64.2114 130.375C64.8855 133.774 66.5523 136.896 69.0009 139.348C71.4496 141.799 74.5702 143.469 77.968 144.147C81.3659 144.825 84.8884 144.479 88.0902 143.155C91.2919 141.831 94.0291 139.587 95.9556 136.707C97.8821 133.827 98.9113 130.441 98.9132 126.976C98.9157 122.33 97.0724 117.873 93.7888 114.586C90.5053 111.299 86.0504 109.451 81.4043 109.449ZM117.905 84.3956C119.489 84.4037 121.012 83.7819 122.138 82.667C123.265 81.5522 123.902 80.0357 123.91 78.451C123.91 78.4308 123.91 78.4106 123.91 78.3904C123.917 77.6141 123.772 76.844 123.481 76.124C123.191 75.4039 122.762 74.7481 122.218 74.194C121.675 73.6398 121.027 73.1982 120.313 72.8943C119.598 72.5904 118.831 72.4302 118.055 72.4228C118.017 72.4224 117.98 72.4224 117.942 72.4228C116.355 72.4078 114.826 73.0241 113.693 74.1362C112.559 75.2483 111.914 76.765 111.899 78.3526C111.884 79.9403 112.501 81.4689 113.613 82.6021C114.725 83.7354 116.242 84.3804 117.829 84.3954C117.854 84.3956 117.88 84.3957 117.905 84.3956ZM130.459 114.703C133.316 114.685 136.09 115.658 138.309 117.457C140.527 119.257 142.053 121.77 142.624 124.569C143.196 127.368 142.779 130.278 141.443 132.803C140.108 135.329 137.938 137.312 135.303 138.415C132.668 139.518 129.732 139.673 126.996 138.852C124.259 138.031 121.893 136.286 120.3 133.915C118.707 131.544 117.987 128.693 118.262 125.85C118.537 123.007 119.79 120.347 121.808 118.325C122.939 117.179 124.286 116.269 125.771 115.647C127.256 115.026 128.849 114.705 130.459 114.703ZM130.459 109.449C126.996 109.449 123.611 110.475 120.732 112.399C117.853 114.323 115.608 117.058 114.283 120.257C112.958 123.456 112.611 126.977 113.287 130.373C113.962 133.77 115.63 136.89 118.079 139.338C120.527 141.787 123.647 143.454 127.044 144.13C130.44 144.806 133.96 144.459 137.16 143.134C140.359 141.808 143.094 139.564 145.017 136.685C146.941 133.806 147.968 130.42 147.968 126.958C147.968 124.658 147.515 122.381 146.635 120.257C145.756 118.133 144.466 116.203 142.84 114.577C141.214 112.951 139.284 111.661 137.16 110.781C135.035 109.901 132.759 109.449 130.459 109.449Z" fill="white"/>
                            <path d="M126.95 96.4435H117.942L112.406 85.165C111.96 84.3741 111.335 83.6976 110.583 83.1888C109.831 82.68 108.97 82.3526 108.07 82.2326C107.17 82.1125 106.254 82.203 105.394 82.4969C104.535 82.7908 103.755 83.2802 103.117 83.9264L89.6615 96.8939C88.5602 98.0181 87.935 99.5239 87.9163 101.098C87.9163 104.363 90.2808 105.526 91.388 106.183C99.9266 111.1 102.929 111.644 102.929 114.103V126.469C102.929 127.266 103.246 128.03 103.809 128.593C104.372 129.156 105.136 129.472 105.932 129.472C106.728 129.472 107.492 129.156 108.055 128.593C108.618 128.03 108.934 127.266 108.934 126.469V109.58C108.934 107.103 103.229 105.076 99.8703 102.449L109.047 92.7841C112.556 98.1325 114.17 102.449 116.178 102.449H126.95C127.746 102.45 128.511 102.135 129.075 101.573C129.639 101.011 129.956 100.247 129.957 99.451C129.959 98.6546 129.644 97.8904 129.081 97.3264C128.519 96.7624 127.756 96.4448 126.96 96.4435L126.95 96.4435Z" fill="white"/>
                            </svg>
                             
                            
                    </div>
                    <div class="max-w-xl mb-6">
                        <div class="mb-6">
                        
                            <div class="block font-sans text-5xl font-bold tracking-tight text-red-700 sm:text-6xl sm:leading-none">{!! $how->title_four !!}</div>
                        </div>
                        <p class="text-base text-gray-700 md:text-lg">{!! $how->subtitle_four !!}</p>
                    </div>
                    <div class="max-w-xl mb-6">
                        <p class="relative">
                            <a href="{{route('home')}}" class="inline-flex flex-col items-center font-semibold text-red-700 transition-colors duration-200 cursor-pointer group">
                                <span class="flex items-center w-full">
                                    <span>{{__('how.Find a locker nearby')}}</span>
                                    <svg class="inline-block w-3 ml-2" fill="currentColor" viewBox="0 0 12 12"><path d="M9.707,5.293l-5-5A1,1,0,0,0,3.293,1.707L7.586,6,3.293,10.293a1,1,0,1,0,1.414,1.414l5-5A1,1,0,0,0,9.707,5.293Z"></path></svg>
                                </span>
                                <span class="w-full h-0.5 translate-y-2 group-hover:translate-y-1 duration-200 ease-out transition opacity-0 group-hover:opacity-100 block bg-purple-600"></span>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="flex justify-center w-full lg:items-center">
                    <div class="flex flex-col items-end pr-3">
                        <img src="{{ asset('/images/howpage/velosafe2.jpg') }}" class="object-cover w-full h-full mb-6 rounded shadow-lg lg:h-48 xl:h-56 lg:w-48 xl:w-56">
                       
                        <video class="object-cover w-full h-full rounded shadow-lg lg:h-32 xl:h-40 lg:w-32 xl:w-40" controls="" autoplay="autoplay">
                            <source src="https://s3.eu-central-1.amazonaws.com/files01.locktec.com.cdn/video/Vi1MdDxceAmG5e48XbeePv2vzYqrFAHyzGs2IuSH.mp4" type="video/mp4">
                                
                        </video>
                    </div>
                    <div class="pl-3">
                        <img src="{{ asset('/images/howpage/un.jpg') }}" class="object-cover w-full h-full rounded shadow-lg lg:h-64 xl:h-80 lg:w-64 xl:w-80">
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <script>
        function toggleVideo() {
            var container = document.getElementById('videoContainer');
            var player = document.getElementById('player');
            var videoFrame = document.getElementById('videoFrame');
            if (container.style.display === 'none') {
                container.style.display = 'block';
                player.style.display = 'block';
                videoFrame.src = "https://www.youtube.com/embed/FAFy9kYopuY?autoplay=1";
            } else {
                container.style.display = 'block';
                player.style.display = 'block';
                videoFrame.src = "https://www.youtube.com/embed/FAFy9kYopuY?autoplay=1";
            }
        }
    </script>
</x-app-layout>
