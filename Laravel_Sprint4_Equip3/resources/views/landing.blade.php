<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Blink - Complete SaaS platform for managing shared electric vehicle fleets. Sustainable urban mobility solutions for businesses.">
    <meta name="keywords" content="electric vehicles, fleet management, sustainable mobility, EV sharing, SaaS">

    <title>Blink - Smart Electric Mobility Platform</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 antialiased">
    
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-lg border-b border-gray-200 dark:border-gray-800">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center space-x-2 w-48">
                    <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">Blink</span>
                </div>

                <!-- Navigation Links (Centered with absolute positioning) -->
                <div class="absolute left-1/2 transform -translate-x-1/2 hidden md:flex items-center space-x-8">
                    <a href="#screenshots" class="text-gray-600 dark:text-gray-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors font-medium">Screenshots</a>
                    <a href="#features" class="text-gray-600 dark:text-gray-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors font-medium">Features</a>
                    <a href="#benefits" class="text-gray-600 dark:text-gray-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors font-medium">Benefits</a>
                    <a href="#roadmap" class="text-gray-600 dark:text-gray-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors font-medium">Roadmap</a>
                    <a href="#contact" class="text-gray-600 dark:text-gray-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors font-medium">Contact</a>
                </div>

                <!-- CTA Buttons & Language Selector -->
                <div class="flex items-center space-x-3 w-64 justify-end">
                    <!-- Language Selector -->
                    <div class="relative">
                        <button id="lang-btn" class="flex items-center space-x-2 px-3 py-2 text-gray-600 dark:text-gray-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                            </svg>
                            <span id="current-lang" class="font-medium">CA</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown -->
                        <div id="lang-dropdown" class="hidden absolute right-0 mt-2 w-36 bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden z-50">
                            <button data-lang="ca" class="lang-option w-full flex items-center px-4 py-3 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition-colors text-left">
                                <span class="font-medium text-gray-900 dark:text-gray-100">Català</span>
                            </button>
                            <button data-lang="en" class="lang-option w-full flex items-center px-4 py-3 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition-colors text-left">
                                <span class="font-medium text-gray-900 dark:text-gray-100">English</span>
                            </button>
                        </div>
                    </div>
                    
                    <a href="#contact" class="inline-block px-6 py-2.5 bg-gradient-to-r from-emerald-600 to-emerald-500 text-white rounded-lg hover:from-emerald-700 hover:to-emerald-600 transition-all font-semibold shadow-lg shadow-emerald-500/30 whitespace-nowrap">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 px-6 overflow-hidden">
        <!-- Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-white to-emerald-50 dark:from-gray-900 dark:via-gray-900 dark:to-gray-800"></div>
        <div class="absolute top-0 right-0 w-1/2 h-1/2 bg-gradient-to-br from-emerald-200/20 to-emerald-200/20 dark:from-emerald-900/10 dark:to-emerald-900/10 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Hero Content -->
                <div class="space-y-8">
                    <div class="inline-block px-4 py-2 bg-emerald-100 dark:bg-emerald-900/30 rounded-full">
                        <span class="text-emerald-700 dark:text-emerald-400 font-semibold text-sm">🌱 Sustainable Urban Mobility</span>
                    </div>
                    
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight">
                        Smart Fleet Management for 
                        <span class="bg-gradient-to-r from-emerald-600 to-emerald-600 bg-clip-text text-transparent">Electric Vehicles</span>
                    </h1>
                    
                    <p class="text-xl text-gray-600 dark:text-gray-300 leading-relaxed">
                        Manage your electric mobility fleet with real-time control and analytics.
                    </p>
                    
                    <!-- Key Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-4">
                        <div class="space-y-1">
                            <div class="text-3xl font-bold text-emerald-600">100%</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Electric</div>
                        </div>
                        <div class="space-y-1">
                            <div class="text-3xl font-bold text-emerald-600">24/7</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Monitoring</div>
                        </div>
                        <div class="space-y-1">
                            <div class="text-3xl font-bold text-emerald-600">∞</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Scalable</div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="#contact" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-emerald-600 to-emerald-600 text-white rounded-lg hover:from-emerald-700 hover:to-emerald-700 transition-all font-semibold shadow-xl shadow-emerald-500/30 text-lg">
                            Request Demo
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="#features" class="inline-flex items-center justify-center px-8 py-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-white border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-emerald-600 dark:hover:border-emerald-500 transition-all font-semibold text-lg">
                            Learn More
                        </a>
                    </div>
                </div>

                <!-- Hero Image Placeholder -->
                <div class="relative">
                    <div class="relative bg-gradient-to-br from-emerald-100 to-emerald-100 dark:from-emerald-900/20 dark:to-emerald-900/20 rounded-2xl p-8 shadow-2xl">
                        <div class="aspect-video bg-white dark:bg-gray-800 rounded-lg shadow-inner flex items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600">
                            <div class="text-center space-y-2">
                                <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Dashboard Screenshot<br/>Coming Soon</p>
                            </div>
                        </div>
                    </div>
                    <!-- Floating Elements -->
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-gradient-to-br from-emerald-400 to-emerald-400 rounded-full blur-xl opacity-50 animate-pulse"></div>
                    <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-gradient-to-br from-emerald-400 to-emerald-400 rounded-full blur-xl opacity-50 animate-pulse delay-1000"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Screenshots Carousel Section -->
    <section id="screenshots" class="py-20 px-6 bg-gray-50 dark:bg-gray-800/50">
        <div class="container mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">See Blink in Action</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Explore our intuitive dashboard and powerful features</p>
            </div>

            <!-- Carousel Container -->
            <div class="relative max-w-5xl mx-auto">
                <!-- Carousel Wrapper -->
                <div class="overflow-hidden rounded-2xl shadow-2xl">
                    <div id="carousel-track" class="flex transition-transform duration-500 ease-out">
                        <!-- Slide 1 - Placeholder -->
                        <div class="min-w-full flex-shrink-0">
                            <div class="aspect-video bg-gradient-to-br from-emerald-100 to-teal-100 dark:from-emerald-900/20 dark:to-teal-900/20 flex items-center justify-center">
                                <div class="text-center space-y-4 p-8">
                                    <svg class="w-20 h-20 mx-auto text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard Overview</h3>
                                    <p class="text-gray-600 dark:text-gray-300">Screenshot coming soon</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 - Placeholder -->
                        <div class="min-w-full flex-shrink-0">
                            <div class="aspect-video bg-gradient-to-br from-teal-100 to-emerald-100 dark:from-teal-900/20 dark:to-emerald-900/20 flex items-center justify-center">
                                <div class="text-center space-y-4 p-8">
                                    <svg class="w-20 h-20 mx-auto text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Analytics & Reports</h3>
                                    <p class="text-gray-600 dark:text-gray-300">Screenshot coming soon</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 - Placeholder -->
                        <div class="min-w-full flex-shrink-0">
                            <div class="aspect-video bg-gradient-to-br from-emerald-100 to-cyan-100 dark:from-emerald-900/20 dark:to-cyan-900/20 flex items-center justify-center">
                                <div class="text-center space-y-4 p-8">
                                    <svg class="w-20 h-20 mx-auto text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Fleet Map View</h3>
                                    <p class="text-gray-600 dark:text-gray-300">Screenshot coming soon</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button id="prev-btn" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white dark:bg-gray-800 rounded-full shadow-lg flex items-center justify-center text-gray-800 dark:text-gray-200 hover:bg-emerald-500 hover:text-white transition-all z-10 group">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="next-btn" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white dark:bg-gray-800 rounded-full shadow-lg flex items-center justify-center text-gray-800 dark:text-gray-200 hover:bg-emerald-500 hover:text-white transition-all z-10 group">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Indicators -->
                <div class="flex justify-center gap-2 mt-6">
                    <button class="carousel-indicator w-3 h-3 rounded-full bg-emerald-600 transition-all" data-index="0"></button>
                    <button class="carousel-indicator w-3 h-3 rounded-full bg-gray-300 dark:bg-gray-600 hover:bg-emerald-400 transition-all" data-index="1"></button>
                    <button class="carousel-indicator w-3 h-3 rounded-full bg-gray-300 dark:bg-gray-600 hover:bg-emerald-400 transition-all" data-index="2"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 px-6 bg-gray-50 dark:bg-gray-800/50">
        <div class="container mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Key Features</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Essential tools for fleet management</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Authentication System</h3>
                    <p class="text-gray-600 dark:text-gray-300">Secure JWT authentication with role management</p>
                    <div class="mt-4">
                        <span class="inline-block px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-semibold">✓ Implemented</span>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Vehicle Management</h3>
                    <p class="text-gray-600 dark:text-gray-300">Complete CRUD and real-time battery monitoring</p>
                    <div class="mt-4">
                        <span class="inline-block px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-semibold">✓ Implemented</span>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">User Management</h3>
                    <p class="text-gray-600 dark:text-gray-300">User CRUD with roles and permissions</p>
                    <div class="mt-4">
                        <span class="inline-block px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-semibold">✓ Implemented</span>
                    </div>
                </div>

                <!-- Feature Card 4 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Internationalization</h3>
                    <p class="text-gray-600 dark:text-gray-300">Multi-language support (Catalan, Spanish, English)</p>
                    <div class="mt-4">
                        <span class="inline-block px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-semibold">✓ Implemented</span>
                    </div>
                </div>

                <!-- Feature Card 5 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">User Configuration</h3>
                    <p class="text-gray-600 dark:text-gray-300">Customizable user settings and preferences</p>
                    <div class="mt-4">
                        <span class="inline-block px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-semibold">✓ Implemented</span>
                    </div>
                </div>

                <!-- Feature Card 6 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Reusable Components</h3>
                    <p class="text-gray-600 dark:text-gray-300">Library of base components for rapid development</p>
                    <div class="mt-4">
                        <span class="inline-block px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-semibold">✓ Implemented</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits / USPs Section -->
    <section id="benefits" class="py-20 px-6">
        <div class="container mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Why Blink?</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Built for sustainable mobility</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto shadow-xl">
                        <span class="text-3xl">🌱</span>
                    </div>
                    <h3 class="text-xl font-semibold">100% Sustainable</h3>
                    <p class="text-gray-600 dark:text-gray-300">Electric vehicles only</p>
                </div>

                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto shadow-xl">
                        <span class="text-3xl">📊</span>
                    </div>
                    <h3 class="text-xl font-semibold">Total Control</h3>
                    <p class="text-gray-600 dark:text-gray-300">Real-time dashboard and analytics</p>
                </div>

                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto shadow-xl">
                        <span class="text-3xl">🗺️</span>
                    </div>
                    <h3 class="text-xl font-semibold">Smart Geofencing</h3>
                    <p class="text-gray-600 dark:text-gray-300">Automatic zones and restrictions</p>
                </div>

                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto shadow-xl">
                        <span class="text-3xl">⚡</span>
                    </div>
                    <h3 class="text-xl font-semibold">Battery Monitoring</h3>
                    <p class="text-gray-600 dark:text-gray-300">Real-time tracking with alerts</p>
                </div>

                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto shadow-xl">
                        <span class="text-3xl">🌍</span>
                    </div>
                    <h3 class="text-xl font-semibold">Multi-language</h3>
                    <p class="text-gray-600 dark:text-gray-300">Global expansion ready</p>
                </div>

                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto shadow-xl">
                        <span class="text-3xl">🔧</span>
                    </div>
                    <h3 class="text-xl font-semibold">Modular</h3>
                    <p class="text-gray-600 dark:text-gray-300">Pay only for features you need</p>
                </div>

                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto shadow-xl">
                        <span class="text-3xl">📱</span>
                    </div>
                    <h3 class="text-xl font-semibold">Multi-platform</h3>
                    <p class="text-gray-600 dark:text-gray-300">Web + Mobile applications</p>
                </div>

                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto shadow-xl">
                        <span class="text-3xl">🚀</span>
                    </div>
                    <h3 class="text-xl font-semibold">Infinitely Scalable</h3>
                    <p class="text-gray-600 dark:text-gray-300">From 10 to 10,000 vehicles</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Roadmap Section -->
    <section id="roadmap" class="py-20 px-6 bg-gray-50 dark:bg-gray-800/50">
        <div class="container mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Roadmap</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Our development journey</p>
            </div>

            <div class="max-w-4xl mx-auto">
                <!-- Phase 1 - Current -->
                <div class="relative pl-8 pb-12 border-l-2 border-emerald-500">
                    <div class="absolute -left-3 top-0 w-6 h-6 bg-emerald-500 rounded-full border-4 border-white dark:border-gray-900"></div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-emerald-600">Phase 1: Admin MVP</h3>
                            <span class="px-4 py-1.5 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-full text-sm font-semibold">✓ Current</span>
                        </div>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-emerald-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                User authentication and authorization
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-emerald-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Complete vehicle and user management
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-emerald-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Admin control panel
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-emerald-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Multi-language support
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Phase 2 - Next -->
                <div class="relative pl-8 pb-12 border-l-2 border-gray-300 dark:border-gray-600">
                    <div class="absolute -left-3 top-0 w-6 h-6 bg-gray-300 dark:bg-gray-600 rounded-full border-4 border-white dark:border-gray-900"></div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold">Phase 2: Operations</h3>
                            <span class="px-4 py-1.5 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 rounded-full text-sm font-semibold">🚧 In Progress</span>
                        </div>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Real-time dashboard with KPIs
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Booking system for vehicle reservations
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Interactive map with vehicle locations
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Geofencing and operational zones
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Ticket system for maintenance and support
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Phase 3 - Future -->
                <div class="relative pl-8">
                    <div class="absolute -left-3 top-0 w-6 h-6 bg-gray-200 dark:bg-gray-700 rounded-full border-4 border-white dark:border-gray-900"></div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold">Phase 3: End User Experience</h3>
                            <span class="px-4 py-1.5 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm font-semibold">📋 Planned</span>
                        </div>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Mobile app for end users
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Real-time vehicle availability map
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Integrated payment system
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Gamification and loyalty programs
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Advanced analytics and reporting
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Use Cases Section -->
    <section class="py-20 px-6">
        <div class="container mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Use Cases</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Perfect for different scenarios</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-emerald-50 to-emerald-50 dark:from-emerald-900/10 dark:to-emerald-900/10 rounded-xl p-6 border border-emerald-200 dark:border-emerald-800">
                    <div class="text-4xl mb-4">🛵</div>
                    <h3 class="text-xl font-semibold mb-2">Urban Motosharing</h3>
                    <p class="text-gray-600 dark:text-gray-300">Electric scooter sharing for cities</p>
                </div>

                <div class="bg-gradient-to-br from-emerald-50 to-emerald-50 dark:from-emerald-900/10 dark:to-emerald-900/10 rounded-xl p-6 border border-emerald-200 dark:border-emerald-800">
                    <div class="text-4xl mb-4">🚗</div>
                    <h3 class="text-xl font-semibold mb-2">Corporate Carsharing</h3>
                    <p class="text-gray-600 dark:text-gray-300">Business vehicle sharing</p>
                </div>

                <div class="bg-gradient-to-br from-emerald-50 to-emerald-50 dark:from-emerald-900/10 dark:to-emerald-900/10 rounded-xl p-6 border border-emerald-200 dark:border-emerald-800">
                    <div class="text-4xl mb-4">🚲</div>
                    <h3 class="text-xl font-semibold mb-2">Municipal Bikesharing</h3>
                    <p class="text-gray-600 dark:text-gray-300">City-wide electric bike programs</p>
                </div>

                <div class="bg-gradient-to-br from-emerald-50 to-emerald-50 dark:from-emerald-900/10 dark:to-emerald-900/10 rounded-xl p-6 border border-emerald-200 dark:border-emerald-800">
                    <div class="text-4xl mb-4">📦</div>
                    <h3 class="text-xl font-semibold mb-2">Sustainable Delivery</h3>
                    <p class="text-gray-600 dark:text-gray-300">Green delivery fleets</p>
                </div>

                <div class="bg-gradient-to-br from-emerald-50 to-emerald-50 dark:from-emerald-900/10 dark:to-emerald-900/10 rounded-xl p-6 border border-emerald-200 dark:border-emerald-800">
                    <div class="text-4xl mb-4">🎓</div>
                    <h3 class="text-xl font-semibold mb-2">Campus Mobility</h3>
                    <p class="text-gray-600 dark:text-gray-300">University transportation</p>
                </div>

                <div class="bg-gradient-to-br from-emerald-50 to-emerald-50 dark:from-emerald-900/10 dark:to-emerald-900/10 rounded-xl p-6 border border-emerald-200 dark:border-emerald-800">
                    <div class="text-4xl mb-4">🏢</div>
                    <h3 class="text-xl font-semibold mb-2">Fleet Operators</h3>
                    <p class="text-gray-600 dark:text-gray-300">Professional service providers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="py-20 px-6 bg-gradient-to-br from-emerald-600 to-emerald-600">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">Ready to Transform Your Fleet?</h2>
            <p class="text-xl text-emerald-100 mb-8 max-w-2xl mx-auto">Request a demo and discover how Blink optimizes your operations.</p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="mailto:contact@blink-mobility.com" class="inline-flex items-center justify-center px-8 py-4 bg-white text-emerald-600 rounded-lg hover:bg-gray-100 transition-all font-semibold shadow-xl text-lg">
                    Request Demo
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </a>
                <a href="/api/v1/auth/register" class="inline-flex items-center justify-center px-8 py-4 bg-transparent text-white border-2 border-white rounded-lg hover:bg-white hover:text-emerald-600 transition-all font-semibold text-lg">
                    Start Free Trial
                </a>
            </div>

            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-8 text-white">
                <div>
                    <div class="text-3xl font-bold mb-2">100+</div>
                    <div class="text-emerald-100">Vehicles Managed</div>
                </div>
                <div>
                    <div class="text-3xl font-bold mb-2">24/7</div>
                    <div class="text-emerald-100">Support Available</div>
                </div>
                <div>
                    <div class="text-3xl font-bold mb-2">3</div>
                    <div class="text-emerald-100">Languages Supported</div>
                </div>
                <div>
                    <div class="text-3xl font-bold mb-2">∞</div>
                    <div class="text-emerald-100">Scalability</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12 px-6">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <!-- Logo & Description -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-white">Blink</span>
                    </div>
                    <p class="text-gray-400 mb-4">Smart electric mobility platform for sustainable urban transportation. Manage your fleet with intelligence and efficiency.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Product -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Product</h3>
                    <ul class="space-y-2">
                        <li><a href="#features" class="hover:text-emerald-400 transition-colors">Features</a></li>
                        <li><a href="#benefits" class="hover:text-emerald-400 transition-colors">Benefits</a></li>
                        <li><a href="#roadmap" class="hover:text-emerald-400 transition-colors">Roadmap</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Pricing</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">About Us</a></li>
                        <li><a href="#contact" class="hover:text-emerald-400 transition-colors">Contact</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Careers</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">&copy; 2026 Blink. All rights reserved. | Electric Mobility Platform</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Smooth Scroll -->
    <script>
        // Wait for DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Carousel functionality
            const track = document.getElementById('carousel-track');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const indicators = document.querySelectorAll('.carousel-indicator');
            let currentSlide = 0;
            const totalSlides = 3;

            function updateCarousel() {
                track.style.transform = `translateX(-${currentSlide * 100}%)`;
                
                // Update indicators
                indicators.forEach((indicator, index) => {
                    if (index === currentSlide) {
                        indicator.classList.remove('bg-gray-300', 'dark:bg-gray-600');
                        indicator.classList.add('bg-emerald-600');
                    } else {
                        indicator.classList.remove('bg-emerald-600');
                        indicator.classList.add('bg-gray-300', 'dark:bg-gray-600');
                    }
                });
            }

            prevBtn.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                updateCarousel();
            });

            nextBtn.addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateCarousel();
            });

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    currentSlide = index;
                    updateCarousel();
                });
            });

            // Auto-advance carousel every 5 seconds
            setInterval(() => {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateCarousel();
            }, 5000);

            // Language selector functionality
            const langBtn = document.getElementById('lang-btn');
            const langDropdown = document.getElementById('lang-dropdown');
            const currentLangSpan = document.getElementById('current-lang');
            const langOptions = document.querySelectorAll('.lang-option');

            // Translation texts
            const translations = {
                ca: {
                    screenshots: 'Captures',
                    features: 'Funcionalitats',
                    benefits: 'Beneficis',
                    roadmap: 'Full de Ruta',
                    contact: 'Contacte',
                    login: 'Accedir',
                    getStarted: 'Començar',
                    sustainableMobility: '🌱 Mobilitat Urbana Sostenible',
                    heroTitle: 'Gestió Intel·ligent de Flotes per a ',
                    heroTitleHighlight: 'Vehicles Elèctrics',
                    heroDescription: 'Gestiona la teva flota de mobilitat elèctrica amb control i analítica en temps real.',
                    electric: 'Elèctric',
                    monitoring: 'Monitoratge',
                    scalable: 'Escalable',
                    requestDemo: 'Sol·licitar Demo',
                    learnMore: 'Saber Més',
                    // Screenshots section
                    screenshotsTitle: 'Veure Blink en Acció',
                    screenshotsDesc: 'Explora el nostre dashboard intuitiu i funcionalitats potents',
                    dashboardOverview: 'Vista General del Dashboard',
                    analyticsReports: 'Analítiques i Informes',
                    fleetMapView: 'Vista de Mapa de la Flota',
                    screenshotComingSoon: 'Captura de pantalla properament',
                    // Features section
                    featuresTitle: 'Funcionalitats Clau',
                    featuresDesc: 'Eines essencials per a la gestió de flotes',
                    authSystem: 'Sistema d\'Autenticació',
                    authDesc: 'Autenticació JWT segura amb gestió de rols',
                    vehicleManagement: 'Gestió de Vehicles',
                    vehicleDesc: 'CRUD complet i monitoratge de bateria en temps real',
                    userManagement: 'Gestió d\'Usuaris',
                    userDesc: 'CRUD d\'usuaris amb rols i permisos',
                    internationalization: 'Internacionalització',
                    i18nDesc: 'Suport multi-idioma',
                    userConfig: 'Configuració d\'Usuari',
                    userConfigDesc: 'Configuració i preferències personalitzables',
                    reusableComponents: 'Components Reutilitzables',
                    componentsDesc: 'Biblioteca de components per desenvolupament ràpid',
                    implemented: '✓ Implementat',
                    // Benefits section
                    benefitsTitle: 'Per què Blink?',
                    benefitsDesc: 'Construït per a mobilitat sostenible',
                    sustainable: '100% Sostenible',
                    sustainableDesc: 'Només vehicles elèctrics',
                    totalControl: 'Control Total',
                    controlDesc: 'Dashboard i analítiques en temps real',
                    smartGeofencing: 'Geofencing Intel·ligent',
                    geofencingDesc: 'Zones i restriccions automàtiques',
                    batteryMonitoring: 'Monitoratge de Bateria',
                    batteryDesc: 'Seguiment en temps real amb alertes',
                    multiLanguage: 'Multi-idioma',
                    multiLangDesc: 'Expansió global preparada',
                    modular: 'Modular',
                    modularDesc: 'Paga només per les funcions que necessites',
                    multiPlatform: 'Multi-plataforma',
                    platformDesc: 'Aplicacions web + mòbil',
                    infinitelyScalable: 'Infinitament Escalable',
                    scalableDesc: 'De 10 a 10.000 vehicles',
                    // Roadmap section
                    roadmapTitle: 'Full de Ruta',
                    roadmapDesc: 'El nostre viatge de desenvolupament',
                    phase1: 'Fase 1: MVP Admin',
                    current: '✓ Actual',
                    phase1Item1: 'Autenticació i autorització d\'usuaris',
                    phase1Item2: 'Gestió completa de vehicles i usuaris',
                    phase1Item3: 'Panell de control d\'administració',
                    phase1Item4: 'Suport multi-idioma',
                    phase2: 'Fase 2: Operacions',
                    inProgress: '🚧 En Progrés',
                    phase2Item1: 'Dashboard en temps real amb KPIs',
                    phase2Item2: 'Sistema de reserves de vehicles',
                    phase2Item3: 'Mapa interactiu amb ubicacions de vehicles',
                    phase2Item4: 'Geofencing i zones operatives',
                    phase2Item5: 'Sistema de tickets per manteniment i suport',
                    phase3: 'Fase 3: Experiència d\'Usuari Final',
                    planned: '📋 Planificat',
                    phase3Item1: 'Aplicació mòbil per usuaris finals',
                    phase3Item2: 'Mapa de disponibilitat de vehicles en temps real',
                    phase3Item3: 'Sistema de pagament integrat',
                    phase3Item4: 'Gamificació i programes de fidelització',
                    phase3Item5: 'Analítiques avançades i informes',
                    // Use Cases section
                    useCasesTitle: 'Casos d\'Ús',
                    useCasesDesc: 'Perfecte per diferents escenaris',
                    urbanMotosharing: 'Motosharing Urbà',
                    motosharingDesc: 'Compartició de scooters elèctrics per ciutats',
                    corporateCarsharing: 'Carsharing Corporatiu',
                    carsharingDesc: 'Compartició de vehicles empresarials',
                    municipalBikesharing: 'Bikesharing Municipal',
                    bikesharingDesc: 'Programes de bicicletes elèctriques municipals',
                    sustainableDelivery: 'Lliurament Sostenible',
                    deliveryDesc: 'Flotes de lliurament verdes',
                    campusMobility: 'Mobilitat en Campus',
                    campusDesc: 'Transport universitari',
                    fleetOperators: 'Operadors de Flotes',
                    operatorsDesc: 'Proveïdors de serveis professionals',
                    // CTA section
                    ctaTitle: 'Preparat per Transformar la Teva Flota?',
                    ctaDesc: 'Sol·licita una demo i descobreix com Blink optimitza les teves operacions.',
                    startFreeTrial: 'Començar Prova Gratuïta',
                    vehiclesManaged: 'Vehicles Gestionats',
                    supportAvailable: 'Suport Disponible',
                    languagesSupported: 'Idiomes Suportats',
                    scalability: 'Escalabilitat',
                    // Footer
                    footerDesc: 'Plataforma intel·ligent de mobilitat elèctrica per transport urbà sostenible. Gestiona la teva flota amb intel·ligència i eficiència.',
                    product: 'Producte',
                    pricing: 'Preus',
                    company: 'Empresa',
                    aboutUs: 'Sobre Nosaltres',
                    blog: 'Blog',
                    careers: 'Carreres',
                    allRightsReserved: 'Tots els drets reservats. | Plataforma de Mobilitat Elèctrica',
                    privacyPolicy: 'Política de Privacitat',
                    termsOfService: 'Termes de Servei',
                    cookiePolicy: 'Política de Cookies'
                },
                en: {
                    screenshots: 'Screenshots',
                    features: 'Features',
                    benefits: 'Benefits',
                    roadmap: 'Roadmap',
                    contact: 'Contact',
                    login: 'Login',
                    getStarted: 'Get Started',
                    sustainableMobility: '🌱 Sustainable Urban Mobility',
                    heroTitle: 'Smart Fleet Management for ',
                    heroTitleHighlight: 'Electric Vehicles',
                    heroDescription: 'Manage your electric mobility fleet with real-time control and analytics.',
                    electric: 'Electric',
                    monitoring: 'Monitoring',
                    scalable: 'Scalable',
                    requestDemo: 'Request Demo',
                    learnMore: 'Learn More',
                    // Screenshots section
                    screenshotsTitle: 'See Blink in Action',
                    screenshotsDesc: 'Explore our intuitive dashboard and powerful features',
                    dashboardOverview: 'Dashboard Overview',
                    analyticsReports: 'Analytics & Reports',
                    fleetMapView: 'Fleet Map View',
                    screenshotComingSoon: 'Screenshot coming soon',
                    // Features section
                    featuresTitle: 'Key Features',
                    featuresDesc: 'Essential tools for fleet management',
                    authSystem: 'Authentication System',
                    authDesc: 'Secure JWT authentication with role management',
                    vehicleManagement: 'Vehicle Management',
                    vehicleDesc: 'Complete CRUD and real-time battery monitoring',
                    userManagement: 'User Management',
                    userDesc: 'User CRUD with roles and permissions',
                    internationalization: 'Internationalization',
                    i18nDesc: 'Multi-language support',
                    userConfig: 'User Configuration',
                    userConfigDesc: 'Customizable settings and preferences',
                    reusableComponents: 'Reusable Components',
                    componentsDesc: 'Component library for rapid development',
                    implemented: '✓ Implemented',
                    // Benefits section
                    benefitsTitle: 'Why Blink?',
                    benefitsDesc: 'Built for sustainable mobility',
                    sustainable: '100% Sustainable',
                    sustainableDesc: 'Electric vehicles only',
                    totalControl: 'Total Control',
                    controlDesc: 'Real-time dashboard and analytics',
                    smartGeofencing: 'Smart Geofencing',
                    geofencingDesc: 'Automatic zones and restrictions',
                    batteryMonitoring: 'Battery Monitoring',
                    batteryDesc: 'Real-time tracking with alerts',
                    multiLanguage: 'Multi-language',
                    multiLangDesc: 'Global expansion ready',
                    modular: 'Modular',
                    modularDesc: 'Pay only for features you need',
                    multiPlatform: 'Multi-platform',
                    platformDesc: 'Web + Mobile applications',
                    infinitelyScalable: 'Infinitely Scalable',
                    scalableDesc: 'From 10 to 10,000 vehicles',
                    // Roadmap section
                    roadmapTitle: 'Roadmap',
                    roadmapDesc: 'Our development journey',
                    phase1: 'Phase 1: Admin MVP',
                    current: '✓ Current',
                    phase1Item1: 'User authentication and authorization',
                    phase1Item2: 'Complete vehicle and user management',
                    phase1Item3: 'Admin control panel',
                    phase1Item4: 'Multi-language support',
                    phase2: 'Phase 2: Operations',
                    inProgress: '🚧 In Progress',
                    phase2Item1: 'Real-time dashboard with KPIs',
                    phase2Item2: 'Booking system for vehicle reservations',
                    phase2Item3: 'Interactive map with vehicle locations',
                    phase2Item4: 'Geofencing and operational zones',
                    phase2Item5: 'Ticket system for maintenance and support',
                    phase3: 'Phase 3: End User Experience',
                    planned: '📋 Planned',
                    phase3Item1: 'Mobile app for end users',
                    phase3Item2: 'Real-time vehicle availability map',
                    phase3Item3: 'Integrated payment system',
                    phase3Item4: 'Gamification and loyalty programs',
                    phase3Item5: 'Advanced analytics and reporting',
                    // Use Cases section
                    useCasesTitle: 'Use Cases',
                    useCasesDesc: 'Perfect for different scenarios',
                    urbanMotosharing: 'Urban Motosharing',
                    motosharingDesc: 'Electric scooter sharing for cities',
                    corporateCarsharing: 'Corporate Carsharing',
                    carsharingDesc: 'Business vehicle sharing',
                    municipalBikesharing: 'Municipal Bikesharing',
                    bikesharingDesc: 'City-wide electric bike programs',
                    sustainableDelivery: 'Sustainable Delivery',
                    deliveryDesc: 'Green delivery fleets',
                    campusMobility: 'Campus Mobility',
                    campusDesc: 'University transportation',
                    fleetOperators: 'Fleet Operators',
                    operatorsDesc: 'Professional service providers',
                    // CTA section
                    ctaTitle: 'Ready to Transform Your Fleet?',
                    ctaDesc: 'Request a demo and discover how Blink optimizes your operations.',
                    startFreeTrial: 'Start Free Trial',
                    vehiclesManaged: 'Vehicles Managed',
                    supportAvailable: 'Support Available',
                    languagesSupported: 'Languages Supported',
                    scalability: 'Scalability',
                    // Footer
                    footerDesc: 'Smart electric mobility platform for sustainable urban transportation. Manage your fleet with intelligence and efficiency.',
                    product: 'Product',
                    pricing: 'Pricing',
                    company: 'Company',
                    aboutUs: 'About Us',
                    blog: 'Blog',
                    careers: 'Careers',
                    allRightsReserved: 'All rights reserved. | Electric Mobility Platform',
                    privacyPolicy: 'Privacy Policy',
                    termsOfService: 'Terms of Service',
                    cookiePolicy: 'Cookie Policy'
                }
            };

            function updateLanguage(lang) {
                const t = translations[lang];
                
                // Navigation
                document.querySelector('a[href="#screenshots"]').textContent = t.screenshots;
                document.querySelector('a[href="#features"]').textContent = t.features;
                document.querySelector('a[href="#benefits"]').textContent = t.benefits;
                document.querySelector('a[href="#roadmap"]').textContent = t.roadmap;
                document.querySelector('a[href="#contact"]').textContent = t.contact;
                document.querySelector('a[href="/api/v1/auth/login"]').textContent = t.login;
                
                // Hero section
                const sustainableSpan = document.querySelector('.text-emerald-700');
                if (sustainableSpan) sustainableSpan.textContent = t.sustainableMobility;
                
                const heroTitle = document.querySelector('h1');
                if (heroTitle) {
                    heroTitle.innerHTML = `${t.heroTitle}<span class="bg-gradient-to-r from-emerald-600 to-emerald-600 bg-clip-text text-transparent">${t.heroTitleHighlight}</span>`;
                }
                
                const heroDesc = document.querySelector('h1 + p');
                if (heroDesc) heroDesc.textContent = t.heroDescription;
                
                // Stats
                const stats = document.querySelectorAll('.text-sm.text-gray-600');
                if (stats.length >= 3) {
                    stats[0].textContent = t.electric;
                    stats[1].textContent = t.monitoring;
                    stats[2].textContent = t.scalable;
                }
                
                // CTA buttons
                const ctaButtons = document.querySelectorAll('.inline-flex.items-center.justify-center');
                if (ctaButtons[0]) {
                    ctaButtons[0].innerHTML = `${t.requestDemo}<svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>`;
                }
                if (ctaButtons[1]) ctaButtons[1].textContent = t.learnMore;
                
                // Get Started buttons
                document.querySelectorAll('a[href="#contact"]').forEach(btn => {
                    if (btn.classList.contains('bg-gradient-to-r') || btn.classList.contains('bg-white')) {
                        btn.textContent = t.getStarted;
                    }
                });
                
                // Screenshots section
                const screenshotsSection = document.getElementById('screenshots');
                if (screenshotsSection) {
                    const screenshotsH2 = screenshotsSection.querySelector('h2');
                    const screenshotsP = screenshotsSection.querySelector('p');
                    if (screenshotsH2) screenshotsH2.textContent = t.screenshotsTitle;
                    if (screenshotsP) screenshotsP.textContent = t.screenshotsDesc;
                    
                    const slidesTitles = screenshotsSection.querySelectorAll('h3');
                    const slidesDescs = screenshotsSection.querySelectorAll('.text-gray-600.dark\\:text-gray-300');
                    if (slidesTitles[0]) slidesTitles[0].textContent = t.dashboardOverview;
                    if (slidesTitles[1]) slidesTitles[1].textContent = t.analyticsReports;
                    if (slidesTitles[2]) slidesTitles[2].textContent = t.fleetMapView;
                    slidesDescs.forEach(desc => desc.textContent = t.screenshotComingSoon);
                }
                
                // Features section
                const featuresSection = document.getElementById('features');
                if (featuresSection) {
                    const featuresH2 = featuresSection.querySelector('h2');
                    const featuresP = featuresSection.querySelector('p');
                    if (featuresH2) featuresH2.textContent = t.featuresTitle;
                    if (featuresP) featuresP.textContent = t.featuresDesc;
                    
                    const featureCards = featuresSection.querySelectorAll('.bg-white.dark\\:bg-gray-800');
                    const featureTitles = [t.authSystem, t.vehicleManagement, t.userManagement, t.internationalization, t.userConfig, t.reusableComponents];
                    const featureDescs = [t.authDesc, t.vehicleDesc, t.userDesc, t.i18nDesc, t.userConfigDesc, t.componentsDesc];
                    
                    featureCards.forEach((card, i) => {
                        const title = card.querySelector('h3');
                        const desc = card.querySelector('p');
                        const badge = card.querySelector('span');
                        if (title) title.textContent = featureTitles[i];
                        if (desc) desc.textContent = featureDescs[i];
                        if (badge) badge.textContent = t.implemented;
                    });
                }
                
                // Benefits section
                const benefitsSection = document.getElementById('benefits');
                if (benefitsSection) {
                    const benefitsH2 = benefitsSection.querySelector('h2');
                    const benefitsP = benefitsSection.querySelector('p');
                    if (benefitsH2) benefitsH2.textContent = t.benefitsTitle;
                    if (benefitsP) benefitsP.textContent = t.benefitsDesc;
                    
                    const benefitCards = benefitsSection.querySelectorAll('.text-center.space-y-4');
                    const benefitTitles = [t.sustainable, t.totalControl, t.smartGeofencing, t.batteryMonitoring, t.multiLanguage, t.modular, t.multiPlatform, t.infinitelyScalable];
                    const benefitDescs = [t.sustainableDesc, t.controlDesc, t.geofencingDesc, t.batteryDesc, t.multiLangDesc, t.modularDesc, t.platformDesc, t.scalableDesc];
                    
                    benefitCards.forEach((card, i) => {
                        const title = card.querySelector('h3');
                        const desc = card.querySelector('p');
                        if (title && benefitTitles[i]) title.textContent = benefitTitles[i];
                        if (desc && benefitDescs[i]) desc.textContent = benefitDescs[i];
                    });
                }
                
                // Roadmap section
                const roadmapSection = document.getElementById('roadmap');
                if (roadmapSection) {
                    const roadmapH2 = roadmapSection.querySelector('h2');
                    const roadmapP = roadmapSection.querySelector('p');
                    if (roadmapH2) roadmapH2.textContent = t.roadmapTitle;
                    if (roadmapP) roadmapP.textContent = t.roadmapDesc;
                    
                    const phases = roadmapSection.querySelectorAll('.bg-white.dark\\:bg-gray-800');
                    if (phases[0]) {
                        const h3 = phases[0].querySelector('h3');
                        const badge = phases[0].querySelector('span');
                        const items = phases[0].querySelectorAll('li');
                        if (h3) h3.textContent = t.phase1;
                        if (badge) badge.textContent = t.current;
                        if (items[0]) items[0].textContent = t.phase1Item1;
                        if (items[1]) items[1].textContent = t.phase1Item2;
                        if (items[2]) items[2].textContent = t.phase1Item3;
                        if (items[3]) items[3].textContent = t.phase1Item4;
                    }
                    if (phases[1]) {
                        const h3 = phases[1].querySelector('h3');
                        const badge = phases[1].querySelector('span');
                        const items = phases[1].querySelectorAll('li');
                        if (h3) h3.textContent = t.phase2;
                        if (badge) badge.textContent = t.inProgress;
                        if (items[0]) items[0].textContent = t.phase2Item1;
                        if (items[1]) items[1].textContent = t.phase2Item2;
                        if (items[2]) items[2].textContent = t.phase2Item3;
                        if (items[3]) items[3].textContent = t.phase2Item4;
                        if (items[4]) items[4].textContent = t.phase2Item5;
                    }
                    if (phases[2]) {
                        const h3 = phases[2].querySelector('h3');
                        const badge = phases[2].querySelector('span');
                        const items = phases[2].querySelectorAll('li');
                        if (h3) h3.textContent = t.phase3;
                        if (badge) badge.textContent = t.planned;
                        if (items[0]) items[0].textContent = t.phase3Item1;
                        if (items[1]) items[1].textContent = t.phase3Item2;
                        if (items[2]) items[2].textContent = t.phase3Item3;
                        if (items[3]) items[3].textContent = t.phase3Item4;
                        if (items[4]) items[4].textContent = t.phase3Item5;
                    }
                }
                
                // Use Cases section - Find by searching for the title
                const allSections = document.querySelectorAll('section');
                allSections.forEach(section => {
                    const h2 = section.querySelector('h2');
                    if (h2 && (h2.textContent.includes('Use Cases') || h2.textContent.includes('Casos d\'Ús'))) {
                        h2.textContent = t.useCasesTitle;
                        const p = section.querySelector('p');
                        if (p) p.textContent = t.useCasesDesc;
                        
                        const useCaseCards = section.querySelectorAll('.bg-gradient-to-br');
                        const useCaseTitles = [t.urbanMotosharing, t.corporateCarsharing, t.municipalBikesharing, t.sustainableDelivery, t.campusMobility, t.fleetOperators];
                        const useCaseDescs = [t.motosharingDesc, t.carsharingDesc, t.bikesharingDesc, t.deliveryDesc, t.campusDesc, t.operatorsDesc];
                        
                        useCaseCards.forEach((card, i) => {
                            const title = card.querySelector('h3');
                            const desc = card.querySelector('p');
                            if (title) title.textContent = useCaseTitles[i];
                            if (desc) desc.textContent = useCaseDescs[i];
                        });
                    }
                });
                
                // CTA Section
                const ctaSection = document.getElementById('contact');
                if (ctaSection) {
                    const ctaH2 = ctaSection.querySelector('h2');
                    const ctaP = ctaSection.querySelector('p');
                    if (ctaH2) ctaH2.textContent = t.ctaTitle;
                    if (ctaP) ctaP.textContent = t.ctaDesc;
                    
                    const ctaBtns = ctaSection.querySelectorAll('a');
                    if (ctaBtns[0] && ctaBtns[0].textContent.includes('Demo')) ctaBtns[0].innerHTML = `${t.requestDemo}<svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>`;
                    if (ctaBtns[1]) ctaBtns[1].textContent = t.startFreeTrial;
                    
                    const statDivs = ctaSection.querySelectorAll('.text-emerald-100');
                    if (statDivs[0]) statDivs[0].textContent = t.vehiclesManaged;
                    if (statDivs[1]) statDivs[1].textContent = t.supportAvailable;
                    if (statDivs[2]) statDivs[2].textContent = t.languagesSupported;
                    if (statDivs[3]) statDivs[3].textContent = t.scalability;
                }
                
                // Footer
                const footer = document.querySelector('footer');
                if (footer) {
                    const footerP = footer.querySelector('p.text-gray-400');
                    if (footerP) footerP.textContent = t.footerDesc;
                    
                    const footerH3s = footer.querySelectorAll('h3');
                    if (footerH3s[0]) footerH3s[0].textContent = t.product;
                    if (footerH3s[1]) footerH3s[1].textContent = t.company;
                    
                    const footerLinks = footer.querySelectorAll('ul li a');
                    // Product links
                    if (footerLinks[0]) footerLinks[0].textContent = t.features;
                    if (footerLinks[1]) footerLinks[1].textContent = t.benefits;
                    if (footerLinks[2]) footerLinks[2].textContent = t.roadmap;
                    if (footerLinks[3]) footerLinks[3].textContent = t.pricing;
                    // Company links
                    if (footerLinks[4]) footerLinks[4].textContent = t.aboutUs;
                    if (footerLinks[5]) footerLinks[5].textContent = t.contact;
                    if (footerLinks[6]) footerLinks[6].textContent = t.blog;
                    if (footerLinks[7]) footerLinks[7].textContent = t.careers;
                    
                    const copyright = footer.querySelector('.text-gray-400.text-sm');
                    if (copyright) copyright.textContent = `© 2026 Blink. ${t.allRightsReserved}`;
                    
                    const policyLinks = footer.querySelectorAll('.flex.space-x-6 a');
                    if (policyLinks[0]) policyLinks[0].textContent = t.privacyPolicy;
                    if (policyLinks[1]) policyLinks[1].textContent = t.termsOfService;
                    if (policyLinks[2]) policyLinks[2].textContent = t.cookiePolicy;
                }
                
                // Update document language
                document.documentElement.lang = lang;
            }

            // Toggle dropdown
            langBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                langDropdown.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!langBtn.contains(e.target) && !langDropdown.contains(e.target)) {
                    langDropdown.classList.add('hidden');
                }
            });

            // Language selection
            langOptions.forEach(option => {
                option.addEventListener('click', () => {
                    const lang = option.getAttribute('data-lang');
                    currentLangSpan.textContent = lang.toUpperCase();
                    
                    // Save preference to localStorage
                    localStorage.setItem('preferred_language', lang);
                    
                    // Update language
                    updateLanguage(lang);
                    
                    // Close dropdown
                    langDropdown.classList.add('hidden');
                    
                    // Show notification
                    showLanguageNotification(lang);
                });
            });

            // Load saved language preference
            const savedLang = localStorage.getItem('preferred_language') || 'en';
            currentLangSpan.textContent = savedLang.toUpperCase();
            updateLanguage(savedLang);

            // Language change notification
            function showLanguageNotification(lang) {
                const langNames = { ca: 'Català', en: 'English' };
                const notification = document.createElement('div');
                notification.className = 'fixed bottom-8 right-8 bg-emerald-600 text-white px-6 py-3 rounded-lg shadow-xl z-50 animate-fade-in';
                notification.innerHTML = `
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="font-semibold">${langNames[lang]}</span>
                    </div>
                `;
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.style.opacity = '0';
                    notification.style.transform = 'translateY(20px)';
                    notification.style.transition = 'all 0.3s ease-out';
                    setTimeout(() => notification.remove(), 300);
                }, 2000);
            }
        });
    </script>
    
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }
    </style>
</body>
</html>
