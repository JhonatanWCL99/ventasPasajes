<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Informacion detallada del viaje #: {{$ventas_viajes[0]->viaje_id}} y Venta #: {{$ventas_viajes[0]->id}}
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">


        {{-- <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">

            <div class="relative">
                <div class="{{ ($order->status >= 2 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
        <i class="fas fa-check text-white"></i>
    </div>

    <div class="absolute -left-1.5 mt-0.5">
        <p>Recibido</p>
    </div>
    </div>

    <div class="{{ ($order->status >= 3 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2"></div>

    <div class="relative">
        <div class="{{ ($order->status >= 3 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
            <i class="fas fa-truck text-white"></i>
        </div>

        <div class="absolute -left-1 mt-0.5">
            <p>Enviado</p>
        </div>
    </div>

    <div class="{{ ($order->status >= 4 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2"></div>

    <div class="relative">
        <div class="{{ ($order->status >= 4 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
            <i class="fas fa-check text-white"></i>
        </div>

        <div class="absolute -left-2 mt-0.5">
            <p>Entregado</p>
        </div>
    </div>

    </div> --}}




    <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
        <p class="text-gray-700 uppercase"><span class="font-semibold">Ruta del Viaje : {{ $viaje->ruta->lugar_origen }} - {{ $viaje->ruta->lugar_llegada }} </span>
            <br> Fecha Venta: {{ $ventas_viajes[0]->fecha_venta}}
        </p>
        <a href="{{ route('viajes.detalleReporteViajePDF',[$viaje->id, $fecha_inicial_formatada,$fecha_final_formatada]) }}" class="ml-20 inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Generar PDF</a>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <div class="grid grid-cols-2 gap-6 text-gray-700">
            <div>
                <p class="text-lg font-semibold uppercase">Detalle del Viaje</p>
                <tr>
                    <th> Nombre Pasajero</th>
                    <td>{{ $ventas_viajes[0]->nombre}} {{$ventas_viajes[0]->apellido}}</td>
                </tr> <br>

                <tr>
                    <th> Tickets Comprados</th>
                    <td>{{ $ventas_viajes[0]->cantidad}} </td>
                </tr><br>

                <tr>
                    <th>Precio Ticket:</th>
                    <td>{{ $ventas_viajes[0]->precio_asiento}} </td>
                </tr><br>
                <tr>
                    <th>Monto Total:</th>
                    <td>{{ $ventas_viajes[0]->total}} </td>
                </tr>




            </div>

            <div>
                <p class="text-lg font-semibold uppercase">Datos del Vendedor</p>

                <p class="text-sm">Nombre Vendedor: {{ $ventas_viajes[0]->name }} </p>
                <p class="text-sm">Email Vendedor: {{ $ventas_viajes[0]->email }}</p>

            </div>

            <div>
                <p class="text-lg font-semibold uppercase">Datos del Bus</p>

                <p class="text-sm">Marca del vehiculo: {{ $ventas_viajes[0]->marca }} {{$ventas_viajes[0]->modelo}} </p>
                <p class="text-sm">Cantidad Maxima de asientos: {{ $ventas_viajes[0]->cantidad_max_asientos }}</p>


            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
        <p class="text-xl font-semibold mb-4">Asientos Reservados</p>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <!--  <th></th>
 -->
                    <th>Nombre del Pasajero</th>
                    <th>Nro Asiento</th>
                    <th>Color</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($asientos_reservados as $asiento_reservado)
                @if($asiento_reservado->estado == "R")
                <tr>
                    <td class="text-center">
                        {{ $asiento_reservado->nombrePasajero }}
                    </td>

                    <td class="text-center">
                        {{ $asiento_reservado->numero_asiento }}
                    </td>
                    <td class="text-center">
                        {{ $asiento_reservado->color }}
                    </td>

                    <td class="text-center">
                        <p class="text-center text-2xl mt-2 ">
                            <i class="fas fa-credit-card bg-teal-600"></i>
                        </p>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>




    </div>


</x-app-layout>