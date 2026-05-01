<!-- Why Choose Us Section -->
<section class="bg-[#f7f8f5] py-20 sm:py-24">
    <div class="section-shell">
        <div class="grid gap-12 lg:grid-cols-[0.82fr_1.18fr] lg:items-start">
            <div>
                <div class="mb-6 flex items-center gap-4">
                    <span class="eyebrow-line"></span>
                    <span class="text-xs font-black uppercase tracking-[0.2em] text-[#8a7a61]">Why it feels easier</span>
                </div>
                <h2 class="font-display text-4xl font-normal leading-tight tracking-tight text-[#10201d] sm:text-5xl">
                    A quieter way to compare serious homes.
                </h2>
                <p class="mt-5 max-w-lg text-base leading-7 text-[#66736d]">
                    The experience is designed around useful details, verified inventory, and fast decisions without noisy interface clutter.
                </p>
            </div>

            <div class="grid gap-x-8 md:grid-cols-2">
                <x-feature-card
                    title="Verified listings"
                    description="Every property is checked for clear photos, location data, price accuracy, and essential details.">
                    <x-slot name="icon">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7" />
                        </svg>
                    </x-slot>
                </x-feature-card>

                <x-feature-card
                    title="Fast filtering"
                    description="Compare homes by city, type, listing intent, price, and core specs without losing context.">
                    <x-slot name="icon">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M7 12h10M10 17h4" />
                        </svg>
                    </x-slot>
                </x-feature-card>

                <x-feature-card
                    title="Readable details"
                    description="Each detail page brings price, gallery, features, and contact actions into a simple decision flow.">
                    <x-slot name="icon">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                        </svg>
                    </x-slot>
                </x-feature-card>

                <x-feature-card
                    title="Direct support"
                    description="Contact forms and agent prompts stay close to the listing so the next step is always obvious.">
                    <x-slot name="icon">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a8.38 8.38 0 0 1-.9 3.8L21 21l-5.2-.9A8.5 8.5 0 1 1 21 12Z" />
                        </svg>
                    </x-slot>
                </x-feature-card>
            </div>
        </div>
    </div>
</section>
