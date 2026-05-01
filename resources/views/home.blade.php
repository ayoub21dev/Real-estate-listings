@extends('layouts.public')

@section('title', 'UrbanKey - Curated Homes for Sale and Rent')
@section('meta_description', 'Search curated real estate listings with clean filters, verified photos, and practical property details.')

@section('content')
    <x-hero-section :categories="$categories" :locations="$locations" />

    <section class="bg-[#f7f8f5] pb-20 pt-8 sm:pb-24">
        <div class="section-shell">
            <div class="grid gap-4 border-y border-[#10201d]/10 py-6 sm:grid-cols-3">
                <div>
                    <p class="font-display text-4xl leading-none text-[#10201d]">{{ $featuredProperties->count() }}+</p>
                    <p class="mt-2 text-sm font-bold text-[#66736d]">featured homes</p>
                </div>
                <div>
                    <p class="font-display text-4xl leading-none text-[#10201d]">{{ $locations->count() }}</p>
                    <p class="mt-2 text-sm font-bold text-[#66736d]">active locations</p>
                </div>
                <div>
                    <p class="font-display text-4xl leading-none text-[#10201d]">24h</p>
                    <p class="mt-2 text-sm font-bold text-[#66736d]">listing review cycle</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="section-shell">
            <div class="mb-10 flex flex-col gap-6 sm:mb-12 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-2xl">
                    <div class="mb-5 flex items-center gap-4">
                        <span class="eyebrow-line"></span>
                        <span class="text-xs font-black uppercase tracking-[0.2em] text-[#8a7a61]">Featured inventory</span>
                    </div>
                    <h2 class="font-display text-4xl font-normal leading-tight tracking-tight text-[#10201d] sm:text-5xl">
                        Homes that deserve a second look.
                    </h2>
                    <p class="mt-4 max-w-xl text-base leading-7 text-[#66736d]">
                        A compact selection from the newest approved listings, designed for quick scanning and confident comparison.
                    </p>
                </div>
                <a href="{{ route('properties.index') }}" class="btn-secondary w-full sm:w-auto">
                    View all properties
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 10h12m-4-4 4 4-4 4" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">
                @forelse($featuredProperties as $property)
                    <x-property-card :property="$property" />
                @empty
                    <div class="rounded-lg border border-[#10201d]/10 bg-[#f7f8f5] p-10 text-center">
                        <p class="text-[#66736d]">No properties available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <x-features-section />

    <x-cta-section />
@endsection
