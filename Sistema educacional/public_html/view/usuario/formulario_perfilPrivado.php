<?php require ($_SERVER["DOCUMENT_ROOT"] . "/view/common/menu.php"); ?>
<form method="post"  action="">
<h1  style="text-align: center">Perfil Privado</h1>
    <input type="hidden" class="form-control form-control-sm" name="id" value="<?php echo $_SESSION["idUser"]; ?>">
    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">
        <!-- The Grid -->
        <div class="w3-row-padding">
            <!-- Left Column -->
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="avatar_perfil" style="text-align: center">
                        <img src="<?php echo "http://sistemaeducacional.com.br/" . urldecode($dados_usuario["imagem"]); ?>"  class="foto-perfil" alt="Avatar">          

                    </div>
                    <p class="w3-large"><b><i class="fa-fw w3-margin-right w3-text-teal"></i>Avaliação do usuario</b></p>
                    <br>
                    <div class="w3-container">
                        <p style="text-align: left"><i id="email"class="fa fa-user-circle fa-fw w3-margin-right w3-large w3-text-teal" ></i><?php echo $dados_usuario["nome"]; ?></p>	
                        <p style="text-align: left"><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo utf8_encode($dados_usuario["nome_curso"]); ?></p>
                        <p style="text-align: left"><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $dados_usuario["nome_cidade"]; ?></p>
                        <p style="text-align: left"> <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $dados_usuario["email"]; ?></p>
                        <hr>
                        <table border="3" class="table table-hover table-dark">
                            <h3>Tabela sobre as especialidade</h3>
                            <tr><td>Básico</td>
                            <td>1</td>
                            </tr>
                            <tr><td>Intermediario</td>
                            <td>2</td>
                            </tr>
                            <tr><td>Avançado</td>
                            <td>3</td>
                            </tr>
                        </table>
                        <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Principais habilidades</b></p>
                        <div id="myDIV">
                            <?php foreach ($dados_usuario["especializacoes"] as $especializacao): ?>
                                <p><?php echo utf8_encode($especializacao["especializacao_nome"]); ?></p>
                                <div class="w3-light-grey w3-round-xlarge w3-small">
                                    <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:<?php echo ($especializacao["peso"] * 33) + 1; ?>%"><?php echo $especializacao["peso"]; ?></div>
                                </div>
                                <br>
                            <?php endforeach; ?>
                        </div>
                        <a href="http://localhost/dashboard/tcc/curriculo_editar.php" class="glyphicon glyphicon-floppy-disk btn btn-warning">Editar</a> </span>
                        <p class="w3-large"><b><i class="fa fa-address-card-o fa-fw w3-margin-right w3-text-teal"></i>Curriculo</b></p>
                        <div id="myDIV">
                            <label style="text-align: left;" class="w3-text-teal">Nome da empresa</label>
                            <h3 style="text-align: left;"><?php echo $curriculo_array["nome"] ?></h3>
                            
                            <label style="text-align: left;" class="w3-text-teal">Nome do cargo</label>
                            <h3 style="text-align: left;"><?php echo $curriculo_array["cargo"] ?></h3>
                            <label style="text-align: left;" class="w3-text-teal">Data de inicio</label>
                            <h3 style="text-align: left;"><?php echo  $curriculo_array["data_inicio"] ?></h3>
                            <label style="text-align: left;"class="w3-text-teal">Data de terminio</label>
                            <h3 style="text-align: left;"><?php echo $curriculo_array["data_terminio"] ?></h3>                              
                        </div>
                        <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Avaliação do usuario</b></p>
                        <p>Orientador</p>
                        <div class="w3-light-grey w3-round-xlarge w3-small">
                            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:30%">30%</div>
                        </div>
                        <br>

                    </div>
                </div><br>

                <!-- End Left Column -->
            </div>
            <!-- Right Column -->
            <div class="w3-twothird">
                <div class="w3-container w3-card w3-white w3-margin-bottom">
                    <form class="form-inline">
                        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Informe sua ultima experiência na área de TI </h2>
                        <div class="w3-container">
                            <div class="col-sm-12">
                            <label class="w3-text-teal">Nome da empresa</label>
                            <input class="w3-input w3-border w3-light-grey" placeholder="Informe o nome da empresa." name="nome" id="nome">
                            <?php if(isset($array_erro["nome"])) {echo "<label style='color:#ff5555'>".$array_erro["nome"]."</label>";}?>
                            </div>
                            <div class="col-sm-12">
                            <label class="w3-text-teal">Cargo</label>
                            <input class="w3-input w3-border w3-light-grey" placeholder="Informe o cargo." name="cargo" id="cargo">
                            <?php if(isset($array_erro["cargo"])) {echo "<label style='color:#ff5555'>".$array_erro["cargo"]."</label>";}?>
                            </div>
                            <div class="col-sm-12">
                            <label class="w3-text-teal">Data de inicio</label>
                            <input type="date" class="w3-input w3-border w3-light-grey" placeholder="Data de inicio" name="data_inicio" id="data_inicio">
                            <?php if(isset($array_erro["data_inicio"])) {echo "<label style='color:#ff5555'>".$array_erro["data_inicio"]."</label>";}?>
                            </div>
                            <div class="col-sm-12">
                            <label class="w3-text-teal">Data de terminio</label>
                            <input type="date" class="w3-input w3-border w3-light-grey" placeholder="Data de terminio" name="data_terminio" id="data_terminio">
                             <?php if(isset($array_erro["data_terminio"])) {echo "<label style='color:#ff5555'>".$array_erro["data_terminio"]."</label>";}?>
                             <br>
                            </div>
                           
                        </div>
                    </form>
                </div>
                <br>

                <div class="w3-container w3-card w3-white">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Informe sua principal especialidade</h2>
                    <div class="w3-row">
                        <?php foreach ($especializacao_array as $especializacao): ?>
                            <div class="w3-col m12">
                                    <label class="w3-col m5" style="text-align:left"><input onchange="change_especializacao(this)" type="checkbox" value="<?php echo $especializacao ["id"]; ?>"name="especializacao[]"> <?php echo utf8_encode($especializacao["nome"]); ?></label>
                                <label class="w3-col m7" style="text-align:left">Peso: 
                                    <select type="text" name="peso[]" disabled>
                                        <option value="0">Selecione o peso</option>
                                        <option value="1">Básico</option>
                                        <option value="2">Intermediário</option>
                                        <option value="3">Avançado</option>
                                    </select>
                                </label>

                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>

                <input type="submit" name="submit" value="Cadastrar curriculo" class="w3-btn w3-blue-grey">

            </div>



        </div>

      
    </div>
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
</form>