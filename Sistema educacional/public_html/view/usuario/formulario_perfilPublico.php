<?php require ($_SERVER["DOCUMENT_ROOT"] . "/view/common/menu.php"); ?>
<h1  style="text-align: center">Perfil do usuario <?php echo $dados_usuario["nome"];?></h1>
    <input type="hidden" class="form-control form-control-sm" name="id" value="<?php echo $_GET["id_usuario"]; ?>">
    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">
        <!-- The Grid -->
        <div class="w3-row-padding">
            <!-- Left Column -->
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="avatar_perfil" style="text-align: center">
                        <img src="<?php echo "http://sistemaeducacional.com.br/" . urldecode($dados_usuario["imagem"]); ?>"  class="foto-perfil" alt="Avatar">          
                    <form  method="post" enctype="multipart/form-data">
                     <div class="stars">
                         <input type="hidden" id="idusuario" value="<?php echo $_GET["id_usuario"] ?>">
                         <input class="star star-5" id="star-5" type="radio" value="5"name="notaConfirma"/>
                         <label class="star star-5" for="star-5"></label>
                         <input class="star star-4" id="star-4" type="radio" value="4"name="notaConfirma"/>
                         <label class="star star-4" for="star-4"></label>
                         <input class="star star-3" id="star-3" type="radio" value="3"name="notaConfirma"/>
                         <label class="star star-3" for="star-3"></label>
                         <input class="star star-2" id="star-2" type="radio" value="2"name="notaConfirma"/>
                         <label class="star star-2" for="star-2"></label>
                         <input class="star star-1" id="star-1" type="radio" value="1"name="notaConfirma"/>
                         <label class="star star-1" for="star-1"></label>
                         <button class="p-3" onclick="getAvaliacao()"type="button" id="buttonavaliar" name="avaliar">Avaliar</button>
                    </div>
                    </form>

                    </div>
                    <div class="w3-container">
                         <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Avaliação do usuario</b></p>
                        <p>Total de avaliação recebida=<?php echo $total?> </p>
                        <p style="text-align: left"><i id="email"class="fa fa-user-circle fa-fw w3-margin-right w3-large w3-text-teal" ></i><?php echo $dados_usuario["nome"]; ?></p>	
                        <p style="text-align: left"><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo utf8_encode($dados_usuario["nome_curso"]); ?></p>
                        <p style="text-align: left"><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $dados_usuario["nome_cidade"]; ?></p>
                        <p style="text-align: left"> <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $dados_usuario["email"]; ?></p>
                        <hr>
                        <table border="3" class="table table-hover table-dark">
                          <h3 style="text-align: center">Tabelas dos Serviços</h3>
                            <tr><td>Aberto</td>
                            <td>1</td>
                            </tr>
                            <tr><td>Andamento</td>
                            <td>2</td>
                            </tr>
                            <tr><td>Conclusão</td>
                            <td>3</td>
                            </tr>
                        </table>
                        <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Principais habilidades</b></p>
                        <div id="myDIV">
                            <?php foreach ($dados_usuario["especializacoes"] as $especializacao): ?>
                                <p><?php echo  utf8_encode($especializacao["especializacao_nome"]) ?></p>
                                <div class="w3-light-grey w3-round-xlarge w3-small">
                                    <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:<?php echo ($especializacao["peso"] * 33) + 1; ?>%"><?php echo $especializacao["peso"]; ?></div>
                                </div>
                                <br>
                            <?php endforeach; ?>
                        </div>
                        <p class="w3-large"><b><i class="fa fa-address-card-o fa-fw w3-margin-right w3-text-teal"></i>Curriculo</b></p>
                        <div id="myDIV">
                            <label style="text-align: left;" class="w3-text-teal">Nome da empresa</label>
                            <h3 style="text-align: left;"><?php echo $curriculo_array["nome"] ?></h3>
                            <label style="text-align: left;" class="w3-text-teal">Nome do cargo</label>
                            <h3 style="text-align: left;"><?php echo $curriculo_array["cargo"] ?></h3>
                            <label style="text-align: left;" class="w3-text-teal">Data de inicio</label>
                            <h3 style="text-align: left;"><?php echo $curriculo_array["data_inicio"] ?></h3>
                            <label style="text-align: left;"class="w3-text-teal">Data de terminio</label>
                            <h3 style="text-align: left;"><?php echo $curriculo_array["data_terminio"] ?></h3> 

                        </div>
                       
                        <br>

                    </div>
                </div><br>

                <!-- End Left Column -->
            </div>
            <!-- Right Column -->
            <div class="w3-twothird">
                <?php foreach ($dados_usuario["servico"] as $servico): ?>
                    <form method="post">
                        <div class="w3-container w3-white w3-card w3-margin-bottom">
                            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Todos serviços cadastrado </h2>
                            <div class="w3-container">
                                <label class="w3-text-teal">Nome do serviço</label>
                                <label class="w3-input w3-border w3-light-grey"  name="nome" id="nome"><?php echo $servico ["nome"]; ?></label>
                            </div>
                            <div class="w3-container">
                                <label class="w3-text-teal">Descrição</label>
                                <label class="w3-input w3-border w3-light-grey"  placeholder="Informe descrição do serviço" name="descricao" id="descricao"><?php echo $servico ["descricao"]; ?></label>
                            </div>
                            <div class="w3-container">
                                <label class="w3-text-teal">Status</label>
                                <label class="w3-input w3-border w3-light-grey"  placeholder="status" name="descricao" id="descricao"><?php echo $servico ["status"]; ?></label>
                            </div>
                        </div>
                    </form>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <script>
    function getAvaliacao() {
        $.ajax({
            url: 'action/get_avaliacao.php',
            dataType: 'json',
            type: 'post',
            data:'notaConfirma='+$( "input:checked[name='notaConfirma']" ).val()+'&id_usuario='+<?php echo $_GET["id_usuario"]?>+'&id_usuario_avaliacao='+<?php echo $_SESSION["idUser"]?>,
            beforeSend: function () {
            },
            complete: function () {},
            success: function (json) {

                if(json["resposta"]===1){
                    alert("Usuario avaliado com sucesso");
                }
                else{
                    alert("Você ja avaliou esse usuario");
                }
                    
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
   
</script>