<?php require ($_SERVER["DOCUMENT_ROOT"]."/view/common/menu_1.php");?>
<h1 style="text-align: center">Tela de cadastro</h1>
<!-- The Grid -->
    <form method="post" style=" text-align: center"class="form-horizontal"action="registro.php" name="m_formulario"enctype="multipart/form-data">
        <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Informe seu Nome">
                 <?php if(isset($array_erro["nome"])) {echo "<label style='color:#ff5555'>".$array_erro["nome"]."</label>";}?>

            </div>           
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Informe seu Email">
               <?php if(isset($array_erro["email"])) {echo "<label style='color:#ff5555'>".$array_erro["email"]."</label>";}?>

            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Estados</label>
            <div class="col-sm-8">
                <select name="id_estado"  class="form-control form-control-sm" required onchange=" getCidades(this)" id="id_estado">
                    <option value="">Selecione um estado</option>
                            <?php foreach ($estados_array as $estado): ?>
                        <option <?php
                        if (!empty($estado) && $estado["id"] == $estado["id"])?> value="<?php echo $estado ["id"]; ?>">
    <?php echo utf8_encode($estado["nome"]); ?>
                        </option>
<?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Cidade</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" required name="id_cidade" id="cidade" placeholder="Informe sua Cidade">
                    <option value="" selected="select" > Para selecionar a cidade informe o estado</option>
<?php foreach ($cidades_array as $cidade): ?>
                        <option value="<?php echo $cidade ["id"]; ?>"><?php echo utf8_encode($cidade["nome"]); ?>
                        </option>
<?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Curso</label>
            <div class="col-sm-8">
                <select name="id_curso"  required class="form-control form-control-sm" placeholder="Informe seu curso" id="curso">
                    <option value="" selected="selected">Selecione um curso</option>
                    <?php foreach ($curso_array as $curso): ?>
                        <option <?php
                    if (!empty($curso) && $curso["id"] == $curso["id"])?> value="<?php echo $curso ["id"]; ?>">
    <?php echo utf8_encode($curso["nome"]); ?>
                        </option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Data de nascimento</label>
            <div class="col-sm-2">
                <input type="date" class="form-control form-control-sm" name="data_nascimento" id="data">
                 <?php if(isset($array_erro["data_nascimento"])) {echo "<label style='color:#ff5555'>".$array_erro["data_nascimento"]."</label>";}?>
            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-8">
                <input type="password" class="form-control form-control-sm" name="senha" id="senha" placeholder="Informe sua senha">
                 <?php if(isset($array_erro["senha"])) {echo "<label style='color:#ff5555'>".$array_erro["senha"]."</label>";}?>
            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Confirme sua senha</label>
            <div class="col-sm-8">
                <input type="password" class="form-control form-control-sm" name="consenha" id="consenha" placeholder="confirme sua senha">
            <?php if(isset($array_erro["consenha"])) {echo "<label style='color:#ff5555'>".$array_erro["consenha"]."</label>";}?>
            </div>
        </div>

        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Imagem de perfil</label>
            <input class="form-control-file" name="imagem" type="file">
        </div>


        <input type="submit" name="submit" value="criar" class="btn btn-success">
    </form>
    <div id="id01" class="w3-modal" >
        <div class="w3-modal-content" style="width:200px; padding: 15px">
            <div class="w3-container" >
                <span onclick="document.getElementById('id01').style.display = 'none'" 
                class="w3-button w3-display-topright">&times;</span>
                <div class="loader"></div>
                <p>Buscando cidades ...</p>
            </div>
        </div>
    </div>
</div>





