<?php
ob_start();
session_start();
require($_SERVER["DOCUMENT_ROOT"] . "/model/model.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/servico/servico.php");
require($_SERVER["DOCUMENT_ROOT"] . "/view/common/cabecalho.php");
$usuario = new Usuario();
$dados_usuario = array();
$servico= new servico();
$dados_usuario["servico"] = array();
if (!isset($_SESSION['idUser'])) {
    header("location: login.php");
    session_destroy();
} else {
   $usuario = new Usuario();
   $usuario->setId($_SESSION['idUser']);
   $dados_usuario = $usuario->buscar();
   $dados_usuario["servico"] = array();
   $dados_usuario["servico"]=$usuario->listarServico();
}
if(isset($_POST["editar"])){
        $servico = new Servico();
        $servico->validar($_POST);
        $servico->setId($_POST['editar']);
        $servico->editar();
}
if(isset($_POST["excluir"])){
        $servico = new Servico();
        $servico->setId($_POST['excluir']);
        $servico->remover();
}
require($_SERVER["DOCUMENT_ROOT"] . "/view/usuario/formulario_listar.php");
?>

