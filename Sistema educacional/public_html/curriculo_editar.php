<?php
require($_SERVER["DOCUMENT_ROOT"] . "/model/model.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/servico/servico.php");
require($_SERVER["DOCUMENT_ROOT"] . "/view/common/cabecalho.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuariohabilidade/curriculo.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario_especializacao.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuariohabilidade/especializacao.php");
session_start();
$resposta = "";
$curso_array = array();
$dados_usuario = array();
$especializacao = new Especializacao();
$especializacao_array = array();
$especializacao_array = $especializacao->listar();
$curriculo_array = array();
$usuarioEspecializacao = new UsuarioEspecializacao();
$curriculo = new Curriculo();
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
if (isset($_POST["editar"])) 
    {
        $curriculo = new Curriculo();
        $curriculo->setId_usuario($_POST["editar"]);
        $curriculo->validar($_POST);
        $curriculo->editar();
        $resposta = "Cadastro realizado com sucesso.";
    } 

if (isset($_POST["excluir"])) {
    $curriculo = new Curriculo();
    $curriculo->setId($_POST["excluir"]);
    $curriculo->remover();
}
?>


<?php require($_SERVER["DOCUMENT_ROOT"] . "/view/usuario/formulario_curriculo.php"); ?>

<?php require ($_SERVER['DOCUMENT_ROOT'] . "/view/common/rodape.php"); ?>
</body>
</html>
<script>
    function change_especializacao(element) {
        var selectPeso = element.parentNode.parentNode.getElementsByTagName("select")[0];
        if (element.checked) {
            selectPeso.disabled = false;
        } else {
            selectPeso.disabled = true;
            selectPeso.selectedIndex = 0;
        }
    }

</script>


