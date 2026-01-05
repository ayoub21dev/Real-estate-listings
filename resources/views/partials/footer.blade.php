<!-- Footer -->
<footer class="bg-gray-900 text-white" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center gap-2 mb-4">
                    <svg class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                    </svg>
                    <span class="text-xl font-bold">RealEstate Pro</span>
                </div>
                <p class="text-sm text-gray-400 mb-6">Your trusted partner in finding the perfect home or investment property. Connecting people with places since 2010.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase mb-4">Properties</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('properties.index', ['listing_type' => 'sale']) }}" class="text-sm text-gray-400 hover:text-white transition-colors">Buy Residential</a></li>
                    <li><a href="{{ route('properties.index', ['listing_type' => 'rent']) }}" class="text-sm text-gray-400 hover:text-white transition-colors">Rent Residential</a></li>
                    <li><a href="{{ route('properties.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Commercial & Land</a></li>
                </ul>
            </div>
            {{-- <div>
                <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase mb-4">Company</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('about') }}" class="text-sm text-gray-400 hover:text-white transition-colors">About Us</a></li>
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white transition-colors">Agents</a></li>
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white transition-colors">Careers</a></li>
                    <li><a href="{{ route('contact') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div> --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase mb-4">Contact</h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-sm text-gray-400">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>123 Business Avenue,<br>Tech City, TC 90210</span>
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-400">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>+1 (555) 123-4567</span>
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-400">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>info@realestatepro.com</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-12 pt-8 text-center sm:flex sm:justify-between sm:text-left">
            <p class="text-sm text-gray-400">&copy; {{ date('Y') }} RealEstate Pro. All rights reserved.</p>
            <div class="mt-4 sm:mt-0 space-x-4">
                {{-- <a href="#" class="text-sm text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="text-sm text-gray-400 hover:text-white transition-colors">Terms of Service</a> --}}
            </div>
        </div>
    </div>
</footer>
