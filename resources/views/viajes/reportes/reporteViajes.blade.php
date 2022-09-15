<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Reporte Viajes "Flota Mariscal SRL"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white px-4 py-4">
            <form action="{{route('viajes.reporteViajes')}}" method="GET">

                <div class="w-full md:w-6/2 px-12">
                    <div class="form-group">
                        <label class="tracking-wide text-black text-xs font-bold mb-2" for="fecha_inicial">Fecha Salida</label>
                        <input type="date" name="fecha_inicial" @error('fecha_inicial') is-invalid @enderror class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                        @error('fecha_inicial')
                        <span class="invalid-feedback " style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-12">
                    <div class="form-group">
                        <label class="tracking-wide text-black text-xs font-bold mb-2" for="fecha_llegada">Fecha Llegada</label>
                        <input type="date" name="fecha_llegada" @error('fecha_llegada') is-invalid @enderror class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                        @error('fecha_llegada')
                        <span class="invalid-feedback " style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-12">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ruta">
                        Seleccione la Ruta
                    </label>
                    <select name="ruta" id="ruta" @error('ruta') is-invalid @enderror class="form-select appearance-none block w-full px-3 py-2.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <option value="">Seleccione una Ruta</option>
                        @foreach($rutas as $ruta)
                        <option value="{{$ruta->id}}">{{$ruta->lugar_llegada}}</option>
                        @endforeach
                    </select>
                    @error('ruta')
                    <span class="invalid-feedback" style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> <br>

                <div class="w-full md:w-1/2 px-12">

                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="submit">
                        Filtrar
                      </button>
                </div>
            </form>






            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
        <p class="text-xl font-semibold mb-4">Resumen: </p>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Ruta Llegada</th>
                    <th>Fecha Salida</th>
                    <th>Hora Salida</th>
                    <th>Nombre Completo </th>
                    <th>Licencia Conducir </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($viajes as $viaje)
                    <tr>
                        <td>
                            <div class="flex">

                                <article>
                                    <h1 class="font-bold">{{ $viaje->ruta_llegada }}</h1>
                                    <div class="flex text-xs">


                                    </div>
                                </article>
                            </div>
                        </td>

                        <td class="text-center">
                            {{ $viaje->fecha_salida }}
                        </td>

                        <td class="text-center">
                            {{ $viaje->hora_salida }}
                        </td>

                        <td class="text-center">
                            {{ $viaje->nombre }}  {{$viaje->apellido}}
                        </td>
                        <td class="text-center">
                            {{ $viaje->licencia_conducir}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




</x-app-layout>
