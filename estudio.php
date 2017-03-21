<?php

require 'Database.php';

class estudio
{
    function __construct()
    {
    }
    public static function getAll()
    {
        $consulta = "SELECT * FROM estudio";
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
    $estudio= estudio::getAll();

    if ($estudio) {

        $datos["estudio"] = $estudio;

        print json_encode($datos);
    } else {
        print json_encode(array(
                   "mensaje" => "Ha ocurrido un error"
        ));
    }
    
}