<?php 
ob_start();
session_start();
require($_SERVER["DOCUMENT_ROOT"] . "/model/model.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuariohabilidade/curso.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/localidade/cidade.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/localidade/estado.php");
require($_SERVER['DOCUMENT_ROOT']."/view/common/cabecalho.php");
if(isset($_SESSION["user"])){
    header("location:perfil.php");
    die();  
}
$estados_array = array();
$curso_array = array();
$estado = new Estado();
$curso = new Curso();
$estados_array = $estado->listar();
$curso_array =$curso->listar();
if (isset($_POST["submit"])) {
    $usuario = new Usuario();
    $array_erro=$usuario->validar($_POST);
    if (empty($arry_erro)) {
        $pathimage = $usuario->uploadImagem($_FILES["imagem"]);
        echo $pathimage;
        $usuario->setImagem($pathimage);
        $usuario->adicionar();
        echo"cadastrado com sucesso";
       
    } else{
        echo"Erro ao cadastrar";
    }
}

?>


    <?php require($_SERVER["DOCUMENT_ROOT"] . "/view/usuario/formulario_cadastro.php"); ?>
   
 

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
                        selectCidade.innerHTML += "<option value='" + json["cidades"][i]["id"] + "'>" + json["cidades"][i]["nome"] + "</option>";
                    }
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
 
</script>




