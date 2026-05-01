@props(['categories', 'locations'])

<!-- Hero Section -->
<section class="relative isolate overflow-hidden bg-[#10201d]">
    <div class="absolute inset-0 -z-10">
        <img
            class="h-full w-full object-cover"
            src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=2200&q=85"
            alt="A bright modern home with refined interior architecture"
        >
        <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(16,32,29,0.88)_0%,rgba(16,32,29,0.72)_42%,rgba(16,32,29,0.16)_100%)]"></div>
        <div class="absolute inset-x-0 bottom-0 h-44 bg-gradient-to-t from-[#f7f8f5] via-[#f7f8f5]/70 to-transparent"></div>
    </div>

    <div class="section-shell flex min-h-[calc(100svh-4.5rem)] flex-col justify-center py-12 sm:py-16 lg:py-20">
        <div class="max-w-4xl text-white">
            <div class="mb-7 flex items-center gap-4 reveal-up">
                <span class="eyebrow-line bg-[#c4a16f]"></span>
                <span class="text-xs font-black uppercase tracking-[0.2em] text-white/70">Verified city homes</span>
            </div>
            <h1 class="font-display text-5xl font-normal leading-[0.96] tracking-tight text-white sm:text-6xl lg:text-7xl">
                RealEstate Pro
            </h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-white/80">
                Search curated homes for sale and rent with sharper filters, calm browsing, and listings that are easy to compare.
            </p>
        </div>

        <div class="mt-9 max-w-6xl rounded-lg border border-white/20 bg-white/95 p-4 shadow-[0_24px_80px_rgba(0,0,0,0.28)] backdrop-blur-xl">
            <div class="mb-5 flex items-center justify-between gap-4">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.18em] text-[#b08a57]">Start your search</p>
                    <p class="mt-1 text-sm text-[#66736d]">Filter by city, type, and price.</p>
                </div>
                <span class="hidden text-sm font-bold text-[#0f5e4d] sm:block">{{ $locations->count() }} areas</span>
            </div>
            <x-search-form :categories="$categories" :locations="$locations" />
        </div>

        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
            <a href="{{ route('properties.index') }}" class="btn-primary">Browse properties</a>
            <a href="{{ route('properties.index', ['listing_type' => 'for_sale']) }}" class="btn-secondary border-white/40 bg-white/90 text-[#10201d] hover:bg-white">View homes for sale</a>
        </div>
    </div>
</section>
