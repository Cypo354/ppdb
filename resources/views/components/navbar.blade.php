<nav class="sticky top-0 z-50 bg-cyan-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-16 w-16" src="{{ asset('img/logo.png') }}" alt="Logo">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-navlink :active="request()->routeIs('home')" href="{{ route('home') }}">
                            Home
                        </x-navlink>
                        <x-navlink :active="request()->routeIs('pendaftaran.create')" href="{{ route('pendaftaran.create') }}">
                            PPDB
                        </x-navlink>
                        <x-navlink :active="request()->routeIs('tentang-kami')" href="{{ route('tentang-kami') }}">
                            Tentang Kami
                        </x-navlink>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
