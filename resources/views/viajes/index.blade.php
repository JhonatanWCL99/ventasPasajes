<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Listado de Viajes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white px-4 py-4">
                <a class="btn px-8 py-2 bg-gray-300 hover:bg-gray-400 rounded-full" href="{{ route('viajes.create') }}"> Nuevo Viaje</a>
                <br><br>
                <table class="table-auto w-full my-3 divide-y divide-gray-200">
                    <tr class="bg-gray-100">
                        <th class="">Nro</th>
                        <th class="px-4 py-2">Fecha de Partida</th>
                        <th class="px-4 py-2">Hora de Partida</th>
                        <th class="px-4 py-2">Chofer Asignado</th>
                        <th class="px-4 py-2">Placa del Bus</th>
                        <th class="px-4 py-2">Ruta</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                    @foreach ($viajes as $key => $viaje)
                    <tr>
                        <td  class="text-center">
                            <a href="{{route('viajes.show', $viaje->id)}}">{{$viaje->id}} </a>
                        </td>
                        <td class="border px-4 py-2 text-center">{{ $viaje->fecha_salida }}</td>
                        <td class="border px-4 py-2 text-center">{{ $viaje->hora_salida }}</td>
                        <td class="border px-4 py-2 text-center">{{ $viaje->chofer->persona->nombre }}</td>
                        <td class="border px-4 py-2 text-center">{{ $viaje->bus->placa }}</td>
                        <td class="border px-4 py-2 text-center">{{ $viaje->ruta->lugar_origen }} - {{ $viaje->ruta->lugar_llegada }}</td>
                        <td class="border px-4 py-2 text-center">
                            @if($viaje->estado=="E")
                            <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Viaje en Espera</span>
                            @endif
                            @if($viaje->estado=="P")
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">Viaje en Proceso</span>
                            @endif
                            @if($viaje->estado=="C")
                            <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Viaje Concluido</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <div class="mt-2">
                                <form action="{{ route('viajes.destroy',$viaje->id) }}" method="POST">
                                    <a class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-5 rounded " href="{{ route('viajes.edit',$viaje->id) }}">Editar</a>
                                    @csrf
                                    @method('Delete')
                                    <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>

</x-app-layout>
