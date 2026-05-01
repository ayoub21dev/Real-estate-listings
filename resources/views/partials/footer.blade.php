<!-- Footer -->
<footer class="border-t border-[#10201d]/10 bg-white text-[#10201d]" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="section-shell py-14 sm:py-16">
        <div class="grid gap-10 md:grid-cols-[1.4fr_0.8fr_0.8fr_1fr]">
            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <img src="{{ asset('assets/brand/logo.svg') }}?v=2" alt="UrbanKey" class="h-12 w-auto object-contain">
                </a>
                <p class="mt-5 max-w-sm text-sm leading-6 text-[#66736d]">
                    Clean property search, verified listings, and practical guidance for buyers, renters, and investors.
                </p>
            </div>

            <div>
                <h3 class="text-xs font-black uppercase tracking-[0.18em] text-[#8a7a61]">Explore</h3>
                <ul class="mt-5 space-y-3">
                    <li><a href="{{ route('properties.index') }}" class="text-sm text-[#66736d] transition-colors hover:text-[#10201d]">All properties</a></li>
                    <li><a href="{{ route('properties.index', ['listing_type' => 'for_sale']) }}" class="text-sm text-[#66736d] transition-colors hover:text-[#10201d]">Homes for sale</a></li>
                    <li><a href="{{ route('properties.index', ['listing_type' => 'for_rent']) }}" class="text-sm text-[#66736d] transition-colors hover:text-[#10201d]">Homes for rent</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xs font-black uppercase tracking-[0.18em] text-[#8a7a61]">Company</h3>
                <ul class="mt-5 space-y-3">
                    <li><a href="{{ route('about') }}" class="text-sm text-[#66736d] transition-colors hover:text-[#10201d]">About</a></li>
                    <li><a href="{{ route('contact') }}" class="text-sm text-[#66736d] transition-colors hover:text-[#10201d]">Contact</a></li>
                    <li><a href="{{ route('login') }}" class="text-sm text-[#66736d] transition-colors hover:text-[#10201d]">Sign in</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xs font-black uppercase tracking-[0.18em] text-[#8a7a61]">Contact</h3>
                <ul class="mt-5 space-y-3 text-sm text-[#66736d]">
                    <li>123 Business Avenue, Tech City</li>
                    <li><a href="tel:+15551234567" class="transition-colors hover:text-[#10201d]">+1 (555) 123-4567</a></li>
                    <li><a href="mailto:info@urbankey.com" class="transition-colors hover:text-[#10201d]">info@urbankey.com</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-4 border-t border-[#10201d]/10 pt-6 text-sm text-[#66736d] sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ date('Y') }} UrbanKey. All rights reserved.</p>
            <p>Built for precise, low-friction property discovery.</p>
        </div>
    </div>
</footer>
