@props(['icon', 'title', 'description'])

<div class="group border-t border-[#10201d]/12 py-6">
    <div class="flex items-start gap-4">
        <div class="mt-1 flex h-10 w-10 flex-none items-center justify-center rounded-lg border border-[#10201d]/10 bg-white text-[#0f5e4d] transition-colors group-hover:border-[#0f5e4d]/40">
            {!! $icon !!}
        </div>
        <div>
            <h3 class="text-base font-black tracking-tight text-[#10201d]">{{ $title }}</h3>
            <p class="mt-2 text-sm leading-6 text-[#66736d]">{{ $description }}</p>
        </div>
    </div>
</div>
