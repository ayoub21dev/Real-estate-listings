<!-- Public Header -->
<header class="bg-white/95 backdrop-blur-sm shadow-sm sticky top-0 z-50 transition-all duration-300">
    <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Top">
        <div class="flex h-16 w-full items-center justify-between border-b border-gray-200 lg:border-none">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <svg class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                    </svg>
                    <span class="text-xl font-bold text-gray-900">RealEstate Pro</span>
                </a>
                <div class="hidden ml-10 space-x-8 lg:block">
                    <a href="{{ route('home') }}" class="text-sm font-medium {{ request()->routeIs('home') ? 'text-indigo-600' : 'text-gray-500 hover:text-indigo-600 hover:scale-105 transition-transform' }}">Home</a>
                    <a href="{{ route('properties.index') }}" class="text-sm font-medium {{ request()->routeIs('properties.*') ? 'text-indigo-600' : 'text-gray-500 hover:text-indigo-600 hover:scale-105 transition-transform' }}">Properties</a>
                    <a href="{{ route('about') }}" class="text-sm font-medium {{ request()->routeIs('about') ? 'text-indigo-600' : 'text-gray-500 hover:text-indigo-600 hover:scale-105 transition-transform' }}">About Us</a>
                    <a href="{{ route('contact') }}" class="text-sm font-medium {{ request()->routeIs('contact') ? 'text-indigo-600' : 'text-gray-500 hover:text-indigo-600 hover:scale-105 transition-transform' }}">Contact</a>
                </div>
            </div>
            <div class="ml-10 space-x-4">
                <a href="{{ route('login') }}" class="hidden lg:inline-flex items-center rounded-md border border-transparent bg-indigo-50 px-4 py-2 text-sm font-medium text-indigo-700 hover:bg-indigo-100 transition-colors">
                    Sign In
                </a>
                <!-- Mobile Menu Button -->
                <button type="button" id="mobile-menu-btn" class="lg:hidden rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500">
                    <span class="sr-only">Open menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden">
            <div class="space-y-1 pb-3 pt-2">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('home') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-500 hover:bg-gray-50' }}">Home</a>
                <a href="{{ route('properties.index') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('properties.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-500 hover:bg-gray-50' }}">Properties</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('about') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-500 hover:bg-gray-50' }}">About Us</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('contact') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-500 hover:bg-gray-50' }}">Contact</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium text-indigo-600 bg-indigo-50">Sign In</a>
            </div>
        </div>
    </nav>
</header>

<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
        document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });
</script>
