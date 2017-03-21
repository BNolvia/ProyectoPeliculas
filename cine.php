<?php

require 'Database.php';

class cine
{
    function __construct()
    {
    }
    public static function getAll()
    {
        $consulta = "SELECT * FROM cine";
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
    $cine= cine::getAll();

    if ($cine) {

        $datos["estado"] = 1;
        $datos["cine"] = $cine;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
    
}