<?php
class UsuarioEspecializacao extends Model{
    private $id;    
    private $id_usuario; 
    private$id_especializacao; 
    private $peso;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function adiconar(){
        $valid= $this->queryRow("SELECT * FROM usuario_especializacao WHERE id_especializacao = '" . $this->id_especializacao . "' AND id_usuario= '" . $this->id_usuario . "'");
        if(empty($valid)){
       return $this->query("INSERT INTO usuario_especializacao (id, id_usuario,id_especializacao ,peso) VALUES ('".$this->id."','".$this->id_usuario."', '".$this->id_especializacao."', '".$this->peso."')");                      
        }else{
            echo 'Ja possui a especializacao cadastrada';
        }
    }
       public function editar() {
        return $this->query("UPDATE usuario_especializacao SET id= '" . $this->id . "', id_usuario = '" . $this->id_usuario . "',id_especializacao = '" . $this->id_especializacao . "',peso = '" . $this->peso . "' WHERE  id= '" . $this->id . "'");
    }
     public function remover() {
        return $this->query("DELETE FROM usuario_especializacao WHERE id= '" . $this->id . "'");
    }
    //função que recupera dados pelo id//
    public function buscar() {
        return $this->queryRow("SELECT id, id_usuario,id_especializacao, peso FROM usuario_especializacao WHERE id = '" . $this->id . "'");
    }
    
    public function listar() {
        return $this->queryRows("SELECT usuario_especializacao.*, usuario.nome AS nome_usuario, especializacao.nome AS especializacao_nome FROM usuario_especializacao "
                . "INNER JOIN usuario ON usuario.id = usuario_especializacao.id_usuario "
                . "INNER JOIN especializacao ON especializacao.id = usuario_especializacao.id_especializacao "
                . "WHERE usuario_especializacao.id_usuario = '" . $this->id_usuario . "'");
    }
            
    function getId() {
        return $this->id;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_especializacao() {
        return $this->id_especializacao;
    }

    function getPeso() {
        return $this->peso;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_especializacao($id_especializacao) {
        $this->id_especializacao = $id_especializacao;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }


}

