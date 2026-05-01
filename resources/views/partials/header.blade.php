<!-- Public Header -->
<header class="sticky top-0 z-50 border-b border-[#10201d]/10 bg-white/90 backdrop-blur-xl">
    <nav class="section-shell" aria-label="Primary navigation">
        <div class="flex h-[4.5rem] items-center justify-between">
            <a href="{{ route('home') }}" class="group flex items-center" aria-label="UrbanKey home">
                <img src="{{ asset('assets/brand/logo.svg') }}?v=2" alt="UrbanKey" class="h-12 w-auto max-w-[11rem] object-contain">
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
