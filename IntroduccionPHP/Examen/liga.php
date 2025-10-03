<?php

define("TEMPORADA", "2025-2026");

$estadisticas = array(
    "Osasuna" => array(
        "jugadores" => array(
            "Jon Moncayola" => array(
                "ataque" => 80,
                "defensa" => 78
            ),
            "Juan Cruz" => array(
                "ataque" => 50,
                "defensa" => 60
            )
        )
    ),
    "Real Madrid" => array(
        "jugadores" => array(
            "Vinicius" => array(
                "ataque" => 90,
                "defensa" => 20
            ),
            "Valverde" => array(
                "ataque" => 80,
                "defensa" => 85
            ),
            "Curtois" => array(
                "ataque" => 1,
                "defensa" => 99
            )
        )
    )
);

function pintarEstadisticasLiga($arrayEstadisticas)
{
    foreach($arrayEstadisticas as $equipo => $estadisticaEquipo){

        echo "<h2>".$equipo."</h2>";
        pintarEstadisticasEquipo($estadisticaEquipo);

    }
}

function pintarEstadisticasEquipo($estadisticaEquipo){

    echo "<table>";
    pintarCabecera($estadisticaEquipo);
    //echo "<thead><tr><td>Nombre</td><td>Ataque</td><td>Defensa</td><td>Goles</td></thead>"; // Cabecera Fija Hardcoded
    foreach($estadisticaEquipo["jugadores"] as $jugador => $estadisticaJugador){
        pintarJugador($jugador, $estadisticaJugador);
    }
    echo "</table>";
}

function pintarCabecera($estadisticaEquipo){

    echo "<thead><tr><td>Nombre</td>";
    foreach($estadisticaEquipo["jugadores"] as $jugador => $estadisticaJugador){
        foreach($estadisticaJugador as $tipoEstadistica => $valorEstadistica){
            echo "<td>".$tipoEstadistica."</td>";
        }
        break;
    }
    echo "</th></thead>";

}

function pintarJugador($jugador, $estadisticaJugador){
    echo "<tr>";
    echo "<td>".$jugador."</td>";
    pintarEstadisticas($estadisticaJugador);
    echo "</tr>";
}

function pintarEstadisticas($estadisticaJugador){
    foreach($estadisticaJugador as $tipoEstadistica => $valorEstadistica){
        echo "<td>".$valorEstadistica."</td>";
    }
}

function anadirGoles($arrayEstadisticas){

    foreach($arrayEstadisticas as $equipo => $estadisticaEquipo){

        foreach($estadisticaEquipo["jugadores"] as $jugador => $estadisticaJugador){
            $arrayEstadisticas[$equipo]["jugadores"][$jugador]["Goles"] = rand(0, 10);
        }

    }
    return $arrayEstadisticas;
}

function jugadoresConMasGoles($arrayEstadisticas){

    $jugadoresMasGoles = [];
    $golesMaximos = 0;

    foreach($arrayEstadisticas as $equipo => $estadisticaEquipo){

        foreach($estadisticaEquipo["jugadores"] as $jugador => $estadisticaJugador){
            if ($estadisticaJugador["Goles"] > $golesMaximos){
                $golesMaximos = $estadisticaJugador["Goles"];
                $jugadoresMasGoles = ["$jugador - $equipo"];
            }
            else if ($estadisticaJugador["Goles"] == $golesMaximos){
                $jugadoresMasGoles[] = "$jugador - $equipo";
            }
        }

    }

    return $jugadoresMasGoles;

}
?>
<style>
    table, td {
        border:1px solid black;
    }
    table {
        border-collapse:collapse;
        width:100%;
    }
    td {
        padding:10px;
    }
</style>
<h1>Liga de Futbol Profesional: <?= TEMPORADA ?></h1>
<?= pintarEstadisticasLiga($estadisticas) ?>
<?php $estadisticasCambiadas = anadirGoles($estadisticas) ?>
<?= pintarEstadisticasLiga($estadisticasCambiadas) ?>
<?php
    $jugadoresMasGoles = jugadoresConMasGoles($estadisticasCambiadas);
    foreach ($jugadoresMasGoles as $jugador) {
        echo "<h2>$jugador</h2>";
    }
?>