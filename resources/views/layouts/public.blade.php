<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Find your dream home with RealEstate Pro. We offer verified listings, expert agents, and a seamless buying experience.')">
    <meta property="og:title" content="@yield('og_title', 'RealEstate Pro - Find Your Dream Home')">
    <meta property="og:description" content="@yield('og_description', 'Trusted real estate agency with verified listings. Search properties for sale and rent.')">
    <meta property="og:image" content="@yield('og_image', 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80')">
    <title>@yield('title', 'RealEstate Pro - Find Your Dream Home')</title>
    
    <!-- Tailwind CSS 4+ CDN -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    
    @stack('head')
    
    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-white text-gray-900 font-sans antialiased @yield('body_class')">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
