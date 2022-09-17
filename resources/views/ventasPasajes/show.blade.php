<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Informacion detallada de la Venta #: {{$venta->id}}
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold"></span>
                 Fecha Venta- {{  $venta->fecha_venta}} - Hora Venta {{  $venta->hora_venta}}  </p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Informacion Adicional:</p>
                    <tr>
                        <th> Pasajero:</th>
                        <td>{{ $venta->pasajero->persona->nombre}} {{$venta->pasajero->persona->apellido}}</td>
                    </tr> <br>

                    <tr>
                        <th> Personal Encargado: </th>
                        <td>{{ $venta->user->name}} </td>
                    </tr><br>

                    <tr>
                        <th> Ruta del Viaje: </th>
                        <td>{{ $venta->detalles_ventas[0]->viaje->ruta->lugar_origen}} A:  {{ $venta->detalles_ventas[0]->viaje->ruta->lugar_llegada}}  </td>
                    </tr><br>


                    <tr>
                        <th>Total Venta:</th>
                        <td>{{ $venta->total}} Bs </td>
                    </tr>

                </div>

            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Detalle Venta:</p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Asientos Comprados</th>
                        <th>Precio Ticket </th>
                        <th>SubTotal </th>

                        <th>Estado Viaje</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($venta->detalles_ventas as $detalle)

                        <tr>
                            <td>
                                <div class="flex">

                                    <article>

                                        <div class="flex text-xs">


                                        </div>
                                    </article>
                                </div>
                            </td>

                            <td class="text-center">
                                {{ $detalle->cantidad }}
                            </td>
                            <td class="text-center">
                                {{ $detalle->viaje->precio_asiento }}
                            </td>

                            <td class="text-center">
                                {{ $detalle->subtotal }}
                            </td>



                            <td class="text-center">
                                <p class="text-center text-2xl mt-2 ">
                                    @if($detalle->viaje->estado=="E")
                                    <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Viaje en Espera</span>
                                    @endif
                                    @if($detalle->viaje->estado=="P")
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">Viaje en Proceso</span>
                                    @endif
                                    @if($detalle->viaje->estado=="C")
                                    <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Viaje Concluido</span>
                                    @endif
                                </p>
                             </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-lg shadow-lg mb-6">
            <div class="p-4 flex items-center">
                <span class="flex items-center justify-center h-10 w-10 rounded-full bg-greenLime-600">
                    <i class="fas fa-truck text-sm text-white"></i>
                </span>

                <div class="ml-4">
                    <p class="text-lg font-semibold text-greenLime-600">SISTEMA DE SERVICIOS DE COMPRA DE PASAJES Y GESTION DE VIAJES </p>

                </div>
            </div>
        </div>




    </div>


</x-app-layout>
