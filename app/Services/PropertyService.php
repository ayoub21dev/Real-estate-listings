<?php

namespace App\Services;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;

class PropertyService
{
    /**
     * Get public properties with optional filters.
     *
     * @param array $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPublicProperties(array $filters = [])
    {
        $query = Property::with(['category', 'images'])
            ->where('status', 'approved');

        // Filter by location
        if (!empty($filters['location'])) {
            $query->where('location', $filters['location']);
        }

        // Filter by category
        if (!empty($filters['category'])) {
            $query->where('category_id', $filters['category']);
        }

        // Filter by listing type
        if (!empty($filters['listing_type'])) {
            $query->where('listing_type', $filters['listing_type']);
        }

        // Filter by minimum price
        if (!empty($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }

        // Filter by maximum price
        if (!empty($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }

        // Search by keywords (title, description, location)
        if (!empty($filters['keyword'])) {
            $keyword = $filters['keyword'];
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('description', 'LIKE', "%{$keyword}%")
                    ->orWhere('location', 'LIKE', "%{$keyword}%");
            });
        }

        // Default sorting: latest first
        $query->latest();

        // Paginate results
        $perPage = $filters['per_page'] ?? 12;
        
        return $query->paginate($perPage);
    }

    /**
     * Get featured properties for homepage.
     *
     * @param int $limit
     * @return Collection
     */
    public function getFeaturedProperties(int $limit = 6): Collection
    {
        return Property::with(['category', 'images'])
            ->where('status', 'approved')
            ->latest()
            ->take($limit)
            ->get();
    }

    /**
     * Get a single property by slug.
     *
     * @param string $slug
     * @return Property
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getPropertyBySlug(string $slug): Property
    {
        return Property::with(['category', 'images'])
            ->where('slug', $slug)
            ->where('status', 'approved')
            ->firstOrFail();
    }

    /**
     * Get all unique locations.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getLocations()
    {
        return Property::select('location')
            ->distinct()
            ->orderBy('location')
            ->pluck('location');
    }

    /**
     * Search properties via AJAX (returns JSON-friendly data).
     *
     * @param array $filters
     * @return array
     */
    public function searchProperties(array $filters = []): array
    {
        $properties = $this->getPublicProperties($filters);

        return [
            'success' => true,
            'data' => $properties->items(),
            'pagination' => [
                'current_page' => $properties->currentPage(),
                'last_page' => $properties->lastPage(),
                'per_page' => $properties->perPage(),
                'total' => $properties->total(),
                'from' => $properties->firstItem(),
                'to' => $properties->lastItem(),
            ],
        ];
    }
}
