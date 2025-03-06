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
    <div class="max-w-4xl w-full bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
        <!-- Banner/Image Section (Left Side or Top in mobile) -->
        <div class="bg-gradient-to-br from-blue-600 to-indigo-800 md:w-2/5 p-8 flex flex-col justify-center">
            <div class="text-center md:text-left">
                <h2 class="text-3xl font-bold text-white mb-3">Bergabung Sekarang</h2>
                <p class="text-blue-100 mb-6">Daftar dan nikmati akses ke berbagai fitur menarik dalam aplikasi kami.</p>
                <div class="hidden md:block">
                    <div class="flex items-center mb-4">
                        <i class="bi bi-check-circle-fill text-blue-200 mr-2"></i>
                        <span class="text-white">Akses seluruh fitur</span>
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="bi bi-check-circle-fill text-blue-200 mr-2"></i>
                        <span class="text-white">Pelayanan prioritas</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-check-circle-fill text-blue-200 mr-2"></i>
                        <span class="text-white">Pembaruan eksklusif</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section (Right Side or Bottom in mobile) -->
        <div class="md:w-3/5 p-8">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Buat Akun</h1>
                <p class="text-gray-500">Isi data diri Anda dengan benar</p>
            </div>

            <form action="/register" method="POST" x-data="{ 
                showPassword: false,
                validateUsername: function(e) {
                    if (e.target.value.includes(' ')) {
                        e.target.setCustomValidity('Username tidak boleh mengandung spasi');
                    } else {
                        e.target.setCustomValidity('');
                    }
                }
            }">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="nama" class="block text-gray-700 text-sm font-medium mb-1">Nama Lengkap</label>
                        <div class="relative">
                            <i class="bi bi-person absolute left-3 top-3 text-gray-400"></i>
                            <input type="text" id="nama" name="fullname" 
                                class="w-full pl-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 text-gray-800" 
                                placeholder="Masukkan nama lengkap" required>
                        </div>
                    </div>

                    <div>
                        <label for="username" class="block text-gray-700 text-sm font-medium mb-1">Username</label>
                        <div class="relative">
                            <i class="bi bi-at absolute left-3 top-3 text-gray-400"></i>
                            <input type="text" id="username" name="username" 
                                class="w-full pl-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 text-gray-800" 
                                placeholder="Masukkan username" required
                                x-on:input="validateUsername">
                            <div class="text-xs text-red-500 mt-1 hidden" x-show="username.validity.customError" x-text="username.validationMessage"></div>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-1">Email</label>
                        <div class="relative">
                            <i class="bi bi-envelope absolute left-3 top-3 text-gray-400"></i>
                            <input type="email" id="email" name="email" 
                                class="w-full pl-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 text-gray-800" 
                                placeholder="nama@example.com" required>
                        </div>
                    </div>

                    <div>
                        <label for="telepon" class="block text-gray-700 text-sm font-medium mb-1">No. Telepon</label>
                        <div class="relative">
                            <i class="bi bi-phone absolute left-3 top-3 text-gray-400"></i>
                            <input type="tel" id="telepon" name="telepon" 
                                class="w-full pl-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 text-gray-800" 
                                placeholder="0812xxxxxxxx" required>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-1">Password</label>
                        <div class="relative">
                            <i class="bi bi-lock absolute left-3 top-3 text-gray-400"></i>
                            <input 
                                :type="showPassword ? 'text' : 'password'" 
                                id="password" 
                                name="password" 
                                class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 text-gray-800" 
                                placeholder="Minimal 8 karakter" 
                                required 
                                minlength="8">
                            <button 
                                type="button" 
                                class="absolute right-3 top-3 text-gray-400 hover:text-gray-600" 
                                x-on:click="showPassword = !showPassword">
                                <i class="bi" :class="showPassword ? 'bi-eye-slash' : 'bi-eye'"></i>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="alamat" class="block text-gray-700 text-sm font-medium mb-1">Alamat</label>
                        <div class="relative">
                            <i class="bi bi-geo-alt absolute left-3 top-3 text-gray-400"></i>
                            <input type="text" id="alamat" name="alamat" 
                                class="w-full pl-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 text-gray-800" 
                                placeholder="Masukkan alamat lengkap" required>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-3 px-4 rounded-lg hover:from-blue-700 hover:to-indigo-800 transition-all font-medium flex items-center justify-center">
                        <i class="bi bi-person-plus mr-2"></i> Daftar Sekarang
                    </button>
                </div>
            </form>

            <p class="text-center text-gray-600 mt-6">
                Sudah punya akun? 
                <a href="/login" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                    Masuk di sini
                </a>
            </p>
        </div>
    </div>
</body>
</html>