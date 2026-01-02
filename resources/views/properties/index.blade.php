@extends('layouts.public')

@section('title', 'Properties for Sale & Rent - RealEstate Pro')
@section('meta_description', 'Browse our exclusive collection of properties for sale and rent. Filter by location, price, and type to find your perfect match.')
@section('body_class', 'bg-gray-50 flex flex-col min-h-screen')

@section('content')
    <!-- Filter Bar Section -->
    <div class="bg-white border-b border-gray-200 shadow-sm sticky top-16 z-40">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
            <form action="{{ route('properties.index') }}" method="GET" class="flex flex-col lg:flex-row gap-4 items-center justify-between">
                
                <div class="w-full lg:w-auto flex-1 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                    <!-- Location Input -->
                    <div class="relative">
                        <label for="location" class="sr-only">Location</label>
                        <select id="location" name="location" class="block w-full rounded-md border-0 py-2 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">All Locations</option>
                            @foreach($locations as $loc)
                                <option value="{{ $loc }}" {{ request('location') == $loc ? 'selected' : '' }}>{{ $loc }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Property Type -->
                    <div>
                        <select id="category" name="category" class="block w-full rounded-md border-0 py-2 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Property Type</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Listing Type -->
                    <div>
                        <select id="listing_type" name="listing_type" class="block w-full rounded-md border-0 py-2 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">All Listings</option>
                            <option value="for_sale" {{ request('listing_type') == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                            <option value="for_rent" {{ request('listing_type') == 'for_rent' ? 'selected' : '' }}>For Rent</option>
                        </select>
                    </div>

                    <!-- Price Min -->
                    <div>
                        <select id="min_price" name="min_price" class="block w-full rounded-md border-0 py-2 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Min Price</option>
                            <option value="100000" {{ request('min_price') == '100000' ? 'selected' : '' }}>100,000 DH</option>
                            <option value="300000" {{ request('min_price') == '300000' ? 'selected' : '' }}>300,000 DH</option>
                            <option value="500000" {{ request('min_price') == '500000' ? 'selected' : '' }}>500,000 DH</option>
                        </select>
                    </div>

                    <!-- Price Max -->
                    <div>
                        <select id="max_price" name="max_price" class="block w-full rounded-md border-0 py-2 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Max Price</option>
                            <option value="500000" {{ request('max_price') == '500000' ? 'selected' : '' }}>500,000 DH</option>
                            <option value="1000000" {{ request('max_price') == '1000000' ? 'selected' : '' }}>1,000,000 DH</option>
                            <option value="5000000" {{ request('max_price') == '5000000' ? 'selected' : '' }}>5,000,000+ DH</option>
                        </select>
                    </div>
                </div>

                <div class="w-full lg:w-auto flex gap-2">
                    <button type="submit" class="flex-1 lg:flex-none rounded-md bg-indigo-600 px-6 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors">
                        Apply Filters
                    </button>
                    @if(request()->hasAny(['location', 'category', 'listing_type', 'min_price', 'max_price']))
                        <a href="{{ route('properties.index') }}" class="rounded-md bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-600 hover:bg-gray-200 transition-colors">
                            Clear
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Listings Section -->
    <div class="bg-gray-50 flex-grow py-8 sm:py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900">Properties {{ request('listing_type') == 'rent' ? 'for Rent' : (request('listing_type') == 'sale' ? 'for Sale' : '') }}</h1>
                <span class="text-sm text-gray-500">Showing {{ $properties->firstItem() ?? 0 }}-{{ $properties->lastItem() ?? 0 }} of {{ $properties->total() }} results</span>
            </div>

            @if($properties->isEmpty())
                <!-- Empty State -->
                <div class="text-center py-20 bg-white rounded-lg border border-gray-200 shadow-sm mb-8">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-semibold text-gray-900">No properties found</h3>
                    <p class="mt-1 text-sm text-gray-500">Try adjusting your search filters to find what you're looking for.</p>
                    <a href="{{ route('properties.index') }}" class="mt-4 inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                        Clear Filters
                    </a>
                </div>
            @else
                <!-- Listings Grid -->
                <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    @foreach($properties as $property)
                        <x-property-card :property="$property" />
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($properties->hasPages())
                    <div class="flex items-center justify-center border-t border-gray-200 mt-16 pt-8">
                        {{ $properties->withQueryString()->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
