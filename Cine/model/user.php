<?php
class Usuario
{
    public $id;
    private $table_name = "admins";

    public $nome;
    public $email;
    public $senha;
    private $conn;
    private $db;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function create()
    {
        $sql = "INSERT INTO" . $this->table_name . " (nome, email, senha) VALUES (:nome,:email, :senha)";
        $stmt = $this->conn->prepare($sql);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);

        return $sql;

        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    public function read()
    {
        $sql = "SELECT * nome,email,senha FROM  usuarios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function update()
    {
        $sql = "UPDATE usuarios SET nome='$this->nome', email='$this->email', senha='$this->senha' WHERE id='$this->id'";
        $stmt = $this->conn->prepare($sql);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete()
    {

        $sql = "DELETE FROM  usuarios WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>;