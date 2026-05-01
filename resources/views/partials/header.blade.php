<!-- Public Header -->
<header class="sticky top-0 z-50 border-b border-[#10201d]/10 bg-white/90 backdrop-blur-xl">
    <nav class="section-shell" aria-label="Primary navigation">
        <div class="flex h-[4.5rem] items-center justify-between">
            <a href="{{ route('home') }}" class="group flex items-center gap-3" aria-label="RealEstate Pro home">
                <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#10201d] text-white transition-colors group-hover:bg-[#0f5e4d]">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 20V8.6L12 4l8 4.6V20" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 20v-6h6v6" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 10.5h1.5m6 0h1.5" />
                    </svg>
                </span>
                <span class="leading-none">
                    <span class="block text-base font-black tracking-tight text-[#10201d]">RealEstate Pro</span>
                    <span class="mt-1 block text-[0.68rem] font-bold uppercase tracking-[0.18em] text-[#8a7a61]">Curated homes</span>
                </span>
            </a>

            <div class="hidden items-center gap-8 lg:flex">
                <a href="{{ route('home') }}" class="text-sm font-bold transition-colors {{ request()->routeIs('home') ? 'text-[#0f5e4d]' : 'text-[#53625c] hover:text-[#10201d]' }}">Home</a>
                <a href="{{ route('properties.index') }}" class="text-sm font-bold transition-colors {{ request()->routeIs('properties.*') ? 'text-[#0f5e4d]' : 'text-[#53625c] hover:text-[#10201d]' }}">Properties</a>
                <a href="{{ route('about') }}" class="text-sm font-bold transition-colors {{ request()->routeIs('about') ? 'text-[#0f5e4d]' : 'text-[#53625c] hover:text-[#10201d]' }}">About</a>
                <a href="{{ route('contact') }}" class="text-sm font-bold transition-colors {{ request()->routeIs('contact') ? 'text-[#0f5e4d]' : 'text-[#53625c] hover:text-[#10201d]' }}">Contact</a>
            </div>

            <div class="hidden items-center gap-3 lg:flex">
                <a href="{{ route('properties.index', ['listing_type' => 'for_sale']) }}" class="btn-secondary min-h-10 px-4 py-2">Buy</a>
                <a href="{{ route('properties.index', ['listing_type' => 'for_rent']) }}" class="btn-primary min-h-10 px-4 py-2">Rent</a>
            </div>

            <button type="button" id="mobile-menu-btn" class="inline-flex h-11 w-11 items-center justify-center rounded-lg border border-[#10201d]/10 bg-white text-[#10201d] lg:hidden" aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Open menu</span>
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16" />
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden border-t border-[#10201d]/10 py-4 lg:hidden">
            <div class="grid gap-1">
                <a href="{{ route('home') }}" class="rounded-lg px-3 py-3 text-sm font-bold {{ request()->routeIs('home') ? 'bg-[#edf4f1] text-[#0f5e4d]' : 'text-[#53625c]' }}">Home</a>
                <a href="{{ route('properties.index') }}" class="rounded-lg px-3 py-3 text-sm font-bold {{ request()->routeIs('properties.*') ? 'bg-[#edf4f1] text-[#0f5e4d]' : 'text-[#53625c]' }}">Properties</a>
                <a href="{{ route('about') }}" class="rounded-lg px-3 py-3 text-sm font-bold {{ request()->routeIs('about') ? 'bg-[#edf4f1] text-[#0f5e4d]' : 'text-[#53625c]' }}">About</a>
                <a href="{{ route('contact') }}" class="rounded-lg px-3 py-3 text-sm font-bold {{ request()->routeIs('contact') ? 'bg-[#edf4f1] text-[#0f5e4d]' : 'text-[#53625c]' }}">Contact</a>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-3">
                <a href="{{ route('properties.index', ['listing_type' => 'for_sale']) }}" class="btn-secondary">Buy</a>
                <a href="{{ route('properties.index', ['listing_type' => 'for_rent']) }}" class="btn-primary">Rent</a>
            </div>
        </div>
    </nav>
</header>

<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        const isOpen = !menu?.classList.contains('hidden');
        menu?.classList.toggle('hidden');
        this.setAttribute('aria-expanded', String(!isOpen));
    });
</script>
