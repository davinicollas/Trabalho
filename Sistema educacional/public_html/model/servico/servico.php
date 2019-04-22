<?php
class Servico extends Model {
    private $id;
    private $id_usuario;
    private $data;
    private $descricao;
    private $nome;
    private $status;

    public function __construct() {
        parent::__construct();
    }

    public function listar() {
        $sql = "SELECT servico.*, usuario.imagem AS imagem, usuario.nome AS nome_usuario, servico.nome AS servico_nome FROM servico INNER JOIN usuario ON usuario.id = servico.id_usuario ";
        if (isset($_GET["buscar"])) {
            $sql .= "WHERE usuario.nome LIKE '%" . $_GET["buscar"] . "%' OR servico.descricao LIKE '%" . $_GET["buscar"] . "%';";
        }  //passa a variável como parâmetro na função queryRows 
        return $this->queryRows($sql);
    }

    public function adicionar() {//função onde verifica se existe email se caso existir nao cadastra, se existi exibe erro.
        return $this->query("INSERT INTO servico (id_usuario,nome,data,descricao,status) VALUES ('". $this->id_usuario ."','". $this->nome . "','" . date('Y/m/d') . "','" . $this->descricao . "','".$this->status."')");
    }

    //função de editar perfil//
    public function editar() {
        return $this->query("UPDATE servico SET nome='" . $this->nome . "' , descricao='" . $this->descricao . "' ,status=  '".$this->status."'  WHERE  id= '" . $this->id . "'");
    }

    //função de delete//
    public function remover() {
        return $this->query("DELETE FROM servico WHERE id= '" . $this->id . "'");
    }

    //função que recupera dados pelo id//
    public function buscar() {
        return $this->queryRow("SELECT servico.*, usuario.nome AS nome_usuario FROM servico INNER JOIN usuario ON servico.id_usuario = usuario.id WHERE usuario.id='" . $this->id_usuario."'");
    }

    public function validar($row) {
        $array_erro = array();
        if (isset($row["nome"]) && strlen($row["nome"])>2 ) {
            $this->nome = filter_var($row["nome"], FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            $array_erro["nome"] = "Informe o nome.";
        }
        if (isset($row["descricao"]) && strlen($row["descricao"])>2 ) {
            $this->descricao = filter_var($row["descricao"], FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            $array_erro["descricao"] = "Informe a descricao.";
        }
         if (isset($row["status"]) ) {
            $this->status = filter_var($row["status"], FILTER_SANITIZE_NUMBER_INT);
        } else {
            $array_erro["status"] = "status errado";
        }
        return $array_erro;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getData() {
        return $this->data;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setData($data) {
        $this->data = $data;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    function getId_especializacao() {
        return $this->id_especializacao;
    }
 function setStatus($status) {
        $this->status = $status;
    }
    function getStatus() {
        return $this->status;
    }
    function setId_especializacao($id_especializacao) {
        $this->id_especializacao = $id_especializacao;
    }


}
