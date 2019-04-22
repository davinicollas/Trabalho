<?php require ($_SERVER["DOCUMENT_ROOT"]."/view/common/menuServico.php");?>
<h1  style="text-align: center">Cadastro de serviço</h1>
    <input type="hidden" class="form-control form-control-sm" name="id" value="<?php echo $_SESSION["idUser"]; ?>">
    
<form method="post"> 
    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">
        <!-- The Grid -->
        <div class="w3-row-padding">
            <!-- Left Column -->
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="avatar_perfil" style="text-align: center;">
                        <img src="<?php echo "http://sistemaeducacional.com.br/" . urldecode($dados_usuario["imagem"]); ?>"  class="foto-perfil" alt="Avatar">
                    </div>
                    <div class="w3-container">
                        <p style="text-align: left"><i id="email"class="fa fa-user-circle fa-fw w3-margin-right w3-large w3-text-teal" ></i><?php echo $dados_usuario["nome"]; ?></p>	
                        <p style="text-align: left"><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i> <?php echo utf8_encode($dados_usuario["nome_curso"]);?></p>
                        <p style="text-align: left"><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo utf8_encode( $dados_usuario["nome_cidade"]); ?></p>
                        <p style="text-align: left"> <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $dados_usuario["email"]; ?></p>
                        <br>
                    </div>
                </div><br>

            </div>
            <div class="w3-twothird">
                <div class="w3-container w3-white w3-card w3-margin-bottom">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Cadastra-se um serviço </h2>
                    <div class="w3-container">
                        <label class="w3-text-teal">Nome do serviço</label>
                        <input class="w3-input w3-border w3-light-grey"  placeholder="Informe o nome do serviço" name="nome" id="nome">
                                     <?php if(isset($array_erro["nome"])) {echo "<label style='color:#FF0000'>".$array_erro["nome"]."</label>";}?>

                    </div>
                    <div class="w3-container">
                        <label class="w3-text-teal">Descrição</label>
                        <input class="w3-input w3-border w3-light-grey"  placeholder="Informe descrição do serviço" name="descricao" id="descricao">
                                     <?php if(isset($array_erro["descricao"])) {echo "<label style='color:#FF0000'>".$array_erro["descricao"]."</label>";}?>

                    </div>
                     <div class="w3-container">
                         <label for="sel1" class="w3-text-teal" >Status</label>
                        <select class="form-control" type="text" name="status" >
                            <option value="0">Selecione a opção </option>
                            <option value="1">Aberto</option>
                            <option value="2">Em andamento</option>
                            <option value="3">Conclusão</option>
                        </select>
                        <br>
                    </div>
                     
                    <input type="submit" name="submit" value="Cadastrar Serviço" class="w3-btn w3-blue-grey">
                </div>

            </div>
        </div>
    </div>

</div>
</form>
    


    