<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold justify-center flex text-xl text-gray-800 leading-tight">
            Registro de Nueva Venta de Pasaje
        </h2>
    </x-slot>
    <div class="w-full py-2 sm:px-6 lg:px-8">
        <div class="bg-white sm:rounded-lg px-4 py-4">
            <div class="flex justify-start">
                <div class="w-full md:w-1/2 px-5">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre">
                        Fecha de Venta
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" value="{{$fecha_actual}}" id="fecha_inicio" name="fecha_inicio" type="date" placeholder="Nombre..." value="{{ old('fecha_inicio') }}">
                </div>
                <div class="w-full md:w-1/2 px-5 mb-5">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="correo">
                        Pasajeros
                    </label>
                    <select name="pasajeroSelect" id="pasajeroSelect" class="form-select appearance-none block w-full px-3 py-2.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        @foreach($pasajeros as $pasajero)
                        <option value="{{$pasajero->id}}">{{$pasajero->persona->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full py-2 sm:px-6 lg:px-8">
        <div class="bg-white sm:rounded-lg px-4 py-4">
            <form action="{{ route('ventasPasajes.store') }}" method="POST">
                @csrf
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 px-5 mb-5">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="correo">
                            Viajes Disponibles
                        </label>
                        <select name="viaje" id="viaje" class="form-select appearance-none block w-full px-3 py-2.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            <option value="">Seleccione un Viaje</option>
                            @foreach($viajes as $viaje)
                            <option value="{{$viaje->id}}">Viaje Nro {{$viaje->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-5">
                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="asientos">
                                Fecha de Salida
                            </label>
                            <input type="date" name="fecha_salida" id="fecha_salida" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-5">
                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="hora_salida">
                                Hora de Salida
                            </label>
                            <input type="time" name="hora_salida" id="hora_salida" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-5">
                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ruta">
                                Ruta Asignada
                            </label>
                            <input type="text" name="ruta" id="ruta" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-5">
                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ruta">
                                Chofer
                            </label>
                            <input type="text" name="chofer" id="chofer" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-5">
                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ruta">
                                Bus
                            </label>
                            <input type="text" name="bus" id="bus" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-5">
                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ruta">
                                Precio por Pasaje
                            </label>
                            <input type="text" name="precio_asiento" id="precio_asiento" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-5 mb-5">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="asientos">
                            Asientos Disponibles
                        </label>
                        <select id="select-asiento" name="asientos[]" multiple placeholder="Selecciona los asientos..." class="block w-full rounded-sm focus:outline-none " multiple>
                        </select>
                    </div>
                </div>
                <div class="px-6 py-4 m:auto">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3" id="button">
                        Registrar Venta
                    </button>
                </div>
                <input type="hidden" id="pasajero" name="pasajero">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        const csrfToken = document.head.querySelector(
            "[name~=csrf-token][content]"
        ).content;
        let viaje = document.getElementById("viaje");
        let rutaObtenerDatos = "{{ route('ventasPasajes.obtenerDatosViaje') }}";
        let fecha_salida = document.getElementById("fecha_salida");
        let hora_salida = document.getElementById("hora_salida");
        let ruta = document.getElementById("ruta");
        let chofer = document.getElementById("chofer");
        let bus = document.getElementById("bus");
        let pasajero = document.getElementById("pasajero");
        let precio_asiento = document.getElementById("precio_asiento");
        let asientosSelect = document.getElementById("select-asiento")
        let pasajeroSelect = document.getElementById("pasajeroSelect")
        viaje.addEventListener('change', (e) => {
            fetch(rutaObtenerDatos, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-Token": csrfToken,
                    },
                    body: JSON.stringify({
                        viaje_id: viaje.value,
                    }),
                })
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    console.log(data);
                    fecha_salida.value = data.viaje.fecha_salida;
                    hora_salida.value = data.viaje.hora_salida;
                    precio_asiento.value =  data.viaje.precio_asiento;
                    chofer.value = data.chofer;
                    bus.value = data.bus;
                    ruta.value = data.ruta;
                    pasajero.value = pasajeroSelect.value;
                    let opciones = [];
                    for (let i in data.asientos) {
                        opciones.push({
                            "id": data.asientos[i].id,
                            "title": "Asiento Nro " + data.asientos[i].numero_asiento,
                        });
                    }
                    var tomSelect = new TomSelect('#select-asiento', {
                        maxItems: null,
                        valueField: 'id',
                        labelField: 'title',
                        searchField: 'title',
                        create: false,
                        options: opciones,
                    });
                    /*  tomSelect.options = opciones; */
                })
                .catch((error) => {
                    console.log(error)
                });
        });
        
    </script>
</x-app-layout>