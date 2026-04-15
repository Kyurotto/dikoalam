<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Dashboard - Brew & Bean</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-[#F5EDE4] dark:bg-[#1a1512] text-[#1b1b18] dark:text-[#f5ede4] min-h-screen">
        <div class="flex">
            <!-- Sidebar -->
            <aside class="w-64 bg-[#3C2F2F] dark:bg-[#2a2121] text-white min-h-screen fixed lg:relative hidden lg:block">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-8">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2 21h18v-2H2v2zm18-9v-4h-2v4h-2v-4h-2v4h-2v-4H8v4H6v-4H4v6a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4v-2z"/>
                        </svg>
                        <h1 class="text-lg font-semibold">Brew & Bean</h1>
                    </div>

                    <nav class="space-y-2">
                        <a href="/admin" class="flex items-center gap-3 px-4 py-3 bg-[#D4A574] text-white rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <span class="font-medium">Admin Dashboard</span>
                        </a>

                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="font-medium">Employee View</span>
                        </a>

                        <a href="/order" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="font-medium">New Order</span>
                        </a>

                        <a href="/menu" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <span class="font-medium">View Menu</span>
                        </a>

                        <a href="/products/create" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="font-medium">Add Product</span>
                        </a>

                        <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <span class="font-medium">Reports</span>
                        </a>
                    </nav>
                </div>

                <!-- User Section -->
                <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-[#4a3a3a]">
                    @auth
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-[#D4A574] rounded-full flex items-center justify-center">
                                <span class="font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <p class="font-medium text-sm">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-white/60">Admin</p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-[#4a3a3a] rounded-lg transition-colors">
                                Log Out
                            </button>
                        </form>
                    @endauth
                </div>
            </aside>

            <!-- Mobile Header -->
            <header class="lg:hidden fixed top-0 left-0 right-0 bg-[#3C2F2F] text-white px-4 py-3 z-50 shadow-lg">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2 21h18v-2H2v2zm18-9v-4h-2v4h-2v-4h-2v4h-2v-4H8v4H6v-4H4v6a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4v-2z"/>
                        </svg>
                        <span class="font-semibold">Brew & Bean</span>
                    </div>
                    <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </header>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="lg:hidden fixed inset-0 bg-[#3C2F2F] z-40 hidden">
                <div class="p-6 pt-16">
                    <button onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="absolute top-4 right-4 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <nav class="space-y-2">
                        <a href="/admin" class="flex items-center gap-3 px-4 py-3 bg-[#D4A574] rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <span class="font-medium">Admin Dashboard</span>
                        </a>
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="font-medium">Employee View</span>
                        </a>
                        <a href="/order" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="font-medium">New Order</span>
                        </a>
                        <a href="/menu" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <span class="font-medium">View Menu</span>
                        </a>
                        <a href="/products/create" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="font-medium">Add Product</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <span class="font-medium">Reports</span>
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <main class="flex-1 lg:ml-64 pt-16 lg:pt-0">
                <div class="max-w-7xl mx-auto p-6">
                    <h2 class="text-2xl font-semibold text-[#3C2F2F] dark:text-[#f5ede4] mb-6">Admin Dashboard</h2>

                    <!-- Admin Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white dark:bg-[#2a2121] rounded-xl p-6 shadow-md border border-[#e3e3e0] dark:border-[#3a302a]">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm text-[#706f6c] dark:text-[#a1a09a]">Total Products</span>
                                <div class="w-10 h-10 bg-[#D4A574] rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold">12</span>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-[#3C2F2F] dark:text-[#f5ede4]">12</p>
                        </div>

                        <div class="bg-white dark:bg-[#2a2121] rounded-xl p-6 shadow-md border border-[#e3e3e0] dark:border-[#3a302a]">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm text-[#706f6c] dark:text-[#a1a09a]">Total Orders</span>
                                <div class="w-10 h-10 bg-[#6F4E37] rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold">89</span>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-[#3C2F2F] dark:text-[#f5ede4]">89</p>
                        </div>

                        <div class="bg-white dark:bg-[#2a2121] rounded-xl p-6 shadow-md border border-[#e3e3e0] dark:border-[#3a302a]">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm text-[#706f6c] dark:text-[#a1a09a]">Total Employees</span>
                                <div class="w-10 h-10 bg-[#8B4513] rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold">3</span>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-[#3C2F2F] dark:text-[#f5ede4]">3</p>
                        </div>

                        <div class="bg-white dark:bg-[#2a2121] rounded-xl p-6 shadow-md border border-[#e3e3e0] dark:border-[#3a302a]">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm text-[#706f6c] dark:text-[#a1a09a]">Today's Revenue</span>
                                <div class="w-10 h-10 bg-[#A0522D] rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold">$</span>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-[#3C2F2F] dark:text-[#f5ede4]">$1,247</p>
                        </div>
                    </div>

                    <!-- Admin Actions -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <a href="/products/create" class="bg-white dark:bg-[#2a2121] rounded-xl p-6 shadow-md border border-[#e3e3e0] dark:border-[#3a302a] hover:border-[#D4A574] transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-[#D4A574] rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-[#3C2F2F] dark:text-[#f5ede4]">Add New Product</p>
                                    <p class="text-sm text-[#706f6c] dark:text-[#a1a09a]">Create a new menu item</p>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="bg-white dark:bg-[#2a2121] rounded-xl p-6 shadow-md border border-[#e3e3e0] dark:border-[#3a302a] hover:border-[#D4A574] transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-[#6F4E37] rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-[#3C2F2F] dark:text-[#f5ede4]">Manage Employees</p>
                                    <p class="text-sm text-[#706f6c] dark:text-[#a1a09a]">View and edit staff</p>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="bg-white dark:bg-[#2a2121] rounded-xl p-6 shadow-md border border-[#e3e3e0] dark:border-[#3a302a] hover:border-[#D4A574] transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-[#8B4513] rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-[#3C2F2F] dark:text-[#f5ede4]">View Reports</p>
                                    <p class="text-sm text-[#706f6c] dark:text-[#a1a09a]">Sales and analytics</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Recent Orders -->
                    <div class="bg-white dark:bg-[#2a2121] rounded-xl shadow-md border border-[#e3e3e0] dark:border-[#3a302a]">
                        <div class="px-6 py-4 border-b border-[#e3e3e0] dark:border-[#3a302a]">
                            <h3 class="text-lg font-semibold text-[#3C2F2F] dark:text-[#f5ede4]">Recent Orders</h3>
                        </div>
                        <div class="p-4">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between py-3 border-b border-[#e3e3e0] dark:border-[#3a302a]">
                                    <div>
                                        <p class="font-medium text-[#3C2F2F] dark:text-[#f5ede4]">Order #1247</p>
                                        <p class="text-sm text-[#706f6c] dark:text-[#a1a09a]">2 items - $12.50</p>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-full text-sm">Completed</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-[#e3e3e0] dark:border-[#3a302a]">
                                    <div>
                                        <p class="font-medium text-[#3C2F2F] dark:text-[#f5ede4]">Order #1246</p>
                                        <p class="text-sm text-[#706f6c] dark:text-[#a1a09a]">1 item - $5.50</p>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-full text-sm">Completed</span>
                                </div>
                                <div class="flex items-center justify-between py-3">
                                    <div>
                                        <p class="font-medium text-[#3C2F2F] dark:text-[#f5ede4]">Order #1245</p>
                                        <p class="text-sm text-[#706f6c] dark:text-[#a1a09a]">3 items - $18.00</p>
                                    </div>
                                    <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-700 dark:text-yellow-300 rounded-full text-sm">Preparing</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>