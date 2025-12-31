@extends('layouts.public')

@section('title', 'About Us - RealEstate Pro')
@section('meta_description', 'Learn about RealEstate Pro - your trusted partner in finding the perfect home. Discover our mission, values, and expert team.')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900 py-24 sm:py-32">
        <div class="absolute inset-0 overflow-hidden">
            <img class="h-full w-full object-cover opacity-30" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="">
        </div>
        <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">About RealEstate Pro</h1>
                <p class="mt-6 text-lg leading-8 text-gray-300">Your trusted partner in finding the perfect home or investment property since 2010.</p>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <section class="py-24 bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                <div class="grid max-w-xl grid-cols-1 gap-8 text-base leading-7 text-gray-700 lg:max-w-none lg:grid-cols-2">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">Our Mission</h2>
                        <p class="mb-4">At RealEstate Pro, we believe that everyone deserves to find their perfect home. Our mission is to make the process of buying, selling, or renting property as seamless and stress-free as possible.</p>
                        <p>We combine cutting-edge technology with personalized service to ensure that every client receives the attention and expertise they deserve. Our team of experienced professionals is dedicated to helping you achieve your real estate goals.</p>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">Our Values</h2>
                        <ul class="space-y-4">
                            <li class="flex gap-3">
                                <svg class="h-6 w-6 flex-none text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span><strong class="text-gray-900">Integrity:</strong> We maintain the highest ethical standards in all our dealings.</span>
                            </li>
                            <li class="flex gap-3">
                                <svg class="h-6 w-6 flex-none text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span><strong class="text-gray-900">Excellence:</strong> We strive for excellence in every service we provide.</span>
                            </li>
                            <li class="flex gap-3">
                                <svg class="h-6 w-6 flex-none text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span><strong class="text-gray-900">Client Focus:</strong> Your needs are always our top priority.</span>
                            </li>
                            <li class="flex gap-3">
                                <svg class="h-6 w-6 flex-none text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span><strong class="text-gray-900">Innovation:</strong> We embrace technology to better serve you.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-indigo-600 py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:max-w-none">
                <div class="text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Trusted by thousands of clients</h2>
                    <p class="mt-4 text-lg leading-8 text-indigo-200">We've been helping people find their dream homes for over a decade.</p>
                </div>
                <dl class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm font-semibold leading-6 text-indigo-200">Years of Experience</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">14+</dd>
                    </div>
                    <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm font-semibold leading-6 text-indigo-200">Properties Sold</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">5,000+</dd>
                    </div>
                    <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm font-semibold leading-6 text-indigo-200">Happy Clients</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">10,000+</dd>
                    </div>
                    <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm font-semibold leading-6 text-indigo-200">Expert Agents</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">50+</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-24 bg-gray-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center mb-16">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Meet Our Team</h2>
                <p class="mt-4 text-lg leading-8 text-gray-600">Our experienced team is here to help you every step of the way.</p>
            </div>
            <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-4">
                @php
                    $team = [
                        ['name' => 'Sarah Jenkins', 'role' => 'Senior Agent', 'image' => 'Sarah+Jenkins'],
                        ['name' => 'Michael Chen', 'role' => 'Sales Director', 'image' => 'Michael+Chen'],
                        ['name' => 'Emily Davis', 'role' => 'Property Consultant', 'image' => 'Emily+Davis'],
                        ['name' => 'David Wilson', 'role' => 'Market Analyst', 'image' => 'David+Wilson'],
                    ];
                @endphp
                @foreach($team as $member)
                    <li>
                        <div class="flex items-center gap-x-4">
                            <img class="h-16 w-16 rounded-full bg-gray-100" src="https://ui-avatars.com/api/?name={{ $member['image'] }}&background=random&size=128" alt="">
                            <div>
                                <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">{{ $member['name'] }}</h3>
                                <p class="text-sm font-semibold leading-6 text-indigo-600">{{ $member['role'] }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-white py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Ready to find your dream home?</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-600">
                    Get in touch with our team today and let us help you find the perfect property.
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{ route('properties.index') }}" class="rounded-md bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Browse Properties
                    </a>
                    <a href="{{ route('contact') }}" class="text-sm font-semibold leading-6 text-gray-900">
                        Contact Us <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
