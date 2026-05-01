<!-- Footer -->
<footer class="border-t border-white/10 bg-[#10201d] text-white" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="section-shell py-14 sm:py-16">
        <div class="grid gap-10 md:grid-cols-[1.4fr_0.8fr_0.8fr_1fr]">
            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-white text-[#10201d]">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 20V8.6L12 4l8 4.6V20" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 20v-6h6v6" />
                        </svg>
                    </span>
                    <span class="text-lg font-black tracking-tight">RealEstate Pro</span>
                </a>
                <p class="mt-5 max-w-sm text-sm leading-6 text-white/60">
                    Clean property search, verified listings, and practical guidance for buyers, renters, and investors.
                </p>
            </div>

            <div>
                <h3 class="text-xs font-black uppercase tracking-[0.18em] text-[#c4a16f]">Explore</h3>
                <ul class="mt-5 space-y-3">
                    <li><a href="{{ route('properties.index') }}" class="text-sm text-white/70 transition-colors hover:text-white">All properties</a></li>
                    <li><a href="{{ route('properties.index', ['listing_type' => 'for_sale']) }}" class="text-sm text-white/70 transition-colors hover:text-white">Homes for sale</a></li>
                    <li><a href="{{ route('properties.index', ['listing_type' => 'for_rent']) }}" class="text-sm text-white/70 transition-colors hover:text-white">Homes for rent</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xs font-black uppercase tracking-[0.18em] text-[#c4a16f]">Company</h3>
                <ul class="mt-5 space-y-3">
                    <li><a href="{{ route('about') }}" class="text-sm text-white/70 transition-colors hover:text-white">About</a></li>
                    <li><a href="{{ route('contact') }}" class="text-sm text-white/70 transition-colors hover:text-white">Contact</a></li>
                    <li><a href="{{ route('login') }}" class="text-sm text-white/70 transition-colors hover:text-white">Sign in</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xs font-black uppercase tracking-[0.18em] text-[#c4a16f]">Contact</h3>
                <ul class="mt-5 space-y-3 text-sm text-white/70">
                    <li>123 Business Avenue, Tech City</li>
                    <li><a href="tel:+15551234567" class="transition-colors hover:text-white">+1 (555) 123-4567</a></li>
                    <li><a href="mailto:info@realestatepro.com" class="transition-colors hover:text-white">info@realestatepro.com</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-4 border-t border-white/10 pt-6 text-sm text-white/45 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ date('Y') }} RealEstate Pro. All rights reserved.</p>
            <p>Built for precise, low-friction property discovery.</p>
        </div>
    </div>
</footer>
