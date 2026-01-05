@props(['categories', 'locations'])

<div class="mx-auto mt-10 max-w-4xl opacity-0 animate-[fadeInUp_0.8s_ease-out_forwards_0.5s]" style="animation-fill-mode: forwards;">
    <div class="bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl p-4 sm:p-6 border border-white/20">
        <form action="{{ route('properties.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4">
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

            <!-- Price Range -->
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
