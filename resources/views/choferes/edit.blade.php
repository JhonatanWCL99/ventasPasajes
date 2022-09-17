<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Editar Chofer #{{$chofer->id}}
        </h2>
    </x-slot>

    <div class="w-full mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden sm:rounded-lg px-4 py-2">
            <div class=" bg-gray-100 mx-auto max-w-6xl bg-white py-10 px-12 lg:px-24 shadow-xl mb-2">
                <form action="{{ route('choferes.update',$chofer->id) }}" method="POST" class="w-full max-w-2lg">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap">

                        <div class="w-full md:w-1/2 px-5">
                            <div class="form-group">
                                <label class="tracking-wide text-black text-xs font-bold mb-2" for="precio_asiento">Chofer Nombre</label>
                                <input type="text" name="chofer_nombre" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" step="any" value="{{$chofer->persona->nombre}}">
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-5">
                            <div class="form-group">
                                <label class="tracking-wide text-black text-xs font-bold mb-2" for="precio_asiento">Chofer Apellido</label>
                                <input type="text" name="chofer_apellido" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" step="any" value="{{$chofer->persona->apellido}}">
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-5">
                            <div class="form-group">
                                <label class="tracking-wide text-black text-xs font-bold mb-2" for="precio_asiento">Licencia Conducir</label>
                                <input type="number" name="licencia_conducir" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" step="any" value="{{$chofer->licencia_conducir}}">
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-5">
                            <div class="form-group">
                                <label class="tracking-wide text-black text-xs font-bold mb-2" for="fecha_actual">Fecha Caducidad Licencia</label>
                                <input type="date" name="fecha_caducidad" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" value="{{$chofer->fecha_caducidad}}" required>
                            </div>
                        </div>



                    </div>
                    <div class="-mx-3 md:flex mt-4 justify-center text-center mb-4">
                        <div class="px-5">
                            <button type="submit" class="md:w-full bg-gray-500 hover:bg-gray-700 text-white py-2 px-6 border-b-4 rounded-full" id="button">
                                Actualizar Chofer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

</x-app-layout>
