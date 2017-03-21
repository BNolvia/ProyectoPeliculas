<?php
/**
 * Obtiene todas las alumnos de la base de datos
 */

require 'pelicula.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $pelicula = pelicula::getAll();

    if ($pelicula) {

        $datos["estado"] = 1;
        $datos["pelicula"] = $pelicula;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}

