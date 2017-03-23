<?php

require 'Database.php';

class horario_sala
{
    function __construct()
    {
    }
    public static function getAll()
    {
        $consulta = "SELECT * FROM horario_sala";
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
    $horario_sala= horario_sala::getAll();

    if ($horario_sala) {

        $datos["horario_sala"] = $horario_sala;

        print json_encode($datos);
    } else {
        print json_encode(array(
             "mensaje" => "Ha ocurrido un error"
        ));
    }
    
}