<?php
class Database
{
    private $host = "localhost";
    private $username = "@"; // Coloque o seu username do banco de dados
    private $password = "1234"; // Coloque a sua senha do banco de dados
    private $db_name = "cinedata"; // O nome do seu banco de dados
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
