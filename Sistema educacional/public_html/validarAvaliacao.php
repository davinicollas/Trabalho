<?php
require($_SERVER["DOCUMENT_ROOT"] . "/model/model.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/avaliacao.php");
require($_SERVER["DOCUMENT_ROOT"] . "/view/common/cabecalho.php");
session_start();
$usuario = new Usuario();
$dados_usuario = array();
$avaliacao= new Avaliacao();
$avaliacao_array= array();
if (!isset($_SESSION['idUser'])) {
    header("location: login.php");
    session_destroy();
} else {
   $usuario = new Usuario();
   $usuario->setId($_SESSION['idUser']);
   $dados_usuario = $usuario->buscar();
}
if(!empty($_POST["submit"])){
        $avaliacao = new Avaliacao();       
        $avaliacao->setId_usuario($_SESSION["idUser"]);
        $avaliacao->adicionar();
        $resposta = "Avaliado Com sucesso";
        }else{
            echo 'erro';
        
        }
  ?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/view/common/rodape.php");?>
