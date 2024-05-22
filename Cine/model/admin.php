<?php
require_once __DIR__ . '/../config/database.php';
class Admin
{
    private $conn;
    private $table_name = "admins";

    public $id;
    public $nome;
    public $email;
    public $senha;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        //$query = "INSERT INTO " . $this->table_name . " (nome, email, senha) VALUES (:nome, :email, :senha)";
        $query = "INSERT INTO admins (nome, email, senha) VALUES ('$this->nome','$this->email','$this->senha')";
        $stmt = $this->conn->prepare($query);

        // Sanitiza
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        // Vincula os valores
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);

        /* if ($stmt->execute()) {
            return true;
        }

        return false;*/
    }

    public function read()
    {
        $query = "SELECT id, nome, email, senha FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitiza
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Vincula os valores
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitiza
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Vincula o valor
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
