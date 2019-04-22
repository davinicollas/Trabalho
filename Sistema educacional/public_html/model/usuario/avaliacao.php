<?php
class Avaliacao extends Model {
    private $id;
    private $id_usuario;
    private $notaConfirma;
    private $data;
    private $id_usuario_avaliacao;
    public function __construct() {
        parent::__construct();
    }      
    public function adicionar() {
            //função onde verifica se existe email se caso existir nao cadastra, se existi exibe erro.
        if(count($this->buscarPorIdUsuarioAvaliacao()) > 0){
            
            return;
        } 
        $valid = $this->queryRow("SELECT * FROM avaliacao WHERE id_usuario = '" . $this->id_usuario . "' AND id_usuario_avaliacao = '" . $this->id_usuario_avaliacao . "'");
        return $this->query("INSERT INTO avaliacao (id_usuario,notaConfirma,data,id_usuario_avaliacao) VALUES ('".$this->id_usuario."','".$this->notaConfirma."','".date('Y/m/d')."','".$this->id_usuario_avaliacao."')");
    }
    
   public function buscarPorIdUsuarioAvaliacao() { 
    return $this->queryRow("SELECT * FROM avaliacao WHERE id_usuario_avaliacao='".$this->id_usuario_avaliacao."'");
   }
    
    //função de editar perfil//
    //função de delete//
    public function remover() {
        return $this->query("DELETE FROM avaliacao WHERE id= '".$this->id."'");
        
    }
    //função que recupera dados pelo id//
    public function buscar() { 
    return $this->queryRow("SELECT avaliacao.*, usuario.nome AS nome_usuario FROM usuario INNER JOIN avaliacao ON avaliacao.id_usuario = usuario.id WHERE usuario.id='".$this->id_usuario."'");
        }   
    public function soma(){
      return $this->queryRows("SELECT  sum(notaConfirma) FROM avaliacao WHERE id_usuario='" .$this->id_usuario."'");
    }
        
       function validar ($row){
            $array_erro = array();
        if (isset($row["notaConfirma"])){
            $this->notaConfirma = filter_var($row["notaConfirma"], FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            $array_erro["notaConfirma"] = "Informe a notaConfirma.";
        }
       
            return $array_erro;
       }
       function getId() {
           return $this->id;
       }

       function getId_usuario() {
           return $this->id_usuario;
       }

       function getNotaConfirma() {
           return $this->notaConfirma;
       }

       function getData() {
           return $this->data;
       }

       function setId($id) {
           $this->id = $id;
       }

       function setId_usuario($id_usuario) {
           $this->id_usuario = $id_usuario;
       }

       function setNotaConfirma($notaConfirma) {
           $this->notaConfirma = $notaConfirma;
       }

       function setData($data) {
           $this->data = $data;
       }
       function getId_usuario_avaliacao() {
           return $this->id_usuario_avaliacao;
       }

       function setId_usuario_avaliacao($id_usuario_avaliacao) {
           $this->id_usuario_avaliacao = $id_usuario_avaliacao;
       }


      

}

    