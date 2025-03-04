@extends('layouts.app')

@section('title', 'Form Pendaftaran')

@section('header', "PPDB SMK HASYIM ASY'ARI")

@section('content')
    <div class="container mx-auto py-10">
        <header class="border-b border-black-500 text-center text-4xl font-bold mb-20">FORMULIR PENDAFTARAN PPDB <br> SMK HASYIM ASYARI</header>
        <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            
            @foreach ($fields as $field)
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">{{ $field['label'] }}</label>
                    
                    @if ($field['tipe'] === 'text')
                        <input type="text" name="{{ $field['name'] }}" class="w-full border-gray-300 rounded-md shadow-sm p-2" required>
                    @elseif ($field['tipe'] === 'email')
                        <input type="email" name="{{ $field['name'] }}" class="w-full border-gray-300 rounded-md shadow-sm p-2" required>
                    @elseif ($field['tipe'] === 'file')
                        <input type="file" name="{{ $field['name'] }}" class="w-full border-gray-300 rounded-md shadow-sm p-2">
                    @elseif ($field['tipe'] === 'select')
                        <select name="{{ $field['name'] }}" class="w-full border-gray-300 rounded-md shadow-sm p-2" required>
                            <option value="">-- Pilih {{ $field['label'] }} --</option>
                            @foreach ($field['options'] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            @endforeach

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Daftar</button>
        </form>
    </div>
@endsection
