
<?php
require( $_SERVER["DOCUMENT_ROOT"] . "/model/model.php");
require( $_SERVER["DOCUMENT_ROOT"] . "/view/common/cabecalho.php");
require( $_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario.php");
require( $_SERVER["DOCUMENT_ROOT"] . "/model/usuario_habilidade/curso.php");
$curso = new Curso();
$curso_array = $curso->listar(filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT));
echo json_encode(array("curso" => $curso_array));
?>