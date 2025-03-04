<x-layouts.app title="Form Pendaftaran">
    <h1 class="text-xl font-bold">Form Pendaftaran</h1>
    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
            Daftar
        </button>
    </form>
</x-layouts.app>
