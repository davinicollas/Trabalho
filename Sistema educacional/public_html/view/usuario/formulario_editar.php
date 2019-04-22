<h1 style="text-align: center">Tela de editar </h1>
<form method="post" class="form-horizontal"  enctype="multipart/form-data">
    <div class=" w3-text-grey">
        <div class="form-group">
            <input style="display:none" id="foto" name="imagem" type="file">
            <label for="foto">
                <div class="avatar_perfil" style="text-align: center">
                <img src="<?php echo "http://sistemaeducacional.com.br/". $dados_usuario["imagem"]; ?>"  class="foto-perfil" alt="Avatar">
                </div>  
            </label>
        </div> 
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="nome" id="nome" placeholder="Informe seu Nome" value="<?php
                if (!empty($dados_usuario)) { echo $dados_usuario["nome"];  }?>">
             <?php if(isset($array_erro["nome"])) {echo $array_erro["nome"];}?>

            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Informe seu Email" value="<?php
                if (!empty($dados_usuario)) {echo $dados_usuario["email"];}?>">
                                  <?php if(isset($array_erro["email"])) {echo $array_erro["email"];}?>

            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Estados</label>
            <div class="col-sm-8">
                <select name="id_estado"  class="form-control form-control-sm" required onchange=" getCidades(this)" id="estado" value="<?php
                if (!empty($dados_usuario)) {
                    echo utf8_encode($dados_usuario["nome_estado"]);
                }
                ?>">
                    <option value="">Selecione um estado</option>
                    <?php foreach ($estados_array as $estado): ?>
                        <option <?php
                        if (!empty($estado) && $dados_usuario["id_estado"] == $estado["id"]) {
                            echo "selected";
                        }
                        ?> value="<?php echo $estado ["id"]; ?>">
                        <?php echo $estado["nome"]; ?>
                        </option>
<?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Cidade</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" name="id_cidade" id="cidade" required placeholder="Informe sua Cidade">
                    <option value="" selected="select" > Para selecionar a cidade informe o estado</option>
                    <?php foreach ($cidade_array as $cidade): ?>
                        <option value="<?php echo $cidade ["id"]; ?>">
                        <option <?php
                        if (!empty($cidade) && $dados_usuario["id_cidade"] == $cidade["id"]) {
                            echo "selected";
                        }
                        ?> value="<?php echo $cidade ["id"]; ?>">
                        <?php echo utf8_encode($cidade["nome"]); ?>
                        </option>
<?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Curso</label>
            <div class="col-sm-8">
                <select name="id_curso"  class="form-control form-control-sm" required id="curso"> 
                    <option value="">Selecione um curso</option>
                    <?php foreach ($curso_array as $curso): ?>
                        <option <?php
                        if (!empty($curso) && $dados_usuario["id_curso"] == $curso["id"]) {
                            echo "selected";
                        }
                        ?> value="<?php echo $curso ["id"]; ?>">
                        <?php echo utf8_encode($curso["nome"]); ?>
                        </option>
<?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Data de nascimento</label>
            <div class="col-sm-2">
                <input type="date" class="form-control form-control-sm" required name="data_nascimento" id="data" value="<?php
                if (!empty($dados_usuario)) { echo $dados_usuario["data_nascimento"];}?>">
                                  <?php if(isset($array_erro["data_nascimento"])) {echo $array_erro["data_nascimento"];}?>

            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-8">
                <input type="password" class="form-control form-control-sm" name="senha"  id="senha" placeholder="Informe sua senha">
                                  <?php if(isset($array_erro["senha"])) {echo $array_erro["senha"];}?>

            </div>
        </div>
        <div class="form-group">
            <label for="colFormLabelSm" class="col-sm-2 control-label">Confirme sua senha</label>
            <div class="col-sm-8">
                <input type="password" class="form-control form-control-sm" name="consenha"  id="consenha" placeholder="confirme sua senha">
                              <?php if(isset($array_erro["consenha"])) {echo $array_erro["consenha"];}?>

            </div>
        </div>
    </div>


    <input type="submit" name="submit" value="Editar" class="btn btn-success">

    <a href="perfilPrivado.php" class="btn btn-success"type="button">Voltar</a>
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

