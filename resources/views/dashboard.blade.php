<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tampilan Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("Selamat datang!") }}
                    </div>
    
                    <!-- Tombol Menuju Index Parkir -->
                    <div class="p-6 text-center">
                        <a href="{{ route('parkir') }}" class="btn btn-primary btn-lg">
                            🔍 Lihat Daftar Parkir
                        </a>
                    </div>
    
                </div>
            </div>
        </div>
    </x-app-layout>
    
</body>
</html>