<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>{{ $title }}</title>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden">
        <!-- Header with gradient background -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-800 p-6 text-center">
            <h1 class="text-2xl font-bold text-white mb-1">Selamat Datang Kembali</h1>
            <p class="text-blue-100 text-sm">Silahkan masuk untuk melanjutkan</p>
        </div>

        <!-- Form section -->
        <div class="p-8">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg flex items-center" role="alert">
                    <i class="bi bi-check-circle-fill mr-2"></i>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            
            @if (session('failed'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg flex items-center" role="alert">
                    <i class="bi bi-exclamation-circle-fill mr-2"></i>
                    <p>{{ session('failed') }}</p>
                </div>
            @endif

            <form action="/login" method="POST" x-data="{ showPassword: false }">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-1">Email</label>
                    <div class="relative">
                        <i class="bi bi-envelope absolute left-3 top-3 text-gray-400"></i>
                        <input type="email" id="email" name="email"
                            class="w-full pl-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 text-gray-800"
                            placeholder="nama@example.com" required>
                    </div>
                </div>
                
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-gray-700 text-sm font-medium">Password</label>
                        <a href="#" class="text-xs text-blue-600 hover:text-blue-800 transition-colors">Lupa password?</a>
                    </div>
                    <div class="relative">
                        <i class="bi bi-lock absolute left-3 top-3 text-gray-400"></i>
                        <input 
                            :type="showPassword ? 'text' : 'password'" 
                            id="password" 
                            name="password"
                            class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 text-gray-800"
                            placeholder="Masukkan password" 
                            required>
                        <button 
                            type="button" 
                            class="absolute right-3 top-3 text-gray-400 hover:text-gray-600" 
                            x-on:click="showPassword = !showPassword">
                            <i class="bi" :class="showPassword ? 'bi-eye-slash' : 'bi-eye'"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" class="rounded text-blue-600 focus:ring-blue-500 mr-2 h-4 w-4" name="remember">
                        <span class="text-sm text-gray-600">Ingat saya</span>
                    </label>
                </div>

                <button name="login" type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-3 px-4 rounded-lg hover:from-blue-700 hover:to-indigo-800 transition-all font-medium flex items-center justify-center">
                    <i class="bi bi-box-arrow-in-right mr-2"></i>
                    Masuk
                </button>
            </form>

            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">atau</span>
                </div>
            </div>

          

            <p class="text-center text-gray-600">
                Belum punya akun? 
                <a href="/register" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                    Daftar sekarang
                </a>
            </p>
        </div>
    </div>
</body>
</html>