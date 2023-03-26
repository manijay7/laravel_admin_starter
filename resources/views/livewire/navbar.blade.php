<nav
    class="bg-white  dark:bg-slate-800 sticky top-0 z-20 flex-shrink-0 flex h-16 border-b border-slate-200 dark:border-slate-600">

    <!-- Mobile menu button -->
    <button @click="toggleSidebar"
        class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark lg:hidden focus:outline-none focus:ring">
        <span class="sr-only">Open main manu</span>
        <span aria-hidden="true">
            <i class="bx bx-menu text-3xl"></i></i>
        </span>
    </button>

    <div class="flex-1 px-4 flex items-center justify-between">
        <div class="flex-1 flex items-center">
            <div class="flex">
                {{config('app.name')}}
            </div>
        </div>
        <div class="ml-4 flex items-center md:ml-6">
            <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter"></div>
                <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm"
                    :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }">
                    <i x-show="!isDark" class="bx bx-moon"></i>
                    <i x-show="isDark" class="bx bx-star"></i>
                </div>
            </button>

            <button
                class="mt-1 relative mx-2 text-primary-lighter  hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                @click="openNotificationsPanel">
                <i class="bx bx-bell text-xl text-gray-600"></i>
                <span aria-hidden="true"
                    class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
            </button>

            <div class="relative" x-cloak x-data="{ open: false }">
                <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })" type="button"
                    aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                    class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                    <a class="flex items-center mx-2 dropdown-toggle" href="#" data-dropdown="dropDownMenu">
                        <img class="w-8 h-8 mr-3 rounded-full object-cover"
                            src="{{ storage::url('images/avatar.jpg') }}" alt="Avatar">
                        <div class="mt-1 hidden md:block">
                            <div class="leading-3 text-sm text-gray-700">
                                {{-- {{auth()->user()->roles->first()->name}} --}}
                            </div>
                            <small class="text-xs text-gray-500">{{auth()->user()->name}}</small>
                        </div>
                    </a>
                </button>

                <!-- User dropdown menu -->
                <div x-show="open" x-ref="userMenu" x-transition:enter="transition-all transform ease-out"
                    x-transition:enter-start="translate-y-1/2 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition-all transform ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                    @keydown.escape="open = false"
                    class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                    tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu">
                    <x-nav-link route="{{route('profile.show')}}">
                        {{auth()->user()->name}}
                    </x-nav-link>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-nav-link route="{{route('profile.show')}}" href="{{ route('logout') }}"
                            @click.prevent="$root.submit();">Logout</x-nav-link>


                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>