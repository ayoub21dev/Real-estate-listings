@extends('layouts.public')

@section('title', 'About UrbanKey')
@section('meta_description', 'Learn about UrbanKey, a clean real estate search experience built around verified listings and practical guidance.')

@section('content')
    <section class="relative isolate overflow-hidden bg-[#10201d]">
        <img
            class="absolute inset-0 -z-10 h-full w-full object-cover opacity-30"
            src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=2200&q=85"
            alt="Bright architectural living space"
        >
        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-[#10201d] via-[#10201d]/90 to-[#10201d]/35"></div>
        <div class="section-shell py-20 sm:py-28">
            <div class="max-w-3xl">
                <div class="mb-8 flex items-center gap-4">
                    <span class="eyebrow-line bg-[#c4a16f]"></span>
                    <span class="text-xs font-black uppercase tracking-[0.2em] text-white/70">About the agency</span>
                </div>
                <h1 class="font-display text-5xl font-normal leading-tight tracking-tight text-white sm:text-6xl">Real estate without the noise.</h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/75">
                    UrbanKey helps people move from endless browsing to a focused shortlist of properties worth visiting.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="section-shell">
            <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr]">
                <div>
                    <h2 class="font-display text-4xl font-normal leading-tight tracking-tight text-[#10201d] sm:text-5xl">Built around clarity.</h2>
                </div>
                <div class="grid gap-8 text-base leading-8 text-[#53625c] md:grid-cols-2">
                    <p>
                        We focus on verified listing data, clean photography, and details buyers can actually compare: location, price, area, rooms, and status.
                    </p>
                    <p>
                        Our team combines local market knowledge with a calmer search experience, so every visit starts from better information.
                    </p>
                </div>
            </div>

            <dl class="mt-14 grid gap-px overflow-hidden rounded-lg border border-[#10201d]/10 bg-[#10201d]/10 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-[#f7f8f5] p-6">
                    <dt class="text-sm font-bold text-[#66736d]">Years of experience</dt>
                    <dd class="mt-3 font-display text-4xl text-[#10201d]">14+</dd>
                </div>
                <div class="bg-[#f7f8f5] p-6">
                    <dt class="text-sm font-bold text-[#66736d]">Properties sold</dt>
                    <dd class="mt-3 font-display text-4xl text-[#10201d]">5,000+</dd>
                </div>
                <div class="bg-[#f7f8f5] p-6">
                    <dt class="text-sm font-bold text-[#66736d]">Client matches</dt>
                    <dd class="mt-3 font-display text-4xl text-[#10201d]">10k+</dd>
                </div>
                <div class="bg-[#f7f8f5] p-6">
                    <dt class="text-sm font-bold text-[#66736d]">Market specialists</dt>
                    <dd class="mt-3 font-display text-4xl text-[#10201d]">50+</dd>
                </div>
            </dl>
        </div>
    </section>

    <section class="bg-[#f7f8f5] py-20 sm:py-24">
        <div class="section-shell">
            <div class="grid gap-12 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <div class="mb-6 flex items-center gap-4">
                        <span class="eyebrow-line"></span>
                        <span class="text-xs font-black uppercase tracking-[0.2em] text-[#8a7a61]">How we work</span>
                    </div>
                    <h2 class="font-display text-4xl font-normal leading-tight tracking-tight text-[#10201d] sm:text-5xl">Useful guidance at each step.</h2>
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    @foreach([
                        ['title' => 'Verify the essentials', 'copy' => 'We review listing basics before a property gets surfaced.'],
                        ['title' => 'Shortlist with context', 'copy' => 'Search results make tradeoffs easier to scan quickly.'],
                        ['title' => 'Plan better visits', 'copy' => 'Property pages keep gallery, facts, and inquiry details in one flow.'],
                        ['title' => 'Move with confidence', 'copy' => 'Agents help clarify availability, pricing, and next steps.'],
                    ] as $item)
                        <div class="border-t border-[#10201d]/12 pt-5">
                            <h3 class="font-black tracking-tight text-[#10201d]">{{ $item['title'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-[#66736d]">{{ $item['copy'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <x-cta-section />
@endsection
