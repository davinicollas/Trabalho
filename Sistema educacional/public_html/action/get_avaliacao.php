<?php
require( $_SERVER["DOCUMENT_ROOT"] . "/model/model.php");
require( $_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario.php");
require( $_SERVER["DOCUMENT_ROOT"] . "/model/usuario/avaliacao.php");
$avaliacao = new Avaliacao();
$avaliacao->setId_usuario_avaliacao(filter_input(INPUT_POST,"id_usuario_avaliacao"));
$avaliacao->setId_usuario(filter_input(INPUT_POST,"id_usuario"));
$avaliacao->setNotaConfirma(filter_input(INPUT_POST,"notaConfirma"));

if($avaliacao->adicionar())
{
    echo json_encode(array("resposta" =>1));
}
else{
    echo json_encode(array("resposta" => 0));
    
}
