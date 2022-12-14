<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Asistentes Asociados a la Empresa
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white px-4 py-4">

                <br><br>
                <table class="table-auto w-full my-3 divide-y divide-gray-200" id="table">
                    <tr class="bg-gray-100">

                        <th class="px-4 py-2">Nombre Completo </th>

                        <th class="px-4 py-2">Fecha de Nacimiento</th>
                        <th class="px-4 py-2">CI</th>
                        <th class="px-4 py-2">Direccion</th>
                        <th class="px-4 py-2">Cargo Desempeña</th>


                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                    @foreach ($asistentes as   $asistente)
                    <tr>
                       {{--  <td  class="text-center">
                            <a href="{{route('viajes.show', $viaje->id)}}">{{$viaje->id}} </a>
                        </td> --}}
                        <td class="border px-4 py-2 text-center">{{ $asistente->persona->nombre }} {{$asistente->persona->apellido}}</td>
                        <td class="border px-4 py-2 text-center">{{ $asistente->persona->fecha_nacimiento }}</td>
                        <td class="border px-4 py-2 text-center">{{ $asistente->persona->ci }}</td>
                        <td class="border px-4 py-2 text-center">{{ $asistente->persona->direccion }}</td>
                        <td class="border px-4 py-2 text-center">{{ $asistente->cargo }}</td>


                        <td class="border px-4 py-2 text-center">
                            <div class="mt-2">
                                <form action="{{ route('asistentes.destroy',$asistente->id) }}" method="POST">
                                    <a class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-5 rounded " href="{{ route('asistentes.edit', $asistente->id) }}">Editar</a>
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

