<?php

require 'Database.php';

class actor_pelicula
{
    function __construct()
    {
    }
    public static function getAll()
    {
        $consulta = "select foto,imagen,nombreactor,nombrepelicula,personaje from actor_pelicula ap
						inner join pelicula p on p.idpelicula=ap.idpelicula
						inner join actor a on a.idactor=ap.idactor";
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
    $actor_pelicula= actor_pelicula::getAll();

    if ($actor_pelicula) {

        $datos["actor_pelicula"] = $actor_pelicula;

        print json_encode($datos);
    } else {
        print json_encode(array(
             "mensaje" => "Ha ocurrido un error"
        ));
    }
    
}