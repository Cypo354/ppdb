<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'PPDB')</title>
  
  @vite('resources/css/app.css')
  <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link href="/src/styles.css" rel="stylesheet">

  
</head>

<body class="h-full">
  <div class="min-h-full">
    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Header --}}
    <header class="bg-blue-500 text-white p-4">
      <h1>@yield('header', 'Judul Default')</h1>
    </header>

    {{-- Konten utama --}}
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        @yield('content')
      </div>
    </main>
  </div>
</body>
</html>
