/**
 * Property Search AJAX functionality
 * Handles dynamic property filtering without page reload
 */

document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('property-search-form');
    const propertiesContainer = document.getElementById('properties-container');
    const loadingIndicator = document.getElementById('loading-indicator');
    
    if (!searchForm) return; // Exit if search form doesn't exist on this page

    // Handle form submission
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        performSearch();
    });

    // Optional: Handle filter changes in real-time (debounced)
    const filterInputs = searchForm.querySelectorAll('select, input');
    let debounceTimer;
    
    filterInputs.forEach(input => {
        input.addEventListener('change', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                performSearch();
            }, 500);
        });
    });

    function performSearch() {
        const formData = new FormData(searchForm);
        const params = new URLSearchParams(formData);

        // Show loading state
        if (loadingIndicator) {
            loadingIndicator.classList.remove('hidden');
        }
        if (propertiesContainer) {
            propertiesContainer.style.opacity = '0.5';
        }

        // Perform AJAX request
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

        fetch('/api/properties/search', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {}),
                'Accept': 'application/json'
            },
            body: JSON.stringify(Object.fromEntries(formData))
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updatePropertiesDisplay(data.data);
                updatePagination(data.pagination);
            }
        })
        .catch(error => {
            console.error('Search error:', error);
            alert('An error occurred while searching. Please try again.');
        })
        .finally(() => {
            // Hide loading state
            if (loadingIndicator) {
                loadingIndicator.classList.add('hidden');
            }
            if (propertiesContainer) {
                propertiesContainer.style.opacity = '1';
            }
        });
    }

    function updatePropertiesDisplay(properties) {
        if (!propertiesContainer) return;

        if (properties.length === 0) {
            propertiesContainer.innerHTML = `
                <div class="col-span-full text-center py-20 bg-white rounded-lg border border-gray-200 shadow-sm">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-semibold text-gray-900">No properties found</h3>
                    <p class="mt-1 text-sm text-gray-500">Try adjusting your search filters.</p>
                </div>
            `;
            return;
        }

        // Render property cards
        let html = '';
        properties.forEach(property => {
            html += createPropertyCard(property);
        });
        propertiesContainer.innerHTML = html;
    }

    function createPropertyCard(property) {
        const listingType = property.listing_type.toLowerCase();
        const isForRent = listingType === 'for_rent' || listingType === 'rent';
        const price = new Intl.NumberFormat('en-US').format(property.price);
        const imageUrl = property.primary_image_url || property.images?.[0]?.image_url || '';
        const category = property.category?.name || 'Property';
        
        return `
            <article class="group flex h-full flex-col overflow-hidden rounded-lg border border-[#10201d]/10 bg-white shadow-[0_1px_0_rgba(16,32,29,0.04)] transition duration-300 hover:-translate-y-1 hover:border-[#0f5e4d]/35 hover:shadow-[0_18px_45px_rgba(16,32,29,0.12)]">
                <a href="/properties/${property.slug}" class="block">
                    <div class="relative aspect-[4/3] overflow-hidden bg-[#e8ece7]">
                        <img src="${imageUrl}" 
                             alt="${property.title}" 
                             class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.045]">
                        <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#10201d]/50 to-transparent"></div>
                        <div class="absolute left-3 top-3">
                            <span class="rounded-md bg-white/95 px-2.5 py-1 text-xs font-black uppercase tracking-[0.12em] text-[#10201d] shadow-sm backdrop-blur">
                                ${isForRent ? 'For rent' : 'For sale'}
                            </span>
                        </div>
                        <div class="absolute bottom-3 left-3 rounded-md bg-[#10201d]/85 px-3 py-1.5 text-sm font-black text-white backdrop-blur">
                            ${price} DH${isForRent ? '<span class="font-medium text-white/70"> /mo</span>' : ''}
                        </div>
                    </div>
                </a>
                <div class="flex flex-1 flex-col p-4">
                    <div class="flex items-start justify-between gap-4">
                        <div class="min-w-0">
                            <h3 class="line-clamp-1 text-base font-black tracking-tight text-[#10201d] transition-colors group-hover:text-[#0f5e4d]">
                                ${property.title}
                            </h3>
                            <p class="mt-1 text-sm text-[#66736d]">${property.location}</p>
                        </div>
                        <span class="flex-none rounded-md border border-[#10201d]/10 px-2 py-1 text-xs font-bold text-[#66736d]">
                            ${category}
                        </span>
                    </div>
                    <div class="mt-auto grid grid-cols-3 gap-2 border-t border-[#10201d]/10 pt-4 text-sm">
                        <div><span class="block text-xs font-bold uppercase tracking-[0.12em] text-[#8a948e]">Beds</span><span class="mt-1 block font-black text-[#10201d]">${property.bedrooms}</span></div>
                        <div><span class="block text-xs font-bold uppercase tracking-[0.12em] text-[#8a948e]">Baths</span><span class="mt-1 block font-black text-[#10201d]">${property.bathrooms}</span></div>
                        <div><span class="block text-xs font-bold uppercase tracking-[0.12em] text-[#8a948e]">Area</span><span class="mt-1 block font-black text-[#10201d]">${new Intl.NumberFormat('en-US').format(property.surface)} m²</span></div>
                    </div>
                </div>
            </article>
        `;
    }

    function updatePagination(pagination) {
        const paginationContainer = document.getElementById('pagination-container');
        if (!paginationContainer || !pagination) return;

        // Update result count
        const resultCount = document.getElementById('result-count');
        if (resultCount) {
            resultCount.textContent = `Showing ${pagination.from || 0}-${pagination.to || 0} of ${pagination.total} results`;
        }

        // You can add more complex pagination rendering here if needed
    }
});
