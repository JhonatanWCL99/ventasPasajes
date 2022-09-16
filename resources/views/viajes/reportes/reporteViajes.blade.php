<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Reporte Viajes "Flota Mariscal SRL"
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="w-full mx-auto py-4 sm:px-6 lg:px-4 bg-white shadow-lg mb-6">
            <div class="bg-white px-2 py-4">
                <form action="{{route('viajes.reporteViajes')}}" method="GET">
                    @csrf
                    <div date-rangepicker class="flex items-center ">
                        <div class="relative md:w-1/2 ">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ruta">
                                Fecha Inicial
                            </label>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 mt-5 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input name="fecha_inicial" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Seleccione la fecha de inicio">
                        </div>
                        <span class="mx-4 text-gray-500 mt-5">a</span>
                        <div class="relative md:w-1/2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ruta">
                                Fecha Final
                            </label>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 mt-5 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input name="fecha_final" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Seleccione la fecha de fin">
                        </div>
                        <div class="w-full md:w-1/2 px-8">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ruta">
                                Seleccione la Ruta
                            </label>
                            <select name="lugar_llegada" id="ruta" @error('ruta') is-invalid @enderror class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 px-40 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        </div>
                    </div>
                    <br>
                    <div class="w-full md:w-1/2 ">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="submit">
                            Filtrar Datos
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full mx-auto py-4 sm:px-6 lg:px-4 bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">VIAJES: </p>
            <table class="table-fixed w-full  ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ruta Llegada</th>
                        <th>Fecha Salida</th>
                        <th>Hora Salida</th>
                        <th>Nombre Conductor </th>
                        <th>Licencia Conducir </th>
                        <th>Detalle </th>
                    </tr>
                </thead>

<<<<<<< HEAD
                <tbody class="divide-y divide-gray-200">
                    @foreach ($viajes as $viaje)
=======
    <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
        <p class="text-xl font-semibold mb-4">VIAJES: </p>

        <table class="table-fixed w-full  ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ruta Llegada</th>
                    <th>Fecha Salida</th>
                    <th>Hora Salida</th>
                    <th>Nombre Conductor </th>
                    <th>Licencia Conducir </th>
                    <th>Detalle </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($viajes as $viaje)
>>>>>>> b475bbe0b93daa0b2220f917f32e3f7f6bf215ad
                    <tr>
                        <td class="text-center">
                            {{ $viaje->id }}
                        </td>

                        <td class="text-center">
                            {{ $viaje->lugar_llegada }}
                        </td>

                        <td class="text-center">
                            {{ $viaje->fecha_salida }}
                        </td>

                        <td class="text-center">
                            {{ $viaje->hora_salida }}
                        </td>

                        <td class="text-center">
                            {{ $viaje->nombre }} {{$viaje->apellido}}
                        </td>
                        <td class="text-center">
                            {{ $viaje->licencia_conducir}}
                        </td>

                        <td class="border px-4 " >
                            <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path  stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                              </svg>
                            <a href="{{ route('viajes.edit',$viaje->id) }}">Detalle</a>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>





    <script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
</x-app-layout>