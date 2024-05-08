<x-app-layout>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Clients') }}
            </h2>
            <div onclick="abrirVentanaAgregarPaquete()" class="cursor-pointer flex items-center">
                <span class="mr-2">Agregar un nuevo cliente</span>
                <svg class="h-6 w-6 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action = "{{ route('clientes.update', $cliente) }} ">
                        @csrf @method('PUT')
                        <!--Bloque para Cédula-->
                        <label class="mt-1 p-1 ml-4 font-bold">Cédula:</label>
                        <input readonly type="text" name="cedula"
                            class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                            placeholder="{{ __('Ingrese la cédula') }}" value="{{ old('cedula', $cliente->cedula) }}">
                        @error('cedula')
                            <small class = "text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <!--Bloque para Nombres-->
                        <label class="mt-3 p-0 ml-4 font-bold">Nombres:</label>
                        <input type="text" name="nombres"
                            class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                            placeholder="{{ __('Ingrese los nombres') }}"
                            value="{{ old('nombres', $cliente->nombres) }}">
                        @error('nombres')
                            <small class = "text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <!--Bloque para Apellidos-->
                        <label class="mt-3 p-0 ml-4 font-bold">Apellidos:</label>
                        <input type="text" name="apellidos"
                            class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                            placeholder="{{ __('Ingrese los apellidos') }}"
                            value="{{ old('apellidos', $cliente->apellidos) }}">
                        @error('apellidos')
                            <small class = "text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <!--Bloque para Número Telefonico-->
                        <label class="mt-3 p-0 ml-4 font-bold">Número Telefónico:</label>
                        <input type="text" name="numTelefonico"
                            class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                            placeholder="{{ __('Ingrese el número telefónico') }}"
                            value="{{ old('numTelefonico', $cliente->numTelefonico) }}">
                        @error('numTelefonico')
                            <small class = "text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <!--Bloque para Fecha de nacimiento-->
                        <label class="mt-3 p-0 ml-4 font-bold">Fecha de Nacimiento:</label>
                        <input type="date" name="fecha_nacimiento"
                            class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                            placeholder="{{ __('Ingrese su Fecha de Nacimiento') }}"
                            value="{{ old('numTelefonico', $cliente->fecha_nacimiento) }}">
                        @error('fecha_nacimiento')
                            <small class = "text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <!--Bloque para Email-->
                        <label class="mt-3 p-0 ml-4 font-bold">Email:</label>
                        <input type="email" name="email"
                            class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                            placeholder="{{ __('Ingrese el correo electrónico') }}"
                            value="{{ old('email', $cliente->email) }}">
                        @error('email')
                            <small class = "text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <!--Bloque para Provincia-->
                        <label class="mt-1 p-0 ml-4 font-bold">Provincia:</label>
                        <select name="provincia"
                            class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                            placeholder="{{ __('Seleccione la provincia') }}">
                            <option value="" disabled selected>
                                {{ __('Seleccione la provincia') }}</option>
                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia }}"
                                    {{ old('provincia', $cliente->provincia) == $provincia ? 'selected' : '' }}>
                                    {{ $provincia }}
                                </option>
                            @endforeach
                        </select>
                        @error('provincia')
                            <small class = "text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <!--Bloque para Ciudad-->
                        <label class="mt-3 p-0 ml-4 font-bold">Ciudad:</label>
                        <input type="text" name="ciudad"
                            class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                            placeholder="{{ __('Ingrese la ciudad') }}" value="{{ old('ciudad', $cliente->ciudad) }}">
                        @error('ciudad')
                            <small class = "text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <x-primary-button class="mt-4">Actualizar Cliente</x-primary-button>
                        <x-input-error :messages="$errors->get('message')" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</x-app-layout>
