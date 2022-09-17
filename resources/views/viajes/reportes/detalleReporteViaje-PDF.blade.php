<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detalles del Plato</title>
    <Style>
        body {
            font-family: Arial;
        }

        #main-container {
            margin: 150px auto;
            width: 600px;
        }

        table {
            background-color: white;
            text-align: left;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        thead {
            background-color: black;
            border-bottom: solid 1px #0F362D;
            color: white;
        }

        tr:hover td {
            background-color: #369681;
            color: white;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1px;
            margin-right: 1px;
        }

        .cabecera {
            display: grid;
            grid-column: 2;
            grid-row: 2;
        }
    </Style>
</head>

<body>
    <div style="text-align: center;">
        <h2>Reporte de Total Ventas Viaje Por Pasajero </h2>
    </div>
    <div class="cabecera">
        <div class="content">
            <h5 class="card-title">Detalle del Viaje ---------------------------------------------------------------------- Datos del Viaje</h5>
            <p class="card-text">Nombre del Pasajero : {{ $ventas_viajes[0]->nombre}} {{$ventas_viajes[0]->apellido}} --------------------- Fecha Venta: {{ $ventas_viajes[0]->fecha_venta}} </p>
            <p class="card-text"> Tickets Comprados : {{ $ventas_viajes[0]->cantidad}} ------------------------------------------- Ruta del Viaje : {{ $viaje->ruta->lugar_origen }} - {{ $viaje->ruta->lugar_llegada }} </p>
            <p class="card-text"> Precio Ticket :{{ $ventas_viajes[0]->precio_asiento}} </p>
            <p class="card-text"> Monto Total :{{ $ventas_viajes[0]->total}} </p>
        
        </div>
        <div class="content">
            <h5 class="card-title">Datos del Bus ------------------------------------------------------------------------ Datos del Vendedor</h5>
            <p class="card-text">Marca del vehiculo: {{ $ventas_viajes[0]->marca }} {{$ventas_viajes[0]->modelo}} -------------- Nombre Vendedor: {{ $ventas_viajes[0]->name }}</p>
            <p class="card-text">Cantidad Maxima de asientos: {{ $ventas_viajes[0]->cantidad_max_asientos }} -------------------------------- Email Vendedor:{{ $ventas_viajes[0]->email }}</p>
        </div>
    </div>
    <div class="card">
        <div style="text-align: center;">
            <h2>Asientos Reservados</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th class="text-center">Nombre del Pasajero</th>
                    <th class="text-center">Nro Asiento</th>
                    <th class="text-center">Color</th>
                </thead>
                <tbody>
                    @foreach($asientos_reservados as $asiento_reservado)
                    <tr>
                        <td class="text-center table-light"> {{ $asiento_reservado->nombrePasajero }}</td>
                        <td class="text-center"> {{ $asiento_reservado->numero_asiento }} </td>
                        <td class="text-center"> {{ $asiento_reservado->color }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>