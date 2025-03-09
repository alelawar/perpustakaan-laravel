<header class="flex items-center justify-between p-5 bg-slate-50 rounded-xl">
    <h2 class="text-2xl font-semibold">Welcome, {{ auth()->user()->fullname }}</h2>

    <!-- Hamburger Menu -->
    <div class="relative">
        <button @click="open = !open" class="focus:outline-none cursor-pointer">
            <i class="bi bi-list text-3xl"></i>
        </button>

        <!-- Dropdown Menu -->
        <div x-show="open" @click.away="open = false"
            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20" x-transition>
            <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
            <a href="/profile/wishlist" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Disimpan</a>
            @can('admin')
            <a href="/dashboard" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Dashboard</a>
            <a href="/category" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Category</a>  
            <a href="/pinjam" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Data Pinjaman</a>  
            @endcan
        </div>
    </div>
</header>