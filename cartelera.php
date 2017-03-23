<?php

require 'Database.php';

class cartelera
{
    function __construct()
    {
    }
    public static function getAll()
    {
        $consulta = "select imagen,nombrepelicula,nombrecine,sala from cartelera a
		inner join cine c on c.idcine=a.idcine
		inner join sala s on s.idsala=a.idsala
     inner join pelicula p on p.idpelicula=a.idpelicula";
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
    $cartelera= cartelera::getAll();

    if ($cartelera) {

        $datos["cartelera"] = $cartelera;

        print json_encode($datos);
    } else {
        print json_encode(array(
             "mensaje" => "Ha ocurrido un error"
        ));
    }
    
}