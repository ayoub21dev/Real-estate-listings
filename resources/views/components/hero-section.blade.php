@props(['categories', 'locations'])

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
        <x-search-form :categories="$categories" :locations="$locations" />
    </div>
</div>
