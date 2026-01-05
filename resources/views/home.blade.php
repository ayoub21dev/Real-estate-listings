@extends('layouts.public')

@section('title', 'RealEstate Pro - Find Your Dream Home')
@section('meta_description', 'Find your dream home with RealEstate Pro. We offer verified listings, expert agents, and a seamless buying experience in your region.')

@section('content')
    <!-- Hero Section -->
    <x-hero-section :categories="$categories" :locations="$locations" />

    <!-- Why Choose Us Section -->
    <x-features-section />

    <!-- Featured Properties (Preview) -->
    <section class="py-24 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Featured Properties</h2>
                    <p class="mt-4 text-lg text-gray-600">Hand-picked properties just for you.</p>
                </div>
                <a href="{{ route('properties.index') }}" class="hidden sm:inline-flex items-center gap-2 text-indigo-600 font-semibold hover:text-indigo-500 transition-colors">
                    View All Properties
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($featuredProperties as $property)
                    <x-property-card :property="$property" />
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500">No properties available at the moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-10 text-center sm:hidden">
                <a href="{{ route('properties.index') }}" class="inline-flex w-full justify-center items-center gap-2 rounded-lg bg-indigo-50 px-4 py-3 text-sm font-semibold text-indigo-600 hover:bg-indigo-100 transition-colors">
                    View All Properties
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <x-cta-section />
@endsection

