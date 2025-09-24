<?php

// Constante para el nombre del alumno
define("ALUMNO", "Miguel Goyena");

// Creo un array de notas
$notas = array(
    "PSP" => array(
        "1EV" => array(6, 7, 8),
        "2EV" => array(2, 9, 8)
    ),
    "DW" => array(
        "1EV" => array(1,1,1),
        "2EV" => array(2,2,2)
    )
);

function pintarNotas($arrayNotas)
{
    foreach ($arrayNotas as $asignatura => $notas_asignatura) {
        echo "<tr>";
        echo "<td>$asignatura</td>";
        foreach ($notas_asignatura as $evaluacion => $notas_evaluacion) {
            foreach ($notas_evaluacion as $nota_ejercicio) {
                echo "<td>$nota_ejercicio</td>";
            }
        }
        echo "</tr>";
    }
}

/*
 * Pinta Cabeceras.
 * TODO Buscaremos la forma de hacerlo a apartir de los elemenos del Array.  
 */
function pintarCabecera($modo)
{
    if ($modo == 1){
        echo "<tr><td></td><td colspan=\"3\">1EV</td><td colspan=\"3\">2EV</td></tr>";
        echo "<tr><td></td><td>EJ1</td><td>EJ2</td><td>EJ3</td><td>EJ1</td><td>EJ2</td><td>EJ3</td></tr>";
    }
    else{ if ($modo == 2)
        echo "<tr><td></td><td colspan=\"3\">1EV</td><td colspan=\"3\">2EV</td><td>EF</td></tr>";
        echo "<tr><td></td><td>EJ1</td><td>EJ2</td><td>EJ3</td><td>EJ1</td><td>EJ2</td><td>EJ3</td><td>EJ</td><</tr>";
    }
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
<?php
// Pongo la cabecera
printf("<h1>Notas finales 2DAM de %s</h1>", ALUMNO);

// Pinto el array de notas
// Hardcodeadas las Evaluaciones (1EV y 2EV) y los Ejercicios (EJ1, EJ2, EJ3).
echo "<table>";
pintarCabecera(1);
pintarNotas($notas);
echo "</table>";

// Calculo las evaluaciones finales de cada asignatura y los añado a la asignatura
foreach ($notas as $asignatura => $notas_asignatura) {
    $acumulado_asignatura = 0;
    foreach ($notas_asignatura as $evaluacion => $notas_evaluacion) {
        $acumulado_evaluacion = 0;
        foreach ($notas_evaluacion as $nota_ejercicio) {
            $acumulado_evaluacion   = $acumulado_evaluacion   + $nota_ejercicio;   
        }
        $nota_evaluacion = $acumulado_evaluacion  / count($notas_evaluacion);
        $acumulado_asignatura = $acumulado_asignatura + $nota_evaluacion;
    }
    $nota_asignatura = $acumulado_asignatura / count($notas_asignatura);
    
    // Monto el array de la evaluación final
    $nota_evaluacion_final = array($nota_asignatura);
    $evaluacion_final = array(
        "EF" => $nota_evaluacion_final
    );
    
    //Añado la evaluación final
    $notas_asignatura["EF"] = $nota_evaluacion_final;
    $notas[$asignatura] = $notas_asignatura;
}

// Pinto la nueva tabla
// Hardcodeadas las Evaluaciones (1EV, 2EV y EF) y los Ejercicios (EJ1, EJ2, EJ3 para 1EV y 2EV y EJ para EF).
echo "<table>";
pintarCabecera(2);
pintarNotas($notas);
echo "</table>";

// Calculo la nota final del curso
$acumulado_curso = 0;
foreach ($notas as $asignatura => $notas_asignatura) {
    $nota_evaluacion_final = $notas_asignatura["EF"];
    $acumulado_curso = $acumulado_curso + $nota_evaluacion_final[0];
}
$nota_curso = $acumulado_curso / count($notas);

// Pinto la nota final del curso
echo "<h2>Nota final de curso: $nota_curso</h2>";
if ($nota_curso<5){
    echo "<h3>suspendido</h3>";
}
?>