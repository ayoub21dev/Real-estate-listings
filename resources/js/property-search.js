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
        fetch('/api/properties/search', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
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
        const isForRent = property.listing_type.toLowerCase() === 'rent';
        const price = new Intl.NumberFormat('en-US').format(property.price);
        
        return `
            <article class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 flex flex-col">
                <div class="aspect-[4/3] w-full overflow-hidden bg-gray-200 relative">
                    <img src="${property.primary_image_url || property.images[0]?.image_url || ''}" 
                         alt="${property.title}" 
                         class="h-full w-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 right-4">
                        <span class="inline-flex items-center rounded-full bg-white/90 px-2.5 py-0.5 text-xs font-semibold text-indigo-700 shadow-sm backdrop-blur-sm">
                            ${isForRent ? 'For Rent' : 'For Sale'}
                        </span>
                    </div>
                </div>
                <div class="p-5 flex-1 flex flex-col">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors line-clamp-1">
                                ${property.title}
                            </h3>
                            <p class="text-sm text-gray-500">${property.location}</p>
                        </div>
                        <span class="inline-flex items-center rounded-md bg-blue-50 text-blue-700 ring-blue-700/10 px-2 py-1 text-xs font-medium ring-1 ring-inset">
                            ${property.category?.name || 'Property'}
                        </span>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <p class="text-xl font-bold text-gray-900">
                            ${price} DH${isForRent ? '<span class="text-sm font-normal text-gray-500">/mo</span>' : ''}
                        </p>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <span>${property.bedrooms} 🛏</span>
                            <span>|</span>
                            <span>${property.bathrooms} 🚿</span>
                        </div>
                    </div>
                    <div class="mt-5 pt-4 border-t border-gray-100">
                        <a href="/properties/${property.slug}" class="block w-full text-center rounded-md bg-white border border-indigo-600 px-3 py-2 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-50 transition-colors">
                            View Details
                        </a>
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
