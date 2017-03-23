<?php

require 'Database.php';

class estudio_pelicula
{
    function __construct()
    {
    }
    public static function getAll()
    {
        $consulta = "SELECT * FROM estudio_pelicula";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

}

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $estudio_pelicula= estudio_pelicula::getAll();

    if ($estudio_pelicula) {

        $datos["estudio_pelicula"] = $estudio_pelicula;

        print json_encode($datos);
    } else {
        print json_encode(array(
             "mensaje" => "Ha ocurrido un error"
        ));
    }
    
}