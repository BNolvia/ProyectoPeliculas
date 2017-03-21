<?php

require 'Database.php';

class sala_cine
{
    function __construct()
    {
    }
    public static function getAll()
    {
        $consulta = "SELECT * FROM sala_cine";
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
    $sala_cine= sala_cine::getAll();

    if ($sala_cine) {

        $datos["sala_cine"] = $sala_cine;

        print json_encode($datos);
    } else {
        print json_encode(array(
             "mensaje" => "Ha ocurrido un error"
        ));
    }
    
}