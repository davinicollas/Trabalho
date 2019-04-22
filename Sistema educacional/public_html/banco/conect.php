<?php
class Connection{
    private $servername = "localhost";
    private $username = "davi";
    private $password = "123mudar";
    private $database = "davi_tcc";
    private $conn;

    // Create connection
    public function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

}
