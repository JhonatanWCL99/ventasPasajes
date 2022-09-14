<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Registro de Nuevo Viaje "FLOTA MARISCAL S.C"</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('viajes.create') }}" method="POST" class="form-horizontal"
                                id="formulario">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha_actual">Fecha Salida</label>
                                            <input type="date" class="form-control" name="fecha_salida"
                                                >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha_actual">Hora Salida</label>
                                            <input type="time" class="form-control" name="hora_salida"
                                                >
                                        </div>
                                    </div>



                                </div>
                                {{-- <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a class="btn btn-danger" href="{{ route('bonos.index') }}">Volver</a>
                                </div> --}}
                            </form>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="proveedor">Rutas<span class="required">*</span></label>
                                        <select name="proveedor" id="proveedor" class="form-select">
                                            <option> Elige una Ruta</option>
                                            @foreach ($rutas as $ruta)
                                                <option value="{{ $ruta->id }}">{{ $ruta->lugar_origen }}  {{$ruta->lugar_llegada}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="proveedor">Chofer<span class="required">*</span></label>
                                        <select name="proveedor" id="proveedor" class="form-select">
                                            <option> Elige un Chofer</option>
                                            @foreach ($choferes as $chofer)
                                                <option value="{{ $chofer->id }}">{{ $chofer->persona->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="proveedor">Buses<span class="required">*</span></label>
                                        <select name="proveedor" id="proveedor" class="form-select">
                                            <option> Elige un Bus</option>
                                            @foreach ($buses as $bus)
                                                <option value="{{ $bus->id }}">{{ $bus->marca }}  {{$bus->modelo}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
              {{--       <div class="card">
                        <div class="card-body">
                            <div class="table-resposive">
                                <table class="table table-bordered table-md" id="table">
                                    <thead>
                                        <th style="text-align: center;">Producto</th>
                                        <th style="text-align: center;">Costo Unitario</th>
                                        <th style="text-align: center;">Cantidad</th>
                                        <th style="text-align: center;">Sub Total</th>
                                        <th style="text-align: center;">Opciones</th>
                                    </thead>
                                    <tbody id="tbody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
