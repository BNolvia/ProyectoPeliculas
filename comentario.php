<?php

require 'Database.php';

class comentario
{
    function __construct()
    {
    }
    public static function getAll()
    {
        $consulta =  "select imagen,nombrepelicula,calificacion,nombreusuario,comentario,fecha from comentario ap
						inner join pelicula p on p.idpelicula=ap.idpelicula
						inner join usuario u on u.idusuario=ap.idusuario";
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
    $comentario= comentario::getAll();

    if ($comentario) {

        $datos["comentario"] = $comentario;

        print json_encode($datos);
    } else {
        print json_encode(array(
             "mensaje" => "Ha ocurrido un error"
        ));
    }
    
}