<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <title>New Order - Brew & Bean</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <style>
            .hide-scrollbar::-webkit-scrollbar { display: none; }
            .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        </style>
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
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="font-medium">Dashboard</span>
                        </a>

                        <a href="/order" class="flex items-center gap-3 px-4 py-3 bg-[#D4A574] text-white rounded-lg">
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
                                <p class="text-xs text-white/60">Employee</p>
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
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="font-medium">Dashboard</span>
                        </a>
                        <a href="/order" class="flex items-center gap-3 px-4 py-3 bg-[#D4A574] rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="font-medium">New Order</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg">
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
                <div class="p-4 lg:p-6 pb-28 lg:pb-6">
                    <!-- Search -->
                    <div class="mb-4">
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-[#706f6c]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" id="searchInput" placeholder="Search menu..." class="w-full pl-10 pr-4 py-3 bg-white dark:bg-[#2a2121] border border-[#e3e3e0] dark:border-[#3a302a] rounded-xl text-sm" oninput="filterMenu()">
                        </div>
                    </div>

                    <!-- Category Tabs -->
                    <div class="mb-4 overflow-x-auto hide-scrollbar">
                        <div class="flex gap-2" id="categoryTabs">
                            <button onclick="filterByCategory('all')" class="category-btn active px-4 py-2 bg-[#3C2F2F] text-white rounded-full text-sm font-medium whitespace-nowrap" data-category="all">All</button>
                            <button onclick="filterByCategory('coffee')" class="category-btn px-4 py-2 bg-white dark:bg-[#2a2121] border border-[#e3e3e0] dark:border-[#3a302a] rounded-full text-sm font-medium whitespace-nowrap" data-category="coffee">Coffee</button>
                            <button onclick="filterByCategory('tea')" class="category-btn px-4 py-2 bg-white dark:bg-[#2a2121] border border-[#e3e3e0] dark:border-[#3a302a] rounded-full text-sm font-medium whitespace-nowrap" data-category="tea">Tea</button>
                            <button onclick="filterByCategory('food')" class="category-btn px-4 py-2 bg-white dark:bg-[#2a2121] border border-[#e3e3e0] dark:border-[#3a302a] rounded-full text-sm font-medium whitespace-nowrap" data-category="food">Food</button>
                            <button onclick="filterByCategory('cold')" class="category-btn px-4 py-2 bg-white dark:bg-[#2a2121] border border-[#e3e3e0] dark:border-[#3a302a] rounded-full text-sm font-medium whitespace-nowrap" data-category="cold">Cold Drinks</button>
                        </div>
                    </div>

                    <!-- Menu Items -->
                    <div>
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3" id="menuGrid">
                            <!-- Items will be rendered by JS -->
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Floating Cart Summary -->
        <div class="fixed bottom-0 left-0 right-0 lg:left-64 bg-white dark:bg-[#2a2121] border-t border-[#e3e3e0] dark:border-[#3a302a] p-4 shadow-lg z-30">
            <button onclick="showOrderSummary()" class="w-full flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-[#D4A574] text-white w-10 h-10 rounded-full flex items-center justify-center font-semibold" id="cartCount">0</div>
                    <div class="text-left">
                        <p class="font-semibold text-[#3C2F2F] dark:text-[#f5ede4]">View Order</p>
                        <p class="text-sm text-[#706f6c] dark:text-[#a1a09a]">Tap to review</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-bold text-xl text-[#3C2F2F] dark:text-[#f5ede4]">$<span id="cartTotal">0.00</span></p>
                </div>
            </button>
        </div>

        <!-- Order Summary Modal -->
        <div id="orderModal" class="fixed inset-0 bg-black/50 z-50 hidden">
            <div class="absolute bottom-0 left-0 right-0 bg-white dark:bg-[#2a2121] rounded-t-2xl max-h-[80vh] flex flex-col">
                <div class="p-4 border-b border-[#e3e3e0] dark:border-[#3a302a]">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-[#3C2F2F] dark:text-[#f5ede4]">Order Summary</h2>
                        <button onclick="hideOrderSummary()" class="text-[#706f6c]">✕</button>
                    </div>
                </div>
                <div class="flex-1 overflow-y-auto p-4" id="orderItems">
                    <!-- Cart items will be rendered here -->
                </div>
                <div class="p-4 border-t border-[#e3e3e0] dark:border-[#3a302a]">
                    <div class="flex justify-between mb-4">
                        <span class="font-semibold text-[#3C2F2F] dark:text-[#f5ede4]">Total</span>
                        <span class="font-bold text-xl text-[#3C2F2F] dark:text-[#f5ede4]">$<span id="modalTotal">0.00</span></span>
                    </div>
                    <button onclick="submitOrder()" class="w-full bg-[#3C2F2F] dark:bg-[#f5ede4] text-white dark:text-[#3C2F2F] py-4 rounded-xl font-semibold text-lg">
                        Submit Order
                    </button>
                </div>
            </div>
        </div>

        <script>
            const menuItems = [
                { id: 1, name: 'Caramel Macchiato', price: 5.50, category: 'coffee', emoji: '☕' },
                { id: 2, name: 'Iced Americano', price: 4.00, category: 'cold', emoji: '🧊' },
                { id: 3, name: 'Matcha Latte', price: 5.00, category: 'tea', emoji: '🍵' },
                { id: 4, name: 'Croissant', price: 3.50, category: 'food', emoji: '🥐' },
                { id: 5, name: 'Espresso', price: 3.00, category: 'coffee', emoji: '☕' },
                { id: 6, name: 'Iced Latte', price: 4.50, category: 'cold', emoji: '🧊' },
                { id: 7, name: 'Chai Latte', price: 4.50, category: 'tea', emoji: '🍵' },
                { id: 8, name: 'Blueberry Muffin', price: 3.50, category: 'food', emoji: '🧁' },
                { id: 9, name: 'Cappuccino', price: 4.50, category: 'coffee', emoji: '☕' },
                { id: 10, name: 'Cold Brew', price: 4.50, category: 'cold', emoji: '🧊' },
                { id: 11, name: 'Green Tea', price: 3.00, category: 'tea', emoji: '🍵' },
                { id: 12, name: 'Avocado Toast', price: 8.00, category: 'food', emoji: '🥑' },
            ];

            let cart = [];

            function renderMenu(items = menuItems) {
                const grid = document.getElementById('menuGrid');
                grid.innerHTML = items.map(item => `
                    <button onclick="addToCart(${item.id})" class="bg-white dark:bg-[#2a2121] rounded-xl p-4 shadow-sm border border-[#e3e3e0] dark:border-[#3a302a] text-left">
                        <div class="text-3xl mb-2">${item.emoji}</div>
                        <p class="font-medium text-[#3C2F2F] dark:text-[#f5ede4] text-sm">${item.name}</p>
                        <p class="text-[#D4A574] font-semibold mt-1">$${item.price.toFixed(2)}</p>
                    </button>
                `).join('');
            }

            function filterMenu() {
                const query = document.getElementById('searchInput').value.toLowerCase();
                const filtered = menuItems.filter(item => item.name.toLowerCase().includes(query));
                renderMenu(filtered);
            }

            function filterByCategory(category) {
                document.querySelectorAll('.category-btn').forEach(btn => {
                    btn.classList.remove('bg-[#3C2F2F]', 'text-white');
                    btn.classList.add('bg-white', 'dark:bg-[#2a2121]', 'border', 'border-[#e3e3e0]', 'dark:border-[#3a302a]');
                });
                const activeBtn = document.querySelector(`[data-category="${category}"]`);
                activeBtn.classList.remove('bg-white', 'dark:bg-[#2a2121]', 'border', 'border-[#e3e3e0]', 'dark:border-[#3a302a]');
                activeBtn.classList.add('bg-[#3C2F2F]', 'text-white');

                const filtered = category === 'all' ? menuItems : menuItems.filter(item => item.category === category);
                renderMenu(filtered);
            }

            function addToCart(id) {
                const item = menuItems.find(i => i.id === id);
                const existing = cart.find(c => c.id === id);
                if (existing) {
                    existing.qty++;
                } else {
                    cart.push({ ...item, qty: 1 });
                }
                updateCartUI();
            }

            function removeFromCart(id) {
                const existing = cart.find(c => c.id === id);
                if (existing) {
                    existing.qty--;
                    if (existing.qty <= 0) {
                        cart = cart.filter(c => c.id !== id);
                    }
                }
                updateCartUI();
            }

            function updateCartUI() {
                const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
                const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);

                document.getElementById('cartCount').textContent = totalQty;
                document.getElementById('cartTotal').textContent = totalPrice.toFixed(2);
                document.getElementById('modalTotal').textContent = totalPrice.toFixed(2);

                const orderItems = document.getElementById('orderItems');
                if (cart.length === 0) {
                    orderItems.innerHTML = '<p class="text-center text-[#706f6c] py-8">No items in order</p>';
                } else {
                    orderItems.innerHTML = cart.map(item => `
                        <div class="flex items-center justify-between py-3 border-b border-[#e3e3e0] dark:border-[#3a302a]">
                            <div class="flex items-center gap-3">
                                <div class="text-2xl">${item.emoji}</div>
                                <div>
                                    <p class="font-medium text-[#3C2F2F] dark:text-[#f5ede4]">${item.name}</p>
                                    <p class="text-sm text-[#706f6c]">$${item.price.toFixed(2)} each</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <button onclick="removeFromCart(${item.id})" class="w-8 h-8 bg-[#F5EDE4] dark:bg-[#352a25] rounded-full text-[#3C2F2F] font-bold">-</button>
                                <span class="font-semibold text-[#3C2F2F] dark:text-[#f5ede4]">${item.qty}</span>
                                <button onclick="addToCart(${item.id})" class="w-8 h-8 bg-[#D4A574] rounded-full text-white font-bold">+</button>
                            </div>
                        </div>
                    `).join('');
                }
            }

            function showOrderSummary() {
                document.getElementById('orderModal').classList.remove('hidden');
            }

            function hideOrderSummary() {
                document.getElementById('orderModal').classList.add('hidden');
            }

            function submitOrder() {
                if (cart.length === 0) {
                    alert('Please add items to the order first!');
                    return;
                }
                alert('Order submitted successfully!');
                cart = [];
                updateCartUI();
                hideOrderSummary();
            }

            // Initialize
            renderMenu();
        </script>
    </body>
</html>