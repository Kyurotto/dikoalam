<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add New Product - Brew & Bean</title>

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
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="font-medium">Dashboard</span>
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

                        <a href="/products/create" class="flex items-center gap-3 px-4 py-3 bg-[#D4A574] text-white rounded-lg">
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
                        <a href="/order" class="flex items-center gap-3 px-4 py-3 hover:bg-[#4a3a3a] rounded-lg">
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
                        <a href="/products/create" class="flex items-center gap-3 px-4 py-3 bg-[#D4A574] rounded-lg">
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
                <div class="max-w-2xl mx-auto p-6">
                    <div class="bg-white dark:bg-[#2a2121] rounded-xl shadow-md border border-[#e3e3e0] dark:border-[#3a302a] p-6">
                        <h2 class="text-xl font-semibold text-[#3C2F2F] dark:text-[#f5ede4] mb-6">Add New Product</h2>

                        <form id="productForm" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-[#3C2F2F] dark:text-[#f5ede4] mb-2">Product Name</label>
                                <input type="text" id="productName" required class="w-full px-4 py-3 bg-[#F5EDE4] dark:bg-[#352a25] border border-[#e3e3e0] dark:border-[#3a302a] rounded-lg text-[#3C2F2F] dark:text-[#f5ede4]" placeholder="Enter product name">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-[#3C2F2F] dark:text-[#f5ede4] mb-2">Price ($)</label>
                                <input type="number" step="0.01" id="productPrice" required class="w-full px-4 py-3 bg-[#F5EDE4] dark:bg-[#352a25] border border-[#e3e3e0] dark:border-[#3a302a] rounded-lg text-[#3C2F2F] dark:text-[#f5ede4]" placeholder="0.00">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-[#3C2F2F] dark:text-[#f5ede4] mb-2">Category</label>
                                <select id="productCategory" class="w-full px-4 py-3 bg-[#F5EDE4] dark:bg-[#352a25] border border-[#e3e3e0] dark:border-[#3a302a] rounded-lg text-[#3C2F2F] dark:text-[#f5ede4]">
                                    <option value="coffee">Coffee</option>
                                    <option value="tea">Tea</option>
                                    <option value="food">Food</option>
                                    <option value="cold">Cold Drinks</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-[#3C2F2F] dark:text-[#f5ede4] mb-2">Emoji</label>
                                <div class="flex flex-wrap gap-2" id="emojiPicker">
                                    <button type="button" class="emoji-btn w-12 h-12 text-2xl bg-[#F5EDE4] dark:bg-[#352a25] rounded-lg hover:bg-[#D4A574] hover:text-white" data-emoji="☕">☕</button>
                                    <button type="button" class="emoji-btn w-12 h-12 text-2xl bg-[#F5EDE4] dark:bg-[#352a25] rounded-lg hover:bg-[#D4A574] hover:text-white" data-emoji="🍵">🍵</button>
                                    <button type="button" class="emoji-btn w-12 h-12 text-2xl bg-[#F5EDE4] dark:bg-[#352a25] rounded-lg hover:bg-[#D4A574] hover:text-white" data-emoji="🧊">🧊</button>
                                    <button type="button" class="emoji-btn w-12 h-12 text-2xl bg-[#F5EDE4] dark:bg-[#352a25] rounded-lg hover:bg-[#D4A574] hover:text-white" data-emoji="🥐">🥐</button>
                                    <button type="button" class="emoji-btn w-12 h-12 text-2xl bg-[#F5EDE4] dark:bg-[#352a25] rounded-lg hover:bg-[#D4A574] hover:text-white" data-emoji="🧁">🧁</button>
                                    <button type="button" class="emoji-btn w-12 h-12 text-2xl bg-[#F5EDE4] dark:bg-[#352a25] rounded-lg hover:bg-[#D4A574] hover:text-white" data-emoji="🥑">🥑</button>
                                    <button type="button" class="emoji-btn w-12 h-12 text-2xl bg-[#F5EDE4] dark:bg-[#352a25] rounded-lg hover:bg-[#D4A574] hover:text-white" data-emoji="🥯">🥯</button>
                                    <button type="button" class="emoji-btn w-12 h-12 text-2xl bg-[#F5EDE4] dark:bg-[#352a25] rounded-lg hover:bg-[#D4A574] hover:text-white" data-emoji="🍩">🍩</button>
                                    <button type="button" class="emoji-btn w-12 h-12 text-2xl bg-[#F5EDE4] dark:bg-[#352a25] rounded-lg hover:bg-[#D4A574] hover:text-white" data-emoji="🥤">🥤</button>
                                    <button type="button" class="emoji-btn w-12 h-12 text-2xl bg-[#F5EDE4] dark:bg-[#352a25] rounded-lg hover:bg-[#D4A574] hover:text-white" data-emoji="🍪">🍪</button>
                                    <button type="button" class="emoji-btn w-12 h-12 text-2xl bg-[#F5EDE4] dark:bg-[#352a25] rounded-lg hover:bg-[#D4A574] hover:text-white" data-emoji="🥪">🥪</button>
                                    <button type="button" class="emoji-btn w-12 h-12 text-2xl bg-[#F5EDE4] dark:bg-[#352a25] rounded-lg hover:bg-[#D4A574] hover:text-white" data-emoji="🧋">🧋</button>
                                </div>
                                <input type="hidden" id="selectedEmoji" value="☕">
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="w-full bg-[#3C2F2F] dark:bg-[#D4A574] text-white dark:text-[#3C2F2F] py-4 rounded-xl font-semibold text-lg hover:opacity-90 transition-opacity">
                                    Add Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>

        <script>
            let selectedEmoji = '☕';

            // Emoji picker
            document.querySelectorAll('.emoji-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.emoji-btn').forEach(b => {
                        b.classList.remove('bg-[#D4A574]', 'text-white');
                    });
                    this.classList.add('bg-[#D4A574]', 'text-white');
                    selectedEmoji = this.dataset.emoji;
                    document.getElementById('selectedEmoji').value = selectedEmoji;
                });
            });

            // Set default selected
            document.querySelector('[data-emoji="☕"]').classList.add('bg-[#D4A574]', 'text-white');

            // Form submission
            document.getElementById('productForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const name = document.getElementById('productName').value;
                const price = parseFloat(document.getElementById('productPrice').value);
                const category = document.getElementById('productCategory').value;
                const emoji = document.getElementById('selectedEmoji').value;

                alert(`Product added successfully!\n\nName: ${name}\nPrice: $${price.toFixed(2)}\nCategory: ${category}\nEmoji: ${emoji}`);

                // Reset form
                this.reset();
                selectedEmoji = '☕';
                document.getElementById('selectedEmoji').value = '☕';
                document.querySelectorAll('.emoji-btn').forEach(b => {
                    b.classList.remove('bg-[#D4A574]', 'text-white');
                });
                document.querySelector('[data-emoji="☕"]').classList.add('bg-[#D4A574]', 'text-white');
            });
        </script>
    </body>
</html>