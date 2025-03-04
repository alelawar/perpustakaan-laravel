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
    <x-navbar></x-navbar>
    <main class="py-10 px-20">
        {{ $slot }}
    </main>
    <x-footer></x-footer>
</body>

</html>
