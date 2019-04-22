<?php
require($_SERVER["DOCUMENT_ROOT"] . "/banco/conect.php");

class Model{
  /*
  	É o seguinte, essa classe comunica com a classe de conexão. Sendo assim,
	você não precisa repetir código. A progrmação sai mais rápido.
	Para usar essa classe, vc tem de ter outras classes que irão herdar dela. 
	Exemplo: Usuário faz login. Sendo assim fica:
	class Usuario extends Model{}
	Aí as classe que herdam dessa vão utilizar seus métodos. 
  */
  private $conn;// Atributo que irá manipular a conexão
  private  $data;// Atributo que irá receber os dados do banco
  //construtor
  public function __construct() {
        $this->conn = new Connection(); // Aqui se instancia uma Connection
        $this->data = array(); // Esse é o array usado para pegar os dados do banco
  }
  
  // Essa função é pra quando se seleciona várias linhas no banco
  protected function queryRows($sql){
        $this->conn->connect();
        $result = $this->conn->getConnection()->query($sql) or die 
            ("Erro ao realizar: <br>".$sql."<br>".$this->conn->getConnection()->error);
        $this->conn->getConnection()->close();
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){array_push($this->data, $row);}   
            return $this->data;
        }else{return array();}
    }
  
  // Essa função é pra quando se seleciona UMA LINHA APENAS no banco
  protected function queryRow($sql){
        $this->conn->connect();
        $result = $this->conn->getConnection()->query($sql) or die 
            ("Erro ao realizar: <br>".$sql."<br>".$this->conn->getConnection()->error);
        $this->conn->getConnection()->close();
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){return $row;}
        }else{return array();}
    }
  
  // Essa função é para quando vc vai, deletar, inserir, atualizar
  protected function query($sql){
        $this->conn->connect();
        $result = $this->conn->getConnection()->query($sql) or die 
            ("Erro ao realizar: <br>".$sql."<br>".$this->conn->getConnection()->error);
        $this->conn->getConnection()->close();
        return $result;
    }
}