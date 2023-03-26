<aside class="bg-slate-800 
                fixed
                inset-0
                z-40 
                w-64 
                border-r 
                transform duration-300
                lg:fixed 
                lg:transform-none
                lg:opacity-100
                lg:block"
    :class="{'translate-x-0 ease-in opacity-100':isSidebarOpen === true, '-translate-x-full ease-out opacity-0': isSidebarOpen === false}">
    <div class="flex flex-1 flex-col min-h-0 dark:border-r dark:border-slate-600">

        <div class="flex h-16 items-center space-x-4 flex-shrink-0 px-4 bg-slate-800">
            <div class="flex justify-between items-center space-x-4">
                <div class="flex flex-1 flex-row items-center">
                    <a href="{{route('dashboard')}}">
                        <img src="{{Storage::url('images/logo.png')}}" alt="{{config('app.name', 'AFM')}}"
                            class="h-10 w-auto">
                    </a>
                    <h2 class="text-slate-300 text-md dark:text-slate-300 font-bold "> {{config('app.name', 'AFM')}}
                    </h2>
                </div>

                <!-- Mobile menu button -->
                <button @click="isSidebarOpen = false"
                    class="p-1 transition-colors duration-300 rounded-md text-primary-lighter  hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark  lg:hidden focus:outline-none focus:ring">
                    <span class="sr-only">Close sidebar</span>
                    <i class='bx bx-x'></i>

                </button>

            </div>
        </div>

        <div class="flex flex-1 flex-col overflow-y-auto bg-slate-800">
            <nav class="flex-1 px-2 py-4">
                <div class="mt-2 space-y-1">

                    <a href="{{ route('dashboard') }}"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard') ? 'bg-slate-900 text-white' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
                        <i class='bx bxs-bar-chart-alt-2 bx-sm group-hover:text-slate-300 mr-3 flex-shrink-0 h-6 w-6 {{ request()->routeIs('
                            dashboard') ? 'text-slate-300' : 'text-slate-400 group-hover:text-slate-300' }}'></i>

                        {{ __('Dashboard') }}
                    </a>


                </div>

                <div class="mt-10">
                    <p class="uppercase px-3 font-semibold text-xs text-slate-400 tracking-wider">
                        {{_('Requests')}}
                    </p>

                    <a href="{{ route('dashboard') }}"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard1') ? 'bg-slate-900 text-white' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
                        <i class='bx bx-building-house bx-sm group-hover:text-slate-300 mr-3 flex-shrink-0 h-6 w-6 {{ request()->routeIs('
                            dashboard1') ? 'text-slate-300' : 'text-slate-400 group-hover:text-slate-300' }}'></i>

                        {{ __('Facilities') }}
                    </a>
                    <a href="{{ route('dashboard') }}"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard1') ? 'bg-slate-900 text-white' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
                        <i class='bx bx-wrench bx-sm group-hover:text-slate-300 mr-3 flex-shrink-0 h-6 w-6 {{ request()->routeIs('
                            dashboard1') ? 'text-slate-300' : 'text-slate-400 group-hover:text-slate-300' }}'></i>

                        {{ __('Requests') }}
                    </a>
                </div>
            </nav>

            <div class="flex flex-shrink-0 px-2 py-4 space-y-1"></div>
        </div>
    </div>


</aside>