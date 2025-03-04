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

<body class="bg-slate-50/20">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-slate-50 p-8 rounded-lg shadow-lg w-[600px]">
            <a class="text-2xl font-bold mb-6 text-center block" href="/">Buat Akun</a>
            <form action="/register" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-medium">Nama Lengkap</label>
                        <input type="text" id="nama" name="fullname" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 font-medium">Username</label>
                        <input type="text" id="username" name="username" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium">Email</label>
                        <input type="email" id="email" name="email" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="telepon" class="block text-gray-700 font-medium">Telepon</label>
                        <input type="tel" id="telepon" name="telepon" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-medium">Password</label>
                        <input type="password" id="password" name="password" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block text-gray-700 font-medium">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                    </div>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Daftar Akun</button>
            </form>
            <p class="text-center text-gray-600 mt-4">Sudah punya akun? <a href="/login" class="text-blue-600 hover:underline">Login</a></p>
        </div>
    </div>
    
</body>
</html>