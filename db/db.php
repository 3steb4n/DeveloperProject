<?php
class Conectar{
    public function Conexion(){
        $server = "127.0.0.1";
        $dataBase = "proyecto";
        $userNameDataBase = "root";

        $connectDataBase = mysqli_connect($server, $userNameDataBase, "", $dataBase);

        if(!$connectDataBase){
            echo "Error al realizar la conexion con la base de datos - : \n" . mysqli_connect_error($connectDataBase);
        }  
        return $connectDataBase;
    }
}
?>