@extends('layouts.public')

@section('title', $property->title . ' - ' . $property->location . ' | RealEstate Pro')
@section('meta_description', Str::limit($property->description, 160))
@section('og_title', $property->title . ' - ' . $property->location)
@section('og_description', Str::limit($property->description, 160))
@section('body_class', 'bg-[#f7f8f5] pb-24 lg:pb-0')

@push('head')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@push('styles')
<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endpush

@php
    $listingType = strtolower($property->listing_type);
    $isForRent = $listingType === 'for_rent' || $listingType === 'rent';
    $propertyImages = $property->images;
    $defaultImages = [
        'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&q=80&w=1400',
        'https://images.unsplash.com/photo-1613545325278-f24b0cae1224?auto=format&fit=crop&q=80&w=1400',
        'https://images.unsplash.com/photo-1584622050111-993a426fbf0a?auto=format&fit=crop&q=80&w=1400',
    ];
    $galleryImages = $propertyImages->isNotEmpty()
        ? $propertyImages
        : collect($defaultImages)->map(fn($url) => (object) ['image_url' => $url]);
    $initialImage = $propertyImages->isNotEmpty() ? $propertyImages->first()->image_url : $defaultImages[0];
@endphp

@section('content')
<div x-data="{ currentImage: @js($initialImage) }">
    <section class="bg-white">
        <div class="section-shell py-8 sm:py-10">
            <nav class="mb-8 flex items-center gap-3 text-sm" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="font-bold text-[#66736d] transition-colors hover:text-[#10201d]">Home</a>
                <span class="text-[#b7c0ba]">/</span>
                <a href="{{ route('properties.index') }}" class="font-bold text-[#66736d] transition-colors hover:text-[#10201d]">Properties</a>
                <span class="text-[#b7c0ba]">/</span>
                <span class="truncate font-bold text-[#10201d]" aria-current="page">{{ $property->title }}</span>
            </nav>

            <div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_24rem] lg:items-start">
                <div>
                    <div class="mb-5 flex items-center gap-4">
                        <span class="eyebrow-line"></span>
                        <span class="text-xs font-black uppercase tracking-[0.2em] text-[#8a7a61]">{{ $isForRent ? 'For rent' : 'For sale' }}</span>
                    </div>
                    <h1 class="font-display text-4xl font-normal leading-tight tracking-tight text-[#10201d] sm:text-5xl">
                        {{ $property->title }}
                    </h1>
                    <p class="mt-4 flex items-center gap-2 text-base font-bold text-[#66736d]">
                        <svg class="h-5 w-5 text-[#b08a57]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-4.7 7-11a7 7 0 1 0-14 0c0 6.3 7 11 7 11Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5h.01" />
                        </svg>
                        {{ $property->location }}
                    </p>
                </div>

                <aside class="rounded-lg border border-[#10201d]/10 bg-[#f7f8f5] p-5">
                    <p class="font-display text-4xl leading-none text-[#10201d]">
                        {{ number_format($property->price, 0) }} DH
                    </p>
                    @if($isForRent)
                        <p class="mt-1 text-sm font-bold text-[#66736d]">Monthly rent</p>
                    @endif
                    <div class="mt-6 grid grid-cols-3 gap-3 text-center">
                        <div class="rounded-lg bg-white p-3">
                            <span class="block text-xl font-black text-[#10201d]">{{ $property->bedrooms }}</span>
                            <span class="mt-1 block text-xs font-bold uppercase tracking-[0.12em] text-[#8a948e]">Beds</span>
                        </div>
                        <div class="rounded-lg bg-white p-3">
                            <span class="block text-xl font-black text-[#10201d]">{{ $property->bathrooms }}</span>
                            <span class="mt-1 block text-xs font-bold uppercase tracking-[0.12em] text-[#8a948e]">Baths</span>
                        </div>
                        <div class="rounded-lg bg-white p-3">
                            <span class="block text-xl font-black text-[#10201d]">{{ number_format($property->surface) }}</span>
                            <span class="mt-1 block text-xs font-bold uppercase tracking-[0.12em] text-[#8a948e]">m²</span>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="bg-[#f7f8f5] py-8 sm:py-10">
        <div class="section-shell">
            <div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_24rem] lg:items-start">
                <div class="min-w-0">
                    <div class="overflow-hidden rounded-lg bg-[#dfe5df] shadow-[0_1px_0_rgba(16,32,29,0.04)]">
                        <div class="relative aspect-[16/10] sm:aspect-video">
                            <img :src="currentImage" alt="{{ $property->title }}" class="h-full w-full object-cover">
                            <div class="absolute left-4 top-4 rounded-md bg-white/95 px-3 py-1.5 text-xs font-black uppercase tracking-[0.14em] text-[#10201d] backdrop-blur">
                                {{ $isForRent ? 'For rent' : 'For sale' }}
                            </div>
                        </div>
                    </div>

                    <div class="no-scrollbar mt-4 flex gap-3 overflow-x-auto pb-2">
                        @foreach($galleryImages as $image)
                            <button
                                type="button"
                                @click="currentImage = @js($image->image_url)"
                                class="relative h-20 w-28 flex-none overflow-hidden rounded-lg border border-transparent bg-[#dfe5df] transition hover:border-[#0f5e4d]"
                                :class="{ 'border-[#0f5e4d] ring-2 ring-[#0f5e4d]/20': currentImage === @js($image->image_url) }"
                                aria-label="Show property image"
                            >
                                <img src="{{ str_replace(['w=1400', 'w=1200', 'w=800'], 'w=320', $image->image_url) }}" alt="Property view" class="h-full w-full object-cover">
                            </button>
                        @endforeach
                    </div>

                    <div class="mt-12 grid gap-10 lg:grid-cols-[0.75fr_1.25fr]">
                        <div>
                            <h2 class="text-sm font-black uppercase tracking-[0.18em] text-[#8a7a61]">Description</h2>
                        </div>
                        <div class="text-base leading-8 text-[#53625c]">
                            {!! nl2br(e($property->description)) !!}
                        </div>
                    </div>

                    <div class="mt-12 border-t border-[#10201d]/10 pt-10">
                        <div class="mb-6 flex items-center justify-between gap-4">
                            <h2 class="text-sm font-black uppercase tracking-[0.18em] text-[#8a7a61]">Property facts</h2>
                            <a href="{{ route('properties.index') }}" class="text-sm font-black text-[#0f5e4d] hover:text-[#0b4b3e]">Back to listings</a>
                        </div>
                        <dl class="grid grid-cols-1 gap-px overflow-hidden rounded-lg border border-[#10201d]/10 bg-[#10201d]/10 sm:grid-cols-2">
                            <div class="bg-white p-5">
                                <dt class="text-xs font-black uppercase tracking-[0.14em] text-[#8a948e]">Property type</dt>
                                <dd class="mt-2 font-bold text-[#10201d]">{{ $property->category->name ?? 'N/A' }}</dd>
                            </div>
                            <div class="bg-white p-5">
                                <dt class="text-xs font-black uppercase tracking-[0.14em] text-[#8a948e]">Listing type</dt>
                                <dd class="mt-2 font-bold text-[#10201d]">{{ $isForRent ? 'For rent' : 'For sale' }}</dd>
                            </div>
                            <div class="bg-white p-5">
                                <dt class="text-xs font-black uppercase tracking-[0.14em] text-[#8a948e]">Surface area</dt>
                                <dd class="mt-2 font-bold text-[#10201d]">{{ number_format($property->surface) }} m²</dd>
                            </div>
                            <div class="bg-white p-5">
                                <dt class="text-xs font-black uppercase tracking-[0.14em] text-[#8a948e]">Status</dt>
                                <dd class="mt-2 font-bold text-[#10201d]">{{ ucfirst($property->status) }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <aside class="lg:sticky lg:top-28">
                    <div class="rounded-lg border border-[#10201d]/10 bg-white p-5 shadow-[0_18px_45px_rgba(16,32,29,0.08)]">
                        <div class="flex items-center gap-4">
                            <img class="h-12 w-12 rounded-lg bg-[#edf4f1]" src="https://ui-avatars.com/api/?name=Sarah+Jenkins&background=edf4f1&color=0f5e4d&size=128" alt="Sarah Jenkins">
                            <div>
                                <p class="font-black text-[#10201d]">Sarah Jenkins</p>
                                <p class="text-sm text-[#66736d]">Senior real estate agent</p>
                            </div>
                        </div>
                        <p class="mt-5 text-sm leading-6 text-[#66736d]">
                            Ask for availability, schedule a visit, or request the full listing pack.
                        </p>

                        <form action="{{ route('contact') }}" method="GET" class="mt-6 space-y-4">
                            <input type="hidden" name="property" value="{{ $property->slug }}">
                            <div>
                                <label for="name" class="field-label">Name</label>
                                <input type="text" name="name" id="name" autocomplete="name" class="ui-field" placeholder="Your name">
                            </div>
                            <div>
                                <label for="email" class="field-label">Email</label>
                                <input type="email" name="email" id="email" autocomplete="email" class="ui-field" placeholder="you@example.com">
                            </div>
                            <div>
                                <label for="message" class="field-label">Message</label>
                                <textarea name="message" id="message" rows="4" class="ui-field min-h-28" placeholder="I am interested in {{ $property->title }}..."></textarea>
                            </div>
                            <button type="submit" class="btn-primary w-full">Send inquiry</button>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <div class="fixed bottom-0 left-0 right-0 z-40 border-t border-[#10201d]/10 bg-white/94 p-4 shadow-[0_-12px_34px_rgba(16,32,29,0.12)] backdrop-blur lg:hidden">
        <div class="grid grid-cols-2 gap-3">
            <a href="tel:+15551234567" class="btn-secondary">Call agent</a>
            <a href="{{ route('contact', ['property' => $property->slug]) }}" class="btn-primary">Contact now</a>
        </div>
    </div>
</div>
@endsection
