<?php
require_once '../config/database.php';

class Movie
{
    public $id;
    public $title;
    public $descricao;
    public $imagem;
    public $genero;
    public $video;
    private $conn;
    private $table_name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $sql = "INSERT INTO" . $this->table_name . " (id,title,descricao,imagem,genero,video) VALUES (:id,:title, :descricao,:imagem,:genero,:video)";
        $stmt = $this->conn->prepare($sql);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        $this->imagem = htmlspecialchars(strip_tags($this->imagem));
        $this->video = htmlspecialchars(strip_tags($this->video));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":imagem", $this->imagem);
        $stmt->bindParam(":genero", $this->genero);
        $stmt->bindParam(":video", $this->video);

        return $sql;

        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }

    public function read()
    {
        $sql = "SELECT * id,title,descricao,genero,imagem,video FROM movies";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function update()
    {
        $sql = "UPDATE admin SET title='$this->title', descricao='$this->descricao', genero='$this->genero', imagem='$this->imagem', video='$this->video' WHERE id='$this->id'";
        $stmt = $this->conn->prepare($sql);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        $this->imagem = htmlspecialchars(strip_tags($this->imagem));
        $this->video = htmlspecialchars(strip_tags($this->video));

        $stmt->bindParam(': title', $this->title);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':imagem', $this->imagem);
        $stmt->bindParam(':video', $this->video);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete()
    {

        $sql = "DELETE FROM movies WHERE id = :id";
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