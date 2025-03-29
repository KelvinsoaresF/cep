<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'buscar.php';

$cep = "16201115"; // CEP de teste (São Paulo - SP)
$resultado = buscar($cep);

echo "<pre>";
print_r($resultado);
echo "</pre>";
?>
