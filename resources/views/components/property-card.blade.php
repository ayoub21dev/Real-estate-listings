@props(['property'])

@php
    $listingType = strtolower($property->listing_type);
    $isForRent = $listingType === 'for_rent' || $listingType === 'rent';
    $label = $isForRent ? 'For rent' : 'For sale';
    $isNew = $property->created_at->diffInDays(now()) <= 7;
@endphp

<article class="group flex h-full flex-col overflow-hidden rounded-lg border border-[#10201d]/10 bg-white shadow-[0_1px_0_rgba(16,32,29,0.04)] transition duration-300 hover:-translate-y-1 hover:border-[#0f5e4d]/35 hover:shadow-[0_18px_45px_rgba(16,32,29,0.12)]">
    <a href="{{ route('properties.show', $property->slug) }}" class="block">
        <div class="relative aspect-[4/3] overflow-hidden bg-[#e8ece7]">
            <img
                src="{{ $property->primaryImageUrl }}"
                alt="{{ $property->title }}"
                class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.045]"
            >
            <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#10201d]/50 to-transparent"></div>
            <div class="absolute left-3 top-3 flex gap-2">
                <span class="rounded-md bg-white/95 px-2.5 py-1 text-xs font-black uppercase tracking-[0.12em] text-[#10201d] shadow-sm backdrop-blur">{{ $isNew ? 'New' : $label }}</span>
            </div>
            <div class="absolute bottom-3 left-3 rounded-md bg-[#10201d]/85 px-3 py-1.5 text-sm font-black text-white backdrop-blur">
                {{ number_format($property->price, 0) }} DH
                @if($isForRent)
                    <span class="font-medium text-white/70">/mo</span>
                @endif
            </div>
        </div>
    </a>

    <div class="flex flex-1 flex-col p-4">
        <div class="flex items-start justify-between gap-4">
            <div class="min-w-0">
                <h3 class="line-clamp-1 text-base font-black tracking-tight text-[#10201d] transition-colors group-hover:text-[#0f5e4d]">
                    <a href="{{ route('properties.show', $property->slug) }}">{{ $property->title }}</a>
                </h3>
                <p class="mt-1 flex items-center gap-1.5 text-sm text-[#66736d]">
                    <svg class="h-4 w-4 flex-none text-[#b08a57]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-4.7 7-11a7 7 0 1 0-14 0c0 6.3 7 11 7 11Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5h.01" />
                    </svg>
                    {{ $property->location }}
                </p>
            </div>
            <span class="flex-none rounded-md border border-[#10201d]/10 px-2 py-1 text-xs font-bold text-[#66736d]">
                {{ $property->category->name ?? 'Property' }}
            </span>
        </div>

        @if($property->description)
            <p class="mt-3 line-clamp-2 text-sm leading-6 text-[#66736d]">{{ Str::limit($property->description, 112) }}</p>
        @endif

        <div class="mt-auto grid grid-cols-3 gap-2 border-t border-[#10201d]/10 pt-4 text-sm">
            <div>
                <span class="block text-xs font-bold uppercase tracking-[0.12em] text-[#8a948e]">Beds</span>
                <span class="mt-1 block font-black text-[#10201d]">{{ $property->bedrooms }}</span>
            </div>
            <div>
                <span class="block text-xs font-bold uppercase tracking-[0.12em] text-[#8a948e]">Baths</span>
                <span class="mt-1 block font-black text-[#10201d]">{{ $property->bathrooms }}</span>
            </div>
            <div>
                <span class="block text-xs font-bold uppercase tracking-[0.12em] text-[#8a948e]">Area</span>
                <span class="mt-1 block font-black text-[#10201d]">{{ number_format($property->surface) }} m²</span>
            </div>
        </div>
    </div>
</article>
