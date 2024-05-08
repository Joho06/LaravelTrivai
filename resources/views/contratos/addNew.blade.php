<x-app-layout>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Contractos') }}
            </h2>
            <div onclick="abrirVentanaAgregarContrato()" class="cursor-pointer flex items-center">
                <span class="mr-2">Agregar un nuevo contrato</span>
                <svg class="h-6 w-6 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </div>
        </div>
    </x-slot>

    <?php
    $nombres = $email = $apellidos = $ciudad = $provincia = $ubicacionSala = $cedula = $contrato = $formasPago = $pagareText = $montoCuotaPagare = '';
    $aniosContrato = $montoContrato = $numCuotas = $valor_pagare = 0;
    $bonoQory = $bonoQoryInt = $pagareBoolean = $otroFormaPagoBoolean = $contienePagare = $tarjertaCredito = $contieneCreditoDirecto = false;
    date_default_timezone_set('America/Guayaquil');
    $fechaActual = $fechaVencimiento = $fechaInicioCredDir = date('Y-m-d');
    ?>


    <div class="py-8">
        <div id="idAgregarContrato" class="max-w mx-auto sm:px-6 lg:px-20 mb-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('contrato.store') }}" method="POST" class="p-4">

                        @csrf
                        <!-- Hidden -->
                        <input type="hidden" id="usuario_previo" name="usuario_previo" value={{ $cliente->id }}>
                        <input type="hidden" id="formas_pago" name="formas_pago">
                        <input type="hidden" id="pagare_monto_info" name="pagare_monto_info">
                        <input type="hidden" id="pagare_fecha_info" name="pagare_fecha_info">
                        <input type="hidden" id="contiene_pagare" name="contiene_pagare">
                        <input type="hidden" id="contiene_credito_directo" name="contiene_credito_directo">
                        <input type="hidden" id="cred_dir_fecha_inicio" name="cred_dir_fecha_inicio">
                        <input type="hidden" id="cred_dir_num_cuotas" name="cred_dir_num_cuotas">
                        <input type="hidden" id="cred_dir_valor" name="cred_dir_valor">
                        <input type="hidden" id="cred_dir_abono" name="cred_dir_abono">
                        <!-- Nombres -->
                        <input type="hidden" id="nombres" name="nombres" value="{{ $cliente->nombres }}"
                            class="border rounded-md px-3 py-2 w-full" readonly="readonly">
                        <!-- Apellidos -->
                        <input type="hidden" id="apellidos" name="apellidos" value="{{ $cliente->apellidos }}"
                            class="border rounded-md px-3 py-2 w-full " readonly="readonly">
                        <!-- Cédula -->
                        <input type="hidden" id="cedula" name="cedula" value="{{ $cliente->cedula }}"
                            class="border rounded-md px-3 py-2 w-full" readonly="readonly">
                        <!-- Email -->
                        <input type="hidden" id="email" name="email" value="{{ $cliente->email }}"
                            class="border rounded-md px-3 py-2 w-full" readonly="readonly">
                        <!-- Ciudad -->
                        <input type="hidden" id="ciudad" name="ciudad" value="{{ $cliente->ciudad }}"
                            class="border rounded-md px-3 py-2 w-full" readonly="readonly">
                        <!-- Provincia -->
                        <input type="hidden" id="provincia" name="provincia" value="{{ $cliente->provincia }}"
                            class="border rounded-md px-3 py-2 w-full" readonly="readonly">


                        <!-- Ubicacion de la sala -->

                        <label for="ubicacion_sala" class="mt-0.5 p-0 ml-4 font-bold">Ubicación de la sala</label>
                        <input type="text" id="ubicacion_sala" name="ubicacion_sala"
                            value="{{ old('ubicacion_sala') }}"
                            class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50">
                        @error('ubicacion_sala')
                            <small class = "text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <!-- Años del contrato -->

                        <label for="anios_contrato" class="mt-3 p-0 ml-4 font-bold">Años del contrato</label>
                        <input type="number" id="anios_contrato" name="anios_contrato"
                            value="{{ old('anios_contrato') }}"
                            class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50">
                        @error('anios_contrato')
                            <small class = "text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror

                        <!-- Monto del contrato -->

                        <label for="monto_contrato" class="mt-3 p-0 ml-4 font-bold">Monto del contrato</label>
                        <input type="number" id="monto_contrato" name="monto_contrato"
                            value="{{ old('monto_contrato') }}"
                            class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50">
                        @error('monto_contrato')
                            <small class = "text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror

                        <label class="mt-1 p- ml-4 font-bold"">Forma de pago:</label>
                        <!-- Forma de pago (añadir más de una) -->
                        <div class="mt-2 mb-2 ml-8">

                            <div class="mt-2 italic">
                                <input type="checkbox" name="forma_pago" value="{{ $pagareBoolean }}"
                                    id="pagareCheckbox" class="mr-2"> Pagaré
                            </div>

                            <div id="divPagareCheckbox" class="hidden mt-1 mb-4">
                                <label for="valor" class="mr-2 mt-1 p-0 ml-4 font-bold">Valor:</label>
                                <input type="number" id="valor_pagare" name="valor_pagare"
                                    placeholder="Ingrese el valor" class="border rounded-md px-3 py-2 mr-2">
                                <label for="fechaPago" class="mr-2 mt-1 p-0 ml-4 font-bold">Fecha de Pago:</label>
                                <input type="date" id="fecha_pago_pagare" name="fechaPago"
                                    class="border rounded-md px-3 py-2 mr-2">
                                <button onclick="functionAgregarPagare()"
                                    class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">+</button>
                            </div>

                            <div class="mt-2 italic">
                                <input type="checkbox" value="{{ $pagareBoolean }}" id="creditoDirectoCheckbox"
                                    class="mr-2">
                                Crédito Directo
                            </div>
                            <div id="divCreditoDirectoCheckBox" class="hidden mt-1 mb-4">
                                <label for="montoCredDir" class="mr-2 mt-1 p-0 ml-4 font-bold">Valor:</label>
                                <input type="number" id="monto_credito_directo" name="montoCredDir"
                                    placeholder="Valor" class="border rounded-md px-3 py-2 mr-2 w-15">
                                <label for="abonoCredDir" class="mr-2 mt-1 p-0 ml-4 font-bold">Abono:</label>
                                <input type="number" id="abono_credito_directo" name="abonoCredDir"
                                    placeholder="Abono" class="border rounded-md px-3 py-2 mr-2 w-15">
                                <label for="mesesCredDir" class="mr-2 mt-1 p-0 ml-4 font-bold py-2"># Meses: </label>
                                <select id="meses_credito_directo" name="mesesCredDir"
                                    class="border rounded-md px-3 py-2 mr-2 w-20">
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                </select>
                                <label for="fechaInicioCredDir" class="mr-2 mt-1 p-0 ml-4 font-bold">Fecha de
                                    Inicio:</label>
                                <input type="date" id="fecha_inicio_cred_dir" name="fechaInicioCredDir"
                                    class="border rounded-md px-3 py-2 mr-2">
                                <button onclick="functionAgregarCreditoDirecto()"
                                    class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">+</button>
                            </div>

                            <div class="mt-2 italic">
                                <input type="checkbox" value="{{ $otroFormaPagoBoolean }}" id="otroCheckbox"
                                    class="mr-2 "> Tarjeta de débito
                            </div>
                            <div id="divOtrosCheckbox" class="hidden mt-1 mb-4">
                                <label for="monto" class="mr-2 mt-1 p-0 ml-4 font-bold">Valor:</label>
                                <input type="number" id="monto_forma_pago" name="monto_forma_pago"
                                    placeholder="Ingrese el valor" class="border rounded-md px-3 py-2 mr-2 w-15">
                                <label for="formaPago" class="mr-2 mt-1 p-0 ml-4 font-bold">Forma:</label>
                                <input type="text" id="forma_pago" name="forma_pago"
                                    class="border rounded-md px-3 py-2 mr-2 w-1/2">
                                <button onclick="functionAgregar()"
                                    class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">+</button>
                            </div>
                            {{-- tarjeta d credito --}}
                            <div class="mt-2 italic">
                                <input type="checkbox" value="{{ $tarjertaCredito }}" id="tarjetaCreditoCheckbox"
                                    class="mr-2 "> Tarjeta de crédito
                            </div>
                            <div id="tarjetaCreditoCheck" class="hidden mt-1 mb-4">
                                <label for="monto" class="mr-2 mt-1 p-0 ml-4 font-bold">Valor:</label>
                                <input type="number" id="monto" name="monto" placeholder="Ingrese el valor"
                                    class="border rounded-md px-3 py-2 mr-2 w-15">
                                {{-- tarjeta --}}
                                <label for="formaPago" class="mr-2 mt-1 p-0 ml-4 font-bold">Tarjeta:</label>
                                <select id="formaPago" name="formaPago"
                                    class="border rounded-md px-3 py-2 mr-2 w-20">
                                    <option value="Visa">Visa</option>
                                    <option value="MasterCard">MasterCard</option>
                                    <option value="DinnersClub">Dinners Club</option>
                                </select>
                                {{-- banco --}}
                                <label for="banco" class="mr-2 mt-1 p-0 ml-4 font-bold">Banco:</label>
                                <input type="text" id="banco" name="banco" placeholder="Ingrese el banco"
                                    class="border rounded-md px-3 py-2 mr-2 w-15">
                                {{-- meses de diferimiento --}}
                                <label for="mesesCredDir" class="mr-2 mt-1 p-0 ml-4 font-bold py-2"># Meses: </label>
                                <select id="meses_credito" name="mesesCredDir"
                                    class="border rounded-md px-3 py-2 mr-2 w-20">
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                </select>
                                <button onclick="functionAgregarTC()"
                                    class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">+</button>
                            </div>

                        </div>
                        <ul id="listaFormasPagoUl"></ul>

                        <!-- Bono hospedaje Qory Loyalty -->
                        <div class="mb-2">
                            <label class="inline-flex items-center mt-1 p-0  font-bold">Bono hospedaje Qory
                                Loyalty</label>
                            <input type="checkbox" name="bono_hospedaje" id="bono_hospedaje_checkbox">
                        </div>
                        @error('bono_hospedaje')
                            <small class="text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <!-- Bono de hospedaje internacional Qory Loyalty -->
                        <div class="mb-2">
                            <label class="inline-flex items-center mt-1 p-0 font-bold">Certificado
                                Vacacional</label>
                            <input type="checkbox" name="bono_hospedaje_internacional"
                                id="bono_hospedaje_internacional_checkbox" class="ml-2">
                        </div>
                        @error('bono_hospedaje_internacional')
                            <small class="text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <!-- Bono de hospedaje internacional Qory Loyalty -->
                        <div class="mb-2">
                            <label class="inline-flex items-center mt-1 p-0 font-bold">
                                Bono Vacacional Internacional
                            </label>
                            <input type="checkbox" name="bono_certificado_vacacional_internacional"
                                id="bono_certificado_vacacional_internacional_checkbox" class="ml-2"
                                onchange="toggleVisibility()">
                        </div>
                        @error('bono_certificado_vacacional_internacional')
                            <small class="text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <!-- Bono de hospedaje internacional Qory Loyalty -->
                        <div class="mb-2 flex ">
                            <div class = "flex">
                                <label class="inline-flex items-center mt-1 p-0 font-bold">Bono de Semana
                                    Internacional</label>
                                <input type="checkbox" name="bono_semana_internacional"
                                    id="bono_semana_internacional_checkbox" class="ml-3 mt-2"
                                    onchange="toggleVisibility()">

                            </div>
                            <div id = "destino_personas_internacional" style = "display:none">
                                <!-- Agregado margen a la derecha -->
                                <div class="flex ml-10"> <!-- Agregado margen a la izquierda -->
                                    <label class="inline-flex items-center mt-1 p-0 font-bold">Destino: </label>
                                    <input type="text" name="lugar_bono_semana_internacional"
                                        id="lugar_bono_semana_internacional" class="ml-2">
                                </div>
                                @error('lugar_bono_semana_internacional')
                                    <small class="text-red-500 ml-2">{{ $message }}</small>
                                    <br>
                                @enderror
                                <div class="flex ml-10">
                                    <label class="inline-flex items-center mt-1 p-0 font-bold"># Personas: </label>
                                    <input type="text" name="personas_bono_semana_internacional"
                                        id="personas_bono_semana_internacional"
                                        value="{{ old('personas_bono_semana_internacional') }}" class="ml-2">
                                </div>
                                @error('personas_bono_semana_internacional')
                                    <small class="text-red-500 ml-2">{{ $message }}</small>
                                    <br>
                                @enderror
                            </div>

                        </div>
                        @error('bono_semana_internacional')
                            <small class="text-red-500 ml-2">{{ $message }}</small>
                            <br>
                        @enderror
                        <!-- Aquí está el botón para ejecutar el código -->
                        <button type="submit"
                            class="mt-4 bg-gray-800 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded shadow-md transition duration-300 ease-in-out">Generar
                            Contrato</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    <script>
        if (document.getElementById("bono_semana_internacional_checkbox").checked) {
            document.getElementById("bono_semana_internacional").value = true;
        }
        if (document.getElementById("bono_certificado_vacacional_internacional_checkbox").checked) {
            document.getElementById("bono_certificado_vacacional_internacional").value = true;
        }
        if (document.getElementById("bono_hospedaje_internacional_checkbox").checked) {
            document.getElementById("bono_hospedaje_internacional").value = true;
        }
        if (document.getElementById("bono_hospedaje_checkbox").checkek) {
            document.getElementById("bono_hospedaje").value = true;
        }

        function toggleVisibility() {
            var bono_hospedaje_checkbox = document.getElementById("bono_certificado_vacacional_internacional_checkbox");
            var bono_semana_internacional_checkbox = document.getElementById("bono_semana_internacional_checkbox");
            var bono_semana_internacional_div = document.getElementById("destino_personas_internacional");

            if (bono_hospedaje_checkbox.checked || bono_semana_internacional_checkbox.checked) {
                bono_semana_internacional_div.style.display = "flex";
            } else {
                bono_semana_internacional_div.style.display = "none";
            }
        }
        var listaFormasPago = [];
        var pagareBoolean = false;
        var creditoDirectoBoolean = false;

        function functionAgregar() {
            event.preventDefault();
            const valor = document.getElementById("monto_forma_pago");
            const forma = document.getElementById("forma_pago");
            const formaValue = forma.value;
            const valorValue = valor.value;
            if (valorValue === "" || formaValue === "") {
                alert("Por favor, complete todos los campos antes de agregar una forma de pago.");
            } else {
                var cadena = "$" + valorValue + " con " + formaValue + "." + " (Tarjeta de débito) ";
                listaFormasPago.push(cadena);
                valor.value = "";
                forma.value = "";
                document.getElementById("formas_pago").value = JSON.stringify(listaFormasPago);
                alert("Se agregó: " + cadena);
            }
        }

        function functionAgregarTC() {
            event.preventDefault();
            const valor = document.getElementById("monto");
            const forma = document.getElementById("formaPago");
            const banco = document.getElementById("banco");
            const meses = document.getElementById("meses_credito");
            const valorValue = valor.value;
            const formaValue = forma.value;
            const bancoValue = banco.value;
            const mesesValue = meses.value;

            if (valorValue === "" || formaValue === "" || bancoValue === "" || mesesValue === "") {
                alert("Por favor, complete todos los campos antes de agregar una forma de pago.");
            } else {
                var cadena =
                    "$" + valorValue + " con " + formaValue + " del banco " + bancoValue +
                    " a " + mesesValue + " meses." + " (Tarjeta de crédito) ";

                listaFormasPago.push(cadena);
                valor.value = "";
                forma.value = "";
                banco.value = "";
                meses.value = "";
                document.getElementById("formas_pago").value = JSON.stringify(listaFormasPago);
                alert("Se agregó: " + cadena);
            }
        }


        function functionAgregarPagare() {
            if (pagareBoolean == true || creditoDirectoBoolean == true) {
                alert("Ya se agrego un Pagaré previamente");
            } else {
                event.preventDefault();
                const valor = document.getElementById("valor_pagare");
                const fecha = document.getElementById("fecha_pago_pagare");
                const valorValue = valor.value;
                const fechaValue = fecha.value;
                if (valorValue === "" || fechaValue === "") {
                    alert("Por favor, complete todos los campos antes de agregar el Pagaré.");
                } else {
                    ;
                    document.getElementById("pagare_monto_info").value = JSON.stringify(valorValue);
                    document.getElementById("pagare_fecha_info").value = JSON.stringify(fechaValue);
                    var cadena = "$" + valorValue + " con Pagaré Fecha: " + fechaValue;
                    listaFormasPago.push(cadena);
                    valor.value = "";
                    fecha.value = "";

                    document.getElementById("formas_pago").value = JSON.stringify(listaFormasPago);
                    document.getElementById("contiene_pagare").value = "true";
                    pagareBoolean = true;
                    alert("Se agregó: " + cadena);
                }
            }

        }

        function functionAgregarCreditoDirecto() {
            event.preventDefault();

            if (pagareBoolean == true || creditoDirectoBoolean == true) {
                alert("Ya se ha agregado otra forma de pago");
            } else {
                const creditoDirectoValor = document.getElementById("monto_credito_directo");
                const creditoDirectoFecha = document.getElementById("fecha_inicio_cred_dir");
                const creditoDirectoNumCuotas = document.getElementById("meses_credito_directo");
                const creditoDirectoAbono = document.getElementById("abono_credito_directo");
                const CDValor = creditoDirectoValor.value;
                const CDFechaIni = creditoDirectoFecha.value;
                const CDNumCuotas = creditoDirectoNumCuotas.value;
                const CDAbono = creditoDirectoAbono.value;
                if (CDValor == "" || CDFechaIni == "" || CDNumCuotas == "") {
                    alert("Por favor complete todos los campos del Credito Directo");
                } else {
                    document.getElementById("cred_dir_fecha_inicio").value = JSON.stringify(CDFechaIni);
                    document.getElementById("cred_dir_num_cuotas").value = JSON.stringify(CDNumCuotas);
                    document.getElementById("cred_dir_valor").value = JSON.stringify(CDValor);
                    document.getElementById("cred_dir_abono").value = JSON.stringify(CDAbono);
                    listaFormasPago.push("Se inserto un Credito Directo");
                    document.getElementById("contiene_credito_directo").value = "true";
                    document.getElementById("formas_pago").value = JSON.stringify(listaFormasPago);
                    creditoDirectoValor.value = "";
                    creditoDirectoFecha.value = "";
                    creditoDirectoNumCuotas.value = "";
                    creditoDirectoAbono.value = "";
                    alert("Se agrego un Credito Directo");
                    creditoDirectoBoolean = true;
                }
            }
        }

        function abrirVentanaAgregarContrato() {
            var VentanaAgregarContrato = document.getElementById("idAgregarContrato");
            if (VentanaAgregarContrato.style.display === 'none') {
                VentanaAgregarContrato.style.display = 'block';
            } else {
                VentanaAgregarContrato.style.display = 'none';
            }
        }


        document.addEventListener("DOMContentLoaded", function() {
            const pagareCheckbox = document.getElementById("pagareCheckbox");
            const otroCheckbox = document.getElementById("otroCheckbox");
            const credDirectoCheckBox = document.getElementById("creditoDirectoCheckbox");
            const pagareFields = document.getElementById("divPagareCheckbox");
            const otroFields = document.getElementById("divOtrosCheckbox");
            const creditoDirectoFields = document.getElementById("divCreditoDirectoCheckBox");
            const tarjetaCreditoCheckbox = document.getElementById("tarjetaCreditoCheckbox");
            const divTarjetaCredito = document.getElementById("tarjetaCreditoCheck")
            pagareCheckbox.addEventListener("change", function() {
                if (pagareCheckbox.checked) {
                    pagareFields.style.display = "flex";
                    pagareFields.style.alignItems = "center";
                } else {
                    pagareFields.style.display = "none";
                }
            });
            otroCheckbox.addEventListener("change", function() {
                if (otroCheckbox.checked) {
                    otroFields.style.display = "flex";
                    otroFields.style.alignItems = "center";
                } else {
                    otroFields.style.display = "none";
                }
            });
            credDirectoCheckBox.addEventListener("change", function() {
                if (credDirectoCheckBox.checked) {
                    creditoDirectoFields.style.display = "flex";
                    creditoDirectoFields.style.alignItems = "center";
                } else {
                    creditoDirectoFields.style.display = "none";
                }
            });
            tarjetaCreditoCheckbox.addEventListener("change", function() {
                if (tarjetaCreditoCheckbox.checked) {
                    divTarjetaCredito.style.display = "flex";
                    divTarjetaCredito.style.alignItems = "center";
                } else {
                    divTarjetaCredito.style.display = "none";
                }
            });
        });
    </script>
</x-app-layout>
