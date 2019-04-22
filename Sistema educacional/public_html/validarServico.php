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
$servico_array= array();
if (!isset($_SESSION['idUser'])) {
    header("location: login.php");
    session_destroy();
} else {
   $usuario = new Usuario();
   $usuario->setId($_SESSION['idUser']);
   $dados_usuario = $usuario->buscar();
}
if (isset($_POST["submit"])) {   
        $servico = new Servico();
        $array_erro=$servico->validar($_POST);
        if(empty($array_erro)){
        $servico->validar($_POST);
        $servico->setId_usuario($_SESSION["idUser"]);
        $servico->adicionar();
        $resposta = "Cadastro realizado com sucesso.";
    }
}

require($_SERVER["DOCUMENT_ROOT"] . "/view/usuario/formulario_servico.php");
require($_SERVER["DOCUMENT_ROOT"] . "/view/common/rodape.php");
?>
