@extends('layouts.public')

@section('title', 'Properties for Sale and Rent - UrbanKey')
@section('meta_description', 'Browse curated properties for sale and rent. Filter by location, price, listing type, and property type.')
@section('body_class', 'bg-[#f7f8f5] flex flex-col min-h-screen')

@php
    $listingLabel = match (request('listing_type')) {
        'for_sale' => 'for sale',
        'for_rent' => 'for rent',
        default => '',
    };
@endphp

@section('content')
    <section class="bg-white">
        <div class="section-shell py-12 sm:py-16">
            <div class="grid gap-8 lg:grid-cols-[0.8fr_1.2fr] lg:items-end">
                <div>
                    <div class="mb-5 flex items-center gap-4">
                        <span class="eyebrow-line"></span>
                        <span class="text-xs font-black uppercase tracking-[0.2em] text-[#8a7a61]">Property search</span>
                    </div>
                    <h1 class="font-display text-4xl font-normal leading-tight tracking-tight text-[#10201d] sm:text-5xl">
                        Properties {{ $listingLabel }}
                    </h1>
                    <p class="mt-4 max-w-xl text-base leading-7 text-[#66736d]">
                        Use the filters to narrow the list, then compare price, area, bedrooms, and location at a glance.
                    </p>
                </div>

                <div class="rounded-lg border border-[#10201d]/10 bg-[#f7f8f5] p-4">
                    <form action="{{ route('properties.index') }}" method="GET" class="grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-6">
                        <div class="xl:col-span-2">
                            <label for="keyword" class="field-label">Keyword</label>
                            <input id="keyword" name="keyword" type="search" value="{{ request('keyword') }}" placeholder="Title, city, detail" class="ui-field">
                        </div>

                        <div>
                            <label for="location" class="field-label">Location</label>
                            <select id="location" name="location" class="ui-field">
                                <option value="">Any city</option>
                                @foreach($locations as $loc)
                                    <option value="{{ $loc }}" {{ request('location') == $loc ? 'selected' : '' }}>{{ $loc }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="category" class="field-label">Type</label>
                            <select id="category" name="category" class="ui-field">
                                <option value="">Any type</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="listing_type" class="field-label">Listing</label>
                            <select id="listing_type" name="listing_type" class="ui-field">
                                <option value="">All</option>
                                <option value="for_sale" {{ request('listing_type') == 'for_sale' ? 'selected' : '' }}>For sale</option>
                                <option value="for_rent" {{ request('listing_type') == 'for_rent' ? 'selected' : '' }}>For rent</option>
                            </select>
                        </div>

                        <div>
                            <label for="max_price" class="field-label">Max price</label>
                            <select id="max_price" name="max_price" class="ui-field">
                                <option value="">Any</option>
                                <option value="500000" {{ request('max_price') == '500000' ? 'selected' : '' }}>500,000 DH</option>
                                <option value="1000000" {{ request('max_price') == '1000000' ? 'selected' : '' }}>1,000,000 DH</option>
                                <option value="5000000" {{ request('max_price') == '5000000' ? 'selected' : '' }}>5,000,000 DH</option>
                            </select>
                        </div>

                        <div class="md:col-span-2 xl:col-span-6 flex flex-col gap-3 sm:flex-row sm:justify-end">
                            @if(request()->hasAny(['location', 'category', 'listing_type', 'min_price', 'max_price', 'keyword']))
                                <a href="{{ route('properties.index') }}" class="btn-secondary">Clear filters</a>
                            @endif
                            <button type="submit" class="btn-primary">Apply filters</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="flex-grow bg-[#f7f8f5] py-12 sm:py-16">
        <div class="section-shell">
            <div class="mb-7 flex flex-col gap-3 border-b border-[#10201d]/10 pb-5 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-bold text-[#66736d]">Showing {{ $properties->firstItem() ?? 0 }}-{{ $properties->lastItem() ?? 0 }} of {{ $properties->total() }} results</p>
                    <h2 class="mt-1 text-xl font-black tracking-tight text-[#10201d]">Available properties</h2>
                </div>
                <p class="text-sm text-[#66736d]">Sorted by newest listings</p>
            </div>

            @if($properties->isEmpty())
                <div class="rounded-lg border border-[#10201d]/10 bg-white p-12 text-center shadow-[0_1px_0_rgba(16,32,29,0.04)]">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-lg bg-[#edf4f1] text-[#0f5e4d]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M7 12h10M10 17h4" />
                        </svg>
                    </div>
                    <h3 class="mt-5 text-lg font-black text-[#10201d]">No properties found</h3>
                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-[#66736d]">Adjust the filters or clear the search to see the full inventory again.</p>
                    <a href="{{ route('properties.index') }}" class="btn-primary mt-6">Clear filters</a>
                </div>
            @else
                <div id="properties-container" class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach($properties as $property)
                        <x-property-card :property="$property" />
                    @endforeach
                </div>

                @if($properties->hasPages())
                    <div id="pagination-container" class="mt-12 flex items-center justify-center border-t border-[#10201d]/10 pt-8">
                        {{ $properties->withQueryString()->links() }}
                    </div>
                @endif
            @endif
        </div>
    </section>
@endsection
