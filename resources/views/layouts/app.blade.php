<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="icon" type="image/png"  sizes="200x200" href="{{ asset('images/logoFondoNegro.jpeg') }}">
    <title>AiTri</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class=" bg-gray-100">
    <div class=" bg-gray-100">

        {{-- @php
        {{-- @php
            use App\Models\Notificacion;
            $notificaciones = Notificacion::where('visto', false)
                ->orderBy('created_at', 'desc')
                ->get()
                ->groupBy('descripcion')
                ->map(function ($group) {
                    return $group->first();
                });
        @endphp --}

        {{-- @include('layouts.navigation', ['notificaciones' => $notificaciones]) --}}
       
        {{-- @include('layouts.navigation', ['notificaciones' => $notificaciones]) --}}
       
        <!-- Page Heading -->
        {{-- @if (isset($header))
        {{-- @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif --}}
        

        <!-- Page Content -->
        <div class=" bg-gray-100">
            <div class="flex">
                <!-- Sidebar -->
                @include('layouts.sidebar')
                
                <!-- Contenido principal -->
                <div class="main-content">
                    <!-- Aquí va el contenido principal -->
                    {{ $slot }}
                </div>
            </div>
        </div>
    
        
    </div>

</body>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>