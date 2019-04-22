<?php
require( $_SERVER["DOCUMENT_ROOT"] . "/model/model.php");
require( $_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario.php");
require( $_SERVER["DOCUMENT_ROOT"] . "/model/localidade/estado.php");
require( $_SERVER["DOCUMENT_ROOT"] . "/model/localidade/cidade.php");
$cidade = new Cidade();
$cidades_array = $cidade->listar(filter_input(INPUT_GET, "id_estado", FILTER_SANITIZE_NUMBER_INT));
echo json_encode(array("cidades" => $cidades_array));
?>