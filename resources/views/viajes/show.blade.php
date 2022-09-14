<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Informacion detallada del viaje: {{$viaje->id}}
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">


        {{-- <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">

            <div class="relative">
                <div class="{{ ($order->status >= 2 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }}  rounded-full h-12 w-12 flex items-center justify-center">
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
            <p class="text-gray-700 uppercase"><span class="font-semibold">Nro de Viaje:</span>
                Viaje-{{  $viaje->ruta->lugar_origen}}</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Detalle del Viaje</p>
                    <tr>
                        <th>Fecha de Salida del Viaje</th>
                        <td>{{ $viaje->fecha_salida}}</td>
                    </tr> <br>

                    <tr>
                        <th>Hora de Salida del Viaje</th>
                        <td>{{ $viaje->hora_salida}} Hrs</td>
                    </tr> <br>

                    <tr>
                        <th>Ruta del viaje:</th>
                        <td>{{ $viaje->ruta->lugar_origen}}  a <span style="color: green"> {{$viaje->ruta->lugar_llegada}} </span></td>
                    </tr>




                </div>

                <div>
                    <p class="text-lg font-semibold uppercase">Datos del Conductor</p>

                    <p class="text-sm">Conductor a cargo del Viaje:  {{ $viaje->chofer->persona->nombre }}   {{ $viaje->chofer->persona->apellido }}</p>
                    <p class="text-sm">Nro Licencia de conducir:  {{ $viaje->chofer->licencia_conducir }}</p>

                    @if ($viaje->chofer->fecha_caducidad > $fecha)
                    <p class="text-sm">Fecha Vencimiento Licencia: <span style="color: red">{{ $viaje->chofer->fecha_caducidad }} </span> </p>
                    @else
                    <p class="text-sm">Fecha Vencimiento Licencia: <span style="color:green">{{ $viaje->chofer->fecha_caducidad }} </span> </p>
                    @endif
                </div>

                <div>
                    <p class="text-lg font-semibold uppercase">Datos del Bus</p>

                    <p class="text-sm">Marca del vehiculo:  {{ $viaje->bus->marca }} {{$viaje->bus->modelo}} </p>
                    <p class="text-sm">Cantidad Maxima de asientos:  {{ $viaje->bus->cantidad_max_asientos }}</p>


                </div>
            </div>
        </div>

        {{-- <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                        alt="">
                                    <article>
                                        <h1 class="font-bold">{{ $item->name }}</h1>
                                        <div class="flex text-xs">

                                            @isset($item->options->color)
                                                Color: {{ __($item->options->color) }}
                                            @endisset

                                            @isset($item->options->size)
                                                - {{ $item->options->size }}
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>

                            <td class="text-center">
                                {{ $item->price }} USD
                            </td>

                            <td class="text-center">
                                {{ $item->qty }}
                            </td>

                            <td class="text-center">
                                {{ $item->price * $item->qty }} USD
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}



    </div>


</x-app-layout>
