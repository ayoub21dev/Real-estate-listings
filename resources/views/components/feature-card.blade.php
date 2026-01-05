@props(['icon', 'title', 'description'])

<div class="flex flex-col items-center text-center p-6 bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-indigo-50 text-indigo-600 mb-6">
        {!! $icon !!}
    </div>
    <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
    <p class="mt-3 text-gray-500 leading-relaxed">{{ $description }}</p>
</div>
