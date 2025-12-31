<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display the home page.
     */
    public function home()
    {
        $categories = Category::all();
        $locations = Property::select('location')->distinct()->pluck('location');
        $featuredProperties = Property::with('category')
            ->where('status', 'approved')
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('categories', 'locations', 'featuredProperties'));
    }

    /**
     * Display the properties listing page.
     */
    public function properties(Request $request)
    {
        $categories = Category::all();
        $locations = Property::select('location')->distinct()->pluck('location');
        
        $query = Property::with('category')
            ->where('status', 'approved');

        // Filter by location
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by listing type
        if ($request->filled('listing_type')) {
            $query->where('listing_type', $request->listing_type);
        }

        // Filter by min price
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        // Filter by max price
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $properties = $query->latest()->paginate(12);

        return view('properties.index', compact('categories', 'properties', 'locations'));
    }

    /**
     * Display a single property.
     */
    public function showProperty($slug)
    {
        $property = Property::with('category')
            ->where('slug', $slug)
            ->where('status', 'approved')
            ->firstOrFail();

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
}
