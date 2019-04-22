<?php
ob_start();
session_start();
require($_SERVER["DOCUMENT_ROOT"] . "/model/model.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuariohabilidade/especializacao.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuariohabilidade/curriculo.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario_especializacao.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/avaliacao.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/servico/servico.php");
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
$avaliacao_array= array();
$usuarioEspecializacao = new UsuarioEspecializacao();
if (!isset($_SESSION['idUser'])) {
    header("location: login.php");
    session_destroy();
} else {
    $usuario = new Usuario();
    if(isset($_GET["id_usuario"])){
        $usuario->setId($_GET["id_usuario"]);
        $dados_usuario = $usuario->buscar();
        $usuarioEspecializacao->setId_usuario($_GET["id_usuario"]);
        $dados_usuario["especializacoes"] = $usuarioEspecializacao->listar();
        $curriculo->setId_usuario($_GET["id_usuario"]);
        $curriculo_array=$curriculo->buscar();
        $dados_usuario["servico"] = array();
        $dados_usuario["servico"]=$usuario->listarServico();
        $avaliacao_array=$avaliacao->buscar();
        $total=$avaliacao->soma();
        require($_SERVER["DOCUMENT_ROOT"] . "/view/usuario/formulario_perfilPublico.php");
    }else{
        $usuario = new Usuario();
        $usuario->setId($_SESSION["idUser"]);
        $dados_usuario = $usuario->buscar();
        $usuarioEspecializacao->setId_usuario($_SESSION['idUser']);
        $dados_usuario["especializacoes"] = $usuarioEspecializacao->listar();
        $curriculo->setId_usuario($_SESSION['idUser']);
        $curriculo_array=$curriculo->buscar();
        $dados_usuario["servico"]=$usuario->listarServico();
        $avaliacao_array=$avaliacao->buscar();
        require($_SERVER["DOCUMENT_ROOT"] . "/view/usuario/formulario_perfilPrivado.php");
    } 
    
}
?>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/view/common/rodape.php"); ?>
</body>
</html>
