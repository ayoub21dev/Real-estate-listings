@props(['categories', 'locations'])

<form action="{{ route('properties.index') }}" method="GET" class="grid grid-cols-1 gap-3 lg:grid-cols-[1.25fr_1fr_1fr_1fr_auto] lg:items-end">
    <div class="min-w-0">
        <label for="location" class="field-label">Location</label>
        <select id="location" name="location" class="ui-field">
            <option value="">All locations</option>
            @foreach($locations as $loc)
                <option value="{{ $loc }}" {{ request('location') == $loc ? 'selected' : '' }}>{{ $loc }}</option>
            @endforeach
        </select>
    </div>

    <div class="min-w-0">
        <label for="category" class="field-label">Property type</label>
        <select id="category" name="category" class="ui-field">
            <option value="">Any type</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="min-w-0">
        <label for="listing_type" class="field-label">Listing</label>
        <select id="listing_type" name="listing_type" class="ui-field">
            <option value="">Buy or rent</option>
            <option value="for_sale" {{ request('listing_type') == 'for_sale' ? 'selected' : '' }}>For sale</option>
            <option value="for_rent" {{ request('listing_type') == 'for_rent' ? 'selected' : '' }}>For rent</option>
        </select>
    </div>

    <div class="min-w-0">
        <label for="max_price" class="field-label">Budget</label>
        <select id="max_price" name="max_price" class="ui-field">
            <option value="">Any budget</option>
            <option value="200000" {{ request('max_price') == '200000' ? 'selected' : '' }}>Up to 200,000 DH</option>
            <option value="500000" {{ request('max_price') == '500000' ? 'selected' : '' }}>Up to 500,000 DH</option>
            <option value="1000000" {{ request('max_price') == '1000000' ? 'selected' : '' }}>Up to 1,000,000 DH</option>
            <option value="5000000" {{ request('max_price') == '5000000' ? 'selected' : '' }}>Up to 5,000,000 DH</option>
        </select>
    </div>

    <button type="submit" class="btn-primary w-full whitespace-nowrap lg:w-auto">
        Search listings
        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 10h12m-4-4 4 4-4 4" />
        </svg>
    </button>
</form>
