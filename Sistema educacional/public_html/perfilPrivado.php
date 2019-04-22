<?php
ob_start();
session_start();
require($_SERVER["DOCUMENT_ROOT"] . "/model/model.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuariohabilidade/especializacao.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuariohabilidade/curriculo.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario_especializacao.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/avaliacao.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuariohabilidade/curso.php");
require($_SERVER["DOCUMENT_ROOT"] . "/view/common/cabecalho.php");
$resposta="";
$dados_usuario = array();
$especializacao_array = array();
$usuario = new Usuario();
$avaliacao = new Avaliacao();
$curriculo=new Curriculo();
$curriculo_array= array();
$especializacao = new Especializacao();
$usuarioEspecializacao = new UsuarioEspecializacao();
$especializacao_array = $especializacao->listar();
if (!isset($_SESSION['idUser'])) {
    header("location: login.php");
    session_destroy();
} else {
   $usuario = new Usuario();
   $usuario->setId($_SESSION['idUser']);
   $usuarioEspecializacao->setId_usuario($_SESSION['idUser']);
   $dados_usuario = $usuario->buscar();
   $dados_usuario["especializacoes"] = $usuarioEspecializacao->listar();
   $curriculo->setId_usuario($_SESSION['idUser']);
   $curriculo_array=$curriculo->buscar();
   
}
if (isset($_POST["submit"])) {   
        $curriculo = new Curriculo();
        $array_erro=$curriculo->validar($_POST);
if (empty($arry_erro)) {
        $curriculo->validar($_POST);
        $curriculo->setId_usuario($_SESSION["idUser"]);
        $curriculo->adicionar();
        $resposta = "Cadastro realizado com sucesso.";
    } 
}

if (isset($_POST["submit"])) {
    for ($i = 0; $i < count($_POST["especializacao"]); $i++) {
        $usuarioEspecializacao->setId_usuario($_SESSION["idUser"]);
        $usuarioEspecializacao->setId_especializacao($_POST["especializacao"][$i]);
        $usuarioEspecializacao->setPeso($_POST["peso"][$i]);
        $usuarioEspecializacao->adiconar();
        $resposta ="Cadastrado com sucesso"; 
    }
}
?>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/view/usuario/formulario_perfilPrivado.php");?>
<?php
    $usuario = new Usuario();
    if(isset($_GET["id_usuario"])){
        $usuario->setId($_GET["id_usuario"]);
        $dados_usuario = $usuario->buscar();
        require($_SERVER["DOCUMENT_ROOT"] . "/view/usuario/perfilPublico.php");
    }else{
        $usuario = new Usuario();
        $usuario->setId($_SESSION["idUser"]);
        $dados_usuario = $usuario->buscar();

    } 
?>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/view/common/rodape.php"); ?>
</body>
</html>
