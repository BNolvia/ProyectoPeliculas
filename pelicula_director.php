<?php

require 'Database.php';

class pelicula_director
{
    function __construct()
    {
    }
    public static function getAll()
    {
        $consulta =  "select nombrepelicula, nombre from pelicula_director ap
	inner join pelicula p on p.idpelicula=ap.idpelicula
		inner join director e on e.iddirector=ap.iddirector
		";
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
    $pelicula_director= pelicula_director::getAll();

    if ($pelicula_director) {

        $datos["pelicula_director"] = $pelicula_director;

        print json_encode($datos);
    } else {
        print json_encode(array(
             "mensaje" => "Ha ocurrido un error"
        ));
    }
    
}