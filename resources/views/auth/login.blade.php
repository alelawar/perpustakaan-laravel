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
        <div class="bg-slate-50 p-8 rounded-lg shadow-lg w-96 ">
            <a class="text-2xl font-bold mb-6 text-center block" href="/">Login</a>
            @if (session('success'))
                <p class="text-sky-600 font-semibold text-center">{{ session('success') }}</p>
            @endif
            @if (session('failed'))
                <p class="text-red-600 font-semibold text-center">{{ session('failed') }}</p>
            @endif
            <form action="/login" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                </div>
                <button name="login" type="submit"
                    class="w-full bg-blue-600 font-semibold text-white py-2 rounded-lg hover:bg-blue-700 transition">Login</button>
            </form>
            <p class="text-center text-gray-600 mt-4">Belum punya akun? <a href="/register"
                    class="text-blue-600 hover:underline">Daftar</a></p>
        </div>
    </div>
</body>

</html>
