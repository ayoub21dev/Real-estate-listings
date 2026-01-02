@extends('layouts.public')

@section('title', $property->title . ' - ' . $property->location . ' | RealEstate Pro')
@section('meta_description', Str::limit($property->description, 160))
@section('og_title', $property->title . ' - ' . $property->location)
@section('og_description', Str::limit($property->description, 160))

@push('head')
    <!-- Alpine.js for interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@push('styles')
<style>
    /* Hide scrollbar for gallery thumbnails but keep functionality */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endpush

@section('body_class', 'bg-gray-50 pb-20 lg:pb-0')

@php
    $isForRent = strtolower($property->listing_type) === 'rent';
    // Get images from database, fallback to sample images if none exist
    $propertyImages = $property->images;
    if ($propertyImages->isEmpty()) {
        $defaultImages = [
            'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&q=80&w=1200',
            'https://images.unsplash.com/photo-1613545325278-f24b0cae1224?auto=format&fit=crop&q=80&w=1200',
            'https://images.unsplash.com/photo-1584622050111-993a426fbf0a?auto=format&fit=crop&q=80&w=1200',
        ];
    }
@endphp

@section('content')
<div x-data="{ currentImage: '{{ $propertyImages->isNotEmpty() ? $propertyImages->first()->image_url : ($defaultImages[0] ?? '') }}' }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div>
                        <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-500">
                            <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Home</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                        <a href="{{ route('properties.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Properties</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                        <span class="ml-4 text-sm font-medium text-gray-700" aria-current="page">{{ $property->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="lg:grid lg:grid-cols-12 lg:gap-x-8">
            
            <!-- Left Column: Gallery & Description -->
            <div class="lg:col-span-8">
                
                <!-- Main Image Gallery -->
                <div class="space-y-4">
                    <!-- Main Viewer -->
                    <div class="aspect-video w-full overflow-hidden rounded-2xl bg-gray-100 shadow-sm relative group">
                        <img :src="currentImage" alt="{{ $property->title }}" class="h-full w-full object-cover transition-all duration-300">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors pointer-events-none"></div>
                        <span class="absolute top-4 left-4 inline-flex items-center rounded-md bg-white/90 px-3 py-1 text-sm font-semibold text-indigo-700 shadow-sm backdrop-blur-md">
                            {{ $isForRent ? 'For Rent' : 'For Sale' }}
                        </span>
                    </div>

                    <!-- Thumbnails (Scrollable on mobile) -->
                    <div class="flex gap-4 overflow-x-auto pb-2 no-scrollbar snap-x">
                        @if($propertyImages->isNotEmpty())
                            @foreach($propertyImages as $image)
                                <button @click="currentImage = '{{ $image->image_url }}'" 
                                        class="relative flex-none h-24 w-32 snap-start overflow-hidden rounded-lg bg-gray-100 cursor-pointer ring-2 ring-transparent hover:ring-indigo-500 focus:ring-indigo-500 focus:outline-none transition-all"
                                        :class="{ 'ring-indigo-600 ring-2': currentImage === '{{ $image->image_url }}' }">
                                    <img src="{{ str_replace('w=800', 'w=300', str_replace('w=1200', 'w=300', $image->image_url)) }}" alt="Property view" class="h-full w-full object-cover">
                                </button>
                            @endforeach
                        @else
                            @foreach($defaultImages as $image)
                                <button @click="currentImage = '{{ $image }}'" 
                                        class="relative flex-none h-24 w-32 snap-start overflow-hidden rounded-lg bg-gray-100 cursor-pointer ring-2 ring-transparent hover:ring-indigo-500 focus:ring-indigo-500 focus:outline-none transition-all"
                                        :class="{ 'ring-indigo-600 ring-2': currentImage === '{{ $image }}' }">
                                    <img src="{{ str_replace('w=1200', 'w=300', $image) }}" alt="Property view" class="h-full w-full object-cover">
                                </button>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Title & Description (Desktop Layout) -->
                <div class="mt-10 lg:mt-12">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $property->title }}</h1>
                    <p class="mt-2 text-lg text-gray-500 flex items-center gap-2">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                             <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        {{ $property->location }}
                    </p>

                    <div class="mt-8 border-t border-gray-200 pt-8">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Description</h2>
                        <div class="prose prose-indigo text-gray-500 max-w-none">
                            {!! nl2br(e($property->description)) !!}
                        </div>
                    </div>

                    <div class="mt-8 border-t border-gray-200 pt-8">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Property Features</h2>
                        <dl class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
                            <div class="border-t border-gray-100 pt-4">
                                <dt class="font-medium text-gray-900">Property Type</dt>
                                <dd class="mt-1 text-sm text-gray-500">{{ $property->category->name ?? 'N/A' }}</dd>
                            </div>
                            <div class="border-t border-gray-100 pt-4">
                                <dt class="font-medium text-gray-900">Listing Type</dt>
                                <dd class="mt-1 text-sm text-gray-500">{{ ucfirst($property->listing_type) }}</dd>
                            </div>
                            <div class="border-t border-gray-100 pt-4">
                                <dt class="font-medium text-gray-900">Surface Area</dt>
                                <dd class="mt-1 text-sm text-gray-500">{{ number_format($property->surface) }} sqft</dd>
                            </div>
                            <div class="border-t border-gray-100 pt-4">
                                <dt class="font-medium text-gray-900">Bedrooms</dt>
                                <dd class="mt-1 text-sm text-gray-500">{{ $property->bedrooms }}</dd>
                            </div>
                            <div class="border-t border-gray-100 pt-4">
                                <dt class="font-medium text-gray-900">Bathrooms</dt>
                                <dd class="mt-1 text-sm text-gray-500">{{ $property->bathrooms }}</dd>
                            </div>
                            <div class="border-t border-gray-100 pt-4">
                                <dt class="font-medium text-gray-900">Status</dt>
                                <dd class="mt-1 text-sm text-gray-500">{{ ucfirst($property->status) }}</dd>
                            </div>
                        </dl>
                    </div>

                </div>
            </div>

            <!-- Right Column: Sidebar (Sticky on desktop) -->
            <div class="lg:col-span-4 lg:mt-0 mt-10">
                <div class="sticky top-24 space-y-8">
                    
                    <!-- Overview Card -->
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                        <p class="text-4xl font-bold tracking-tight text-indigo-600">
                            ${{ number_format($property->price, 0) }}
                            @if($isForRent)
                                <span class="text-lg font-normal text-gray-500">/mo</span>
                            @endif
                        </p>
                        <div class="mt-6 flex items-center justify-between text-center">
                            <div class="flex flex-col">
                                <span class="text-2xl font-bold text-gray-900">{{ $property->bedrooms }}</span>
                                <span class="text-xs font-medium text-gray-500 uppercase">Beds</span>
                            </div>
                            <div class="h-10 w-px bg-gray-200"></div>
                            <div class="flex flex-col">
                                <span class="text-2xl font-bold text-gray-900">{{ $property->bathrooms }}</span>
                                <span class="text-xs font-medium text-gray-500 uppercase">Baths</span>
                            </div>
                            <div class="h-10 w-px bg-gray-200"></div>
                            <div class="flex flex-col">
                                <span class="text-2xl font-bold text-gray-900">{{ number_format($property->surface) }}</span>
                                <span class="text-xs font-medium text-gray-500 uppercase">Sq Ft</span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form Card -->
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900">Interested in this property?</h3>
                        <p class="mt-2 text-sm text-gray-500">Fill out the form below or contact our agent directly.</p>

                        <div class="mt-6 flex items-center gap-4">
                            <img class="h-12 w-12 rounded-full bg-gray-100" src="https://ui-avatars.com/api/?name=Sarah+Jenkins&background=random" alt="">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Sarah Jenkins</p>
                                <p class="text-xs text-gray-500">Senior Real Estate Agent</p>
                            </div>
                        </div>

                        
                        <form action="{{ route('contact') }}" method="GET" class="mt-6 space-y-4">
                            <input type="hidden" name="property" value="{{ $property->slug }}">
                            <div>
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" name="name" id="name" autocomplete="name" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Your Name">
                            </div>
                            <div>
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Email Address">
                            </div>
                            <div>
                                <label for="message" class="sr-only">Message</label>
                                <textarea name="message" id="message" rows="4" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="I am interested in {{ $property->title }}..."></textarea>
                            </div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors">Send Message</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Mobile Sticky Footer CTA -->
    <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 p-4 shadow-lg lg:hidden z-40 pb-safe">
        <div class="flex gap-3">
             <a href="tel:+13105550123" class="flex flex-1 items-center justify-center gap-2 rounded-md bg-white border border-gray-300 px-3 py-3 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50">
                Call Agent
            </a>
            <button class="flex flex-1 items-center justify-center rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                Contact Now
            </button>
        </div>
    </div>
</div>
@endsection
