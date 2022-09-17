<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Listado de Ventas de Pasajes
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white px-4 py-4">
                <a class="px-8 py-2 bg-gray-300 hover:bg-gray-400 rounded-full" href="{{ route('ventasPasajes.create') }}"> Nueva Venta</a>
                <br><br>
                <table class="table-auto w-full my-3 divide-y divide-gray-200">
                    <tr class="bg-gray-100">
                        <th class="">Nro</th>
                        <th class="px-4 py-2">Fecha de Venta</th>
                        <th class="px-4 py-2">Hora de Venta</th>
                        <th class="px-4 py-2">Total Venta</th>
                        <th class="px-4 py-2">Nombre de Pasajero</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                    @foreach ($ventasPasaje as $key => $venta)
                    <tr>
                        <td class="text-center">
                            <a href="{{route('ventasPasajes.show', $venta->id)}}">{{$venta->id}} </a>
                        </td>
                        <td class="border px-4 py-2 text-center">{{ $venta->fecha_venta }}</td>
                        <td class="border px-4 py-2 text-center">{{ $venta->hora_venta }}</td>
                        <td class="border px-4 py-2 text-center">{{ $venta->total }}</td>
                        <td class="border px-4 py-2 text-center">{{ $venta->pasajero->persona->nombre }}</td>
                        <td class="border px-4 py-2 text-center">
                            <div class="mt-2">
                                <form action="{{ route('ventasPasajes.destroy',$venta->id) }}" method="POST">
                                    <a class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-5 rounded " href="{{ route('ventasPasajes.show',$venta->id) }}">Detalle</a>
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
