<?php
ob_start();
session_start();
require($_SERVER["DOCUMENT_ROOT"] . "/model/model.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/usuario/usuario.php");
require($_SERVER["DOCUMENT_ROOT"] . "/model/servico/servico.php");
require ($_SERVER["DOCUMENT_ROOT"] . "/view/common/cabecalho.php");

$dados_infor = array();
$servico = new Servico();
$servico_array = $servico->listar();
?>
 <?php require($_SERVER["DOCUMENT_ROOT"] . "/view/common/menuPrincipal.php"); ?>
<h1 style="text-align: center">Lista de usuários interessados em trocar conhecimentos</h1>
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<form name="searchform" method="GET">
    <input type="text"  name="buscar"/>
    <input type="submit" value="Busca" />
</form>
<!-- !PAGE CONTENT! -->
<div class="w3-content w3-margin-top" style="max-width:100%;">
    <?php foreach ($servico_array as $item): ?> 
        <div class="card" style="width:11rem; margin-left:8rem; padding: 1%; background: #FFFFE0; margin-bottom: 1%">
            <img style="width:40%;max-width:40%;" src="http://sistemaeducacional.com.br/<?php echo $item["imagem"] ?>">
            <div class="card-body">
                <h5 class="card-title"><div style=" text-transform: uppercase;"><a href="/perfilPublico.php?id_usuario=<?php echo $item["id_usuario"] ?>"><?php echo $item["nome_usuario"] ?></a></h5></div>
                <h3 class="card-title"><a href="/perfilPublico.php?id_usuario=<?php echo $item["id_usuario"] ?>"><?php echo $item["nome"] ?></a></h3>
                <p class="card-text"><a href="/perfilPublico.php?id_usuario=<?php echo $item["id_usuario"] ?>"><?php echo $item["descricao"] ?></a></p>
                <p class="card-text"><a href="/perfilPublico.php?id_usuario=<?php echo $item["id_usuario"] ?>"<?php echo $item["data"] ?></a></p>
                <p classe="card-text"><a href="/perfilPublico.php?id_usuario=<?php echo $item["id_usuario"] ?>"<?php echo $item["status"]?></a></p>
                <a href="/perfilPublico.php?id_usuario=<?php echo $item["id_usuario"] ?>" class="btn btn-primary" role="button">Visitar Perfil</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Pagination -->
<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display = 'none'">
    <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption"></p>
    </div>
</div>
</div>
</body>
<script>
    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }

    // Modal Image Gallery
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        var captionText = document.getElementById("caption");
        captionText.innerHTML = element.alt;
    }
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1});
        });
    }));
</script>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/view/common/rodape.php"); ?>
</html>

