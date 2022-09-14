<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Registro de Nuevo Viaje
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">

                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 px-5">
                        <div class="form-group">
                            <label class="tracking-wide text-black text-xs font-bold mb-2" for="fecha_venta">Fecha Venta</label>
                            <input type="date" name="fecha_venta" @error('fecha_venta') is-invalid @enderror class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                            @error('fecha_venta')
                            <span class="invalid-feedback " style="color: red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 px-5">
                        <div class="form-group">
                            <label class="tracking-wide text-black text-xs font-bold mb-2" for="hora_venta">Hora Venta</label>
                            <input type="time" name="hora_venta" @error('hora_venta') is-invalid @enderror class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                            @error('hora_venta')
                            <span class="invalid-feedback " style="color: red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 px-5">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pasajero_id">
                            Pasajeros Asociados
                        </label>
                        <select name="pasajero_id" id="pasajero_id" @error('pasajero_id') is-invalid @enderror class="form-select appearance-none block w-full px-3 py-2.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            <option value="">Seleccione un Pasajero</option>
                            @foreach($pasajeros as $pasajero)
                            <option value="{{$pasajero->id}}">{{ $pasajero->persona->nombre }} - {{$pasajero->persona->apellido}}</option>
                            @endforeach
                        </select>
                        @error('pasajero_id')
                        <span class="invalid-feedback" style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                </div>
        </div>

                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <div class="grid grid-cols-2 gap-6 text-gray-700">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Precio </th>
                                    <th>Cantidad</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @foreach ($pasajeros as $pasajero)
                                    <tr>
                                        <td>
                                            <div class="flex">
                                                <article>
                                                    <h1 class="font-bold">{{ $pasajero->persona->nombre }}</h1>
                                                    <div class="flex text-xs">


                                                    </div>
                                                </article>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            {{ $pasajero->persona->apellido }} USD
                                        </td>

                                        <td class="text-center">
                                            {{ $pasajero->persona->fecha_nacimiento }}
                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


    </div>

</x-app-layout>
