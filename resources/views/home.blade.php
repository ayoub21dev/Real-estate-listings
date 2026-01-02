@extends('layouts.public')

@section('title', 'RealEstate Pro - Find Your Dream Home')
@section('meta_description', 'Find your dream home with RealEstate Pro. We offer verified listings, expert agents, and a seamless buying experience in your region.')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900 h-[600px] sm:h-[700px] flex items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img class="h-full w-full object-cover opacity-60 transform hover:scale-105 transition-transform duration-[20s]" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Modern city skyline and architecture">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/60 via-gray-900/40 to-gray-900/80 mix-blend-multiply" aria-hidden="true"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8 w-full">
            <span class="inline-flex items-center rounded-full bg-indigo-500/10 px-3 py-1 text-sm font-medium text-indigo-200 ring-1 ring-inset ring-indigo-500/20 mb-6 backdrop-blur-sm">
                #1 Rated Agency in the Region
            </span>
            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl lg:text-6xl drop-shadow-sm">
                Find Your Dream Property Today
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg sm:text-xl text-gray-200 drop-shadow-md">
                Trusted real estate agency with verified listings, expert market insights, and a seamless buying experience in your city.
            </p>

            <!-- Search Filter Form -->
            <div class="mx-auto mt-10 max-w-4xl opacity-0 animate-[fadeInUp_0.8s_ease-out_forwards_0.5s]" style="animation-fill-mode: forwards;">
                <div class="bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl p-4 sm:p-6 border border-white/20">
                    <form action="{{ route('properties.index') }}" class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        <!-- Location -->
                        <div class="md:col-span-4 relative group">
                            <label for="location" class="sr-only">Location</label>
                            <select id="location" name="location" class="block w-full rounded-lg border-0 py-3 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 cursor-pointer">
                                <option value="">All Locations</option>
                                @foreach($locations as $loc)
                                    <option value="{{ $loc }}">{{ $loc }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Property Type -->
                        <div class="md:col-span-3 relative">
                            <label for="category" class="sr-only">Property Type</label>
                            <select id="category" name="category" class="block w-full rounded-lg border-0 py-3 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 cursor-pointer">
                                <option value="">Property Type</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price Range Placeholder -->
                        <div class="md:col-span-3 relative">
                            <label for="max_price" class="sr-only">Max Price</label>
                            <select id="max_price" name="max_price" class="block w-full rounded-lg border-0 py-3 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 cursor-pointer">
                                <option value="">Max Price</option>
                                <option value="200000">200,000 DH</option>
                                <option value="500000">500,000 DH</option>
                                <option value="1000000">1,000,000 DH</option>
                                <option value="5000000">5,000,000+ DH</option>
                            </select>
                        </div>

                        <!-- Search Button -->
                        <div class="md:col-span-2">
                            <button type="submit" class="w-full h-full rounded-lg bg-indigo-600 px-3.5 py-3 text-sm font-bold text-white shadow-sm hover:bg-indigo-500 hover:shadow-indigo-500/30 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-200 transform hover:-translate-y-0.5">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <section class="py-24 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-base font-semibold leading-7 text-indigo-600 tracking-wide uppercase">Why Choose RealEstate Pro</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">The smartest way to buy your home</p>
                <p class="mt-4 text-lg leading-8 text-gray-600">We provide a complete service for the sale, purchase, or rental of real estate with a focus on ease and transparency.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-indigo-50 text-indigo-600 mb-6">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Verified Listings</h3>
                    <p class="mt-3 text-gray-500 leading-relaxed">Every property is inspected and verified by our team to ensure accuracy and quality.</p>
                </div>

                <!-- Feature 2 -->
                <div class="flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-indigo-50 text-indigo-600 mb-6">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Expert Agents</h3>
                    <p class="mt-3 text-gray-500 leading-relaxed">Our local experts guide you through every step of the process with personalized advice.</p>
                </div>

                <!-- Feature 3 -->
                <div class="flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-indigo-50 text-indigo-600 mb-6">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Easy Process</h3>
                    <p class="mt-3 text-gray-500 leading-relaxed">We streamline the paperwork and negotiations so you can focus on moving in.</p>
                </div>

                <!-- Feature 4 -->
                <div class="flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-indigo-50 text-indigo-600 mb-6">
                       <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">24/7 Support</h3>
                    <p class="mt-3 text-gray-500 leading-relaxed">Our dedicated support team is always available to answer your questions.</p>
                </div>
            </div>
        </div>
    </section>

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
    <section class="relative bg-indigo-600 py-24 sm:py-32 isolate overflow-hidden">
        <!-- Background Effects -->
<div class="absolute inset-0 -z-10 bg-white"></div>
        <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center"></div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-[#172030] sm:text-4xl">
  Ready to find your next home?
</h2>

                <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-[#172030]">
                    Join thousands of satisfied customers who found their perfect property with RealEstate Pro. Start your search today.
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a  href="{{ route('properties.index') }}"
  class="rounded-md bg-white px-5 py-3 text-sm font-semibold text-[#172030]
         shadow-[0_1px_2px_0_rgba(23,32,48,0.25)]
         hover:shadow-[0_4px_6px_-1px_rgba(23,32,48,0.35)]
         transition-all transform hover:scale-105">Browse All Properties
                    </a>
                    {{-- <a href="{{ route('contact') }}" class="text-sm font-semibold leading-6 text-[#172030] hover:text-black flex items-center gap-1 group">
                        Contact Support <span aria-hidden="true" class="group-hover:translate-x-1 transition-transform">→</span>
                    </a> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
