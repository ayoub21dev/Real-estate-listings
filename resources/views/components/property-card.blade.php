@props(['property'])

@php
    $categoryColors = [
        'villa' => 'bg-purple-50 text-purple-700 ring-purple-700/10',
        'house' => 'bg-blue-50 text-blue-700 ring-blue-700/10',
        'apartment' => 'bg-green-50 text-green-700 ring-green-600/20',
        'commercial' => 'bg-gray-50 text-gray-600 ring-gray-500/10',
        'land' => 'bg-yellow-50 text-yellow-800 ring-yellow-600/20',
    ];
    
    $categoryName = strtolower($property->category->name ?? 'house');
    $colorClass = $categoryColors[$categoryName] ?? $categoryColors['house'];
    
    $isForRent = strtolower($property->listing_type) === 'rent';
    $isNew = $property->created_at->diffInDays(now()) <= 7;
@endphp

<article class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 flex flex-col">
    <div class="aspect-[4/3] w-full overflow-hidden bg-gray-200 relative">
        <img 
            src="{{ $property->primaryImageUrl }}" 
            alt="{{ $property->title }}" 
            class="h-full w-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
        >
        <div class="absolute top-4 right-4">
            @if($isNew)
                <span class="inline-flex items-center rounded-full bg-white/90 px-2.5 py-0.5 text-xs font-semibold text-green-700 shadow-sm backdrop-blur-sm">New</span>
            @else
                <span class="inline-flex items-center rounded-full bg-white/90 px-2.5 py-0.5 text-xs font-semibold {{ $isForRent ? 'text-indigo-700' : 'text-indigo-700' }} shadow-sm backdrop-blur-sm">
                    {{ $isForRent ? 'For Rent' : 'For Sale' }}
                </span>
            @endif
        </div>
    </div>
    <div class="p-5 flex-1 flex flex-col">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors line-clamp-1">{{ $property->title }}</h3>
                <p class="text-sm text-gray-500">{{ $property->location }}</p>
            </div>
            <span class="inline-flex items-center rounded-md {{ $colorClass }} px-2 py-1 text-xs font-medium ring-1 ring-inset">
                {{ $property->category->name ?? 'Property' }}
            </span>
        </div>
        
        @if($property->description)
            <p class="mt-3 text-sm text-gray-500 line-clamp-2">{{ Str::limit($property->description, 100) }}</p>
        @endif
        
        <div class="mt-4 flex items-center justify-between">
            <p class="text-xl font-bold text-gray-900">
                {{ number_format($property->price, 0) }} DH
                @if($isForRent)
                    <span class="text-sm font-normal text-gray-500">/mo</span>
                @endif
            </p>
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <span>{{ $property->bedrooms }} 🛏</span>
                <span>|</span>
                <span>{{ $property->bathrooms }} 🚿</span>
            </div>
        </div>
        
        <div class="mt-5 pt-4 border-t border-gray-100">
            <a href="{{ route('properties.show', $property->slug) }}" class="block w-full text-center rounded-md bg-white border border-indigo-600 px-3 py-2 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-50 transition-colors">
                View Details
            </a>
        </div>
    </div>
</article>
