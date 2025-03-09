<header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-6 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center mr-6">
            <a href="/" class="text-blue-600 font-bold text-3xl">Yonmedia</a>
        </div>

        <!-- Kategori Dropdown -->
        <div x-data="{ open: false }" class="relative inline-block">
            <button @click="open = !open" class="bg-white text-gray-700 border border-gray-300 px-6 py-2 rounded-md focus:outline-none">
                List Favorit
            </button>
            <div x-show="open" @click.away="open = false" class="absolute bg-white border border-gray-300 rounded-md mt-1 w-40 shadow-lg">
                <a href="/terlaris" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Buku Terlaris</a>
                <a href="/terbaru" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Buku Terbaru</a>
                <a href="/favorit" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Buku Favorit </a>
                <a href="/terbaru" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Semua Buku </a>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        

        <!-- Search Bar -->
        <div class="flex-grow  mx-4">
            <form action="/search" method="GET">
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-full"
                    placeholder="Cari Judul Buku, atau Penulis" name="s">
            </form>
        </div>

        <!-- Icons & Buttons -->
        <div class="flex items-center space-x-4">
            <button class="text-gray-700">
                <i class="fas fa-shopping-cart"></i> <!-- Bisa pakai icon font awesome -->
            </button>

            <!-- Masuk / Daftar -->
            @guest()
                <a href="/login"
                    class="text-black bg-white/40 border border-slate-300  hover:border-blue-700 px-4 py-2 rounded-md">
                    Masuk
                </a>
                <a href="/register" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md">
                    Daftar
                </a>
            @endguest
            @auth()
                <a href="/profile"
                    class="text-black bg-white/40 border border-slate-300  hover:border-blue-700 px-4 py-2 rounded-md">
                    <i class="bi bi-person text-lg"></i> Profile </a>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submitt"
                        class="text-white cursor-pointer bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header>
