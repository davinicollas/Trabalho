<?php 
ob_start();
session_start();
require($_SERVER["DOCUMENT_ROOT"] . "/model/model.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario.php");
require ($_SERVER["DOCUMENT_ROOT"]."/view/common/cabecalho.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/localidade/cidade.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/localidade/estado.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuariohabilidade/curso.php");
$resposta="";
$estados_array = array();
$curso_array = array();
$cidade_array= array();
$cidade= new Cidade();
$estado=new Estado();
$curso=new Curso();
$dados_usuario = array();
if (!isset($_SESSION['idUser'])) {
    header("location: login.php");
    session_destroy();
}else{
    $user = new Usuario();
    $user->setId($_SESSION['idUser']);
    $dados_usuario = $user->buscar();
    $estados_array = $estado->listar();
    $curso_array=$curso->listar();
    $cidade_array=$cidade->listar($dados_usuario["id_estado"]);
}
if (isset($_POST["submit"])) {
        $usuario = new Usuario();
     if ($usuario->validar($_POST)) {
        $usuario->setId($_SESSION['idUser']);
        $pathimage = $usuario->uploadImagem($_FILES["imagem"]);
        $usuario->setImagem($pathimage);
        $usuario->editar();
        $resposta="Editado com sucesso!";
    } else{
        $resposta= "Erro de edição"; 
}
}
?>


    <?php require($_SERVER["DOCUMENT_ROOT"] . "/view/usuario/formulario_editar.php"); ?>
   
    <?php require ($_SERVER['DOCUMENT_ROOT']."/view/common/rodape.php");?>
</body>
</html>
<script>
   function getCidades(element) {
        $.ajax({
            url: 'action/get_cidades.php?id_estado=' + element.value,
            dataType: 'json',
            beforeSend: function () {
                document.getElementById('id01').style.display='block';
            },
            complete: function () {},
            success: function (json) {
              document.getElementById('id01').style.display='none';
                if (json["cidades"]) {

                    var selectCidade = document.getElementById("cidade");
                    selectCidade.innerHTML = "";
                    for (var i = 0; i < json["cidades"].length; i++) {
                        if(json["cidades"][i]["id"] === "<?php echo $dados_usuario['id_cidade']?>"){
                            selectCidade.innerHTML += "<option selected value='" + json["cidades"][i]["id"] + "'>" + json["cidades"][i]["nome"] + "</option>";
                        }else{
                            selectCidade.innerHTML += "<option value='" + json["cidades"][i]["id"] + "'>" + json["cidades"][i]["nome"] + "</option>";
                        }
                        
                    }
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
    

</script>


