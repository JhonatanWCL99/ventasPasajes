<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Registro de Nuevo Viaje "FLOTA MARISCAL S.C"
        </h2>
    </x-slot>

    <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden sm:rounded-lg px-4 py-2">
            <div class=" bg-gray-100 mx-auto max-w-6xl bg-white py-10 px-12 lg:px-24 shadow-xl mb-2">
                <form action="{{ route('viajes.store') }}" method="POST" class="w-full max-w-2lg">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 px-5">
                            <div class="form-group">
                                <label class="tracking-wide text-black text-xs font-bold mb-2" for="fecha_actual">Fecha Salida</label>
                                <input type="date" name="fecha_salida" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-5">
                            <div class="form-group">
                                <label class="tracking-wide text-black text-xs font-bold mb-2" for="hora_salida">Hora Salida</label>
                                <input type="time" name="hora_salida" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ruta">
                                Seleccione la Ruta
                            </label>
                            <select name="ruta" id="ruta" class="form-select appearance-none block w-full px-3 py-2.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                <option value="">Seleccione una Ruta</option>
                                @foreach($rutas as $ruta)
                                <option value="{{$ruta->id}}">{{ $ruta->lugar_origen }} - {{$ruta->lugar_llegada}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full md:w-1/2 px-5 mb-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="chofer">
                                Chofer
                            </label>
                            <select name="chofer" id="chofer" class="form-select appearance-none block w-full px-3 py-2.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                <option value="">Elige un Chofer</option>
                                @foreach($choferes as $chofer)
                                <option value="{{$chofer->id}}">{{ $chofer->persona->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full md:w-1/2 px-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="chofer">
                                Buses
                            </label>
                            <select name="bus" id="bus" class="form-select appearance-none block w-full px-3 py-2.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                <option value="">Elige un Bus</option>
                                @foreach($buses as $bus)
                                <option value="{{$bus->id}}">{{ $bus->marca }} - {{$bus->modelo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mt-4 justify-center text-center mb-4">
                        <div class="px-5">
                            <button type="submit" class="md:w-full bg-gray-500 hover:bg-gray-700 text-white py-2 px-6 border-b-4 rounded-full" id="button">
                                Registrar Viaje
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

</x-app-layout>