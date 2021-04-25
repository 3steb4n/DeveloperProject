<?php 
include("class.consultas.php");
$id = $_GET['id'];
$valor = $_GET['valor'];
print_r($id);
print_r($valor);
Actualizar_Oferta_Grupos($id, $valor);
header("location:Ofertas_Grupos.php");
?>