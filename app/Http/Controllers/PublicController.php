<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\PropertyService;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    /**
     * Display the home page.
     */
    public function home()
    {
        $categories = Category::all();
        $locations = $this->propertyService->getLocations();
        $featuredProperties = $this->propertyService->getFeaturedProperties(6);

        return view('home', compact('categories', 'locations', 'featuredProperties'));
    }

    /**
     * Display the properties listing page.
     */
    public function properties(Request $request)
    {
        $categories = Category::all();
        $locations = $this->propertyService->getLocations();
        
        $filters = $request->only(['location', 'category', 'listing_type', 'min_price', 'max_price', 'keyword']);
        $properties = $this->propertyService->getPublicProperties($filters);

        return view('properties.index', compact('categories', 'properties', 'locations'));
    }

    /**
     * Display a single property.
     */
    public function showProperty($slug)
    {
        $property = $this->propertyService->getPropertyBySlug($slug);

        return view('properties.show', compact('property'));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * AJAX endpoint for dynamic property search.
     */
    public function searchProperties(Request $request)
    {
        $filters = $request->only(['location', 'category', 'listing_type', 'min_price', 'max_price', 'keyword', 'per_page']);
        $result = $this->propertyService->searchProperties($filters);

        return response()->json($result);
    }
}
