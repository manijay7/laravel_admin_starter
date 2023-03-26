<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-cloak>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AF') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased h-full bg-slate-200 dark:bg-slate-800" x-data="setup()" x-cloak
    x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{'dark': isDark}">

    <div x-ref="loading"
        class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
        Loading.....
    </div>

    <div class="min-h-full flex">

        <livewire:sidebar />

        <div class="lg:pl-64 flex flex-col w-0 flex-1">
            <livewire:navbar />

            <main class="flex-1">
                <div class="py-6 flex flex-1 flex-col">
                    {{ $slot }}
                </div>

                <div class="max-w-screen-xl mx-auto mb-4">
                    <div class="mt-4 mx-2 flex justify-between items-center">
                        <div class="text-gray-600">
                            Anagkazo Facilities (c) 2023
                            <strong class="font-bold">EverappsGH</strong>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    @stack('modals')

    <script>
        const setup = () => {
        const getTheme = () => {
          if (window.localStorage.getItem('dark')) {
            return JSON.parse(window.localStorage.getItem('dark'))
          }
          return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }
    
        const setTheme = (value) => {
          window.localStorage.setItem('dark', value)
        }
    
        const getColor = () => {
          if (window.localStorage.getItem('color')) {
            return window.localStorage.getItem('color')
          }
          return 'slate'
        }
    
        const setColors = (color) => {
          const root = document.documentElement
          root.style.setProperty('--color-primary', `var(--color-${color})`)
          root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
          root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
          root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
          root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
          root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
          root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
          this.selectedColor = color
          window.localStorage.setItem('color', color)
        }
    
        return {
          loading: true,
          isDark: getTheme(),
          color: getColor(),
          selectedColor: 'slate',
          isSidebarOpen: false,
          
          toggleTheme() {
            this.isDark = !this.isDark
            setTheme(this.isDark)
          },
          setLightTheme() {
            this.isDark = false
            setTheme(this.isDark)
          },
          setDarkTheme() {
            this.isDark = true
            setTheme(this.isDark)
          },
          setColors,
          toggleSidebar() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          
          
          
        }
      }
    </script>
    @livewireScripts
    @stack('scripts')
</body>

</html>