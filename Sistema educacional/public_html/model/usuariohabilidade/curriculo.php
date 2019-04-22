<?php

// igual cidades//
class Curriculo extends Model {

    private $id;
    private $nome;
    private $cargo;
    private $data_inicio;
    private $data_terminio;
    private $id_usuario;
    private $efetuado;
   
    public function __construct() {
        parent::__construct();
               
    }
        function validar ($row){
        $array_erro = array();
        if (isset($row["nome"])&& strlen($row["nome"]) >2) {
            $this->nome = filter_var($row["nome"], FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            $array_erro["nome"] = "Informe o nome da empresa.";
        }
        if (isset($row["cargo"])&& strlen($row["cargo"]) >2) {
            $this->cargo = filter_var($row["cargo"], FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            $array_erro["cargo"] = "O cargo é inválido.";          
        }
        if (isset($row["data_inicio"])) {
            $this->data_inicio = filter_var($row["data_inicio"], FILTER_SANITIZE_SPECIAL_CHARS);
            $data_inicio = $row["data_inicio"];
        } else {
            $array_erro["data_inicio"] = "Você deve informar a data de inicio.";           
        } 
         if (isset($row["data_terminio"])) {
            $this->data_terminio = filter_var($row["data_terminio"], FILTER_SANITIZE_SPECIAL_CHARS);
            $data_terminio = $row["data_terminio"];
        } else {    
            $array_erro["data_terminio"] = "Você deve informar a data de terminio.";           
        } 
        
        return $array_erro;
    }
    public function listar() {
     
        return $this->queryRows("SELECT * FROM curriculo ");
    }
     public function editar() {
        return $this->query("UPDATE curriculo SET nome='" . $this->nome . "' , cargo='" . $this->cargo . "' ,data_inicio=  '".$this->data_inicio."',data_terminio=  '".$this->data_terminio."'  WHERE  id= '" . $this->id . "'");
    }
    public function adicionar() {
           $valid=$this->queryRow("SELECT * FROM curriculo WHERE nome = '" . $this->nome . "' AND id_usuario='".$this->id_usuario."'");
            if(empty($valid)){  
        return $this->query("INSERT INTO curriculo (id_usuario,nome,cargo,data_inicio,data_terminio) VALUES ('".$this->id_usuario."','" . $this->nome . "','" . $this->cargo . "','" . $this->data_inicio . "','" . $this->data_terminio . "')");
         }   else{
        echo " Erro ao cadastrar ";
           }
        }
        
    
    //função de delete//
    public function remover() {
        return $this->query("DELETE FROM curriculo WHERE id= '" . $this->id . "'");
    }
    //função que recupera dados pelo id//
    public function buscar() {
  return $this->queryRow("SELECT curriculo.*, usuario.nome AS nome_usuario FROM usuario INNER JOIN curriculo ON curriculo.id_usuario = usuario.id WHERE usuario.id='".$this->id_usuario."'") ;       
        }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getData_terminio() {
        return $this->data_terminio;
    }

    function setId($id) {
        $this->id = $id;
    }
    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

        function setNome($nome) {
        $this->nome= $nome;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }


    function setData_terminio($data_terminio) {
        $this->data_terminio = $data_terminio;
    }
     function getData_inicio() {
        return $this->data_inicio;
    }

    function getEfetuado() {
        return $this->efetuado;
    }

    function setData_inicio($data_inicio) {
        $this->data_inicio = $data_inicio;
    }

    function setEfetuado($efetuado) {
        $this->efetuado = $efetuado;
    }

    
}
?>