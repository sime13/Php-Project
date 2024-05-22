<?php
require_once '../config/database.php';
require_once '../model/movie.php';
class movieController
{
    private $db;
    private $movie;
    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->movie = new Movie($this->db);
    }

    public function index()
    {
        $stmt = $this->movie->read();
        $movie = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../view/movie.php';
        return $movie;
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->movie->title = $_POST['title'];
            $this->movie->descricao = $_POST['descricao'];
            $this->movie->genero = $_POST['genero'];
            $this->movie->imagem = $_POST['imagem'];
            $this->movie->video = $_POST['video'];

            if ($this->movie->create()) {
                header("Location: /view/index.php");
            } else {
                echo "Erro ao criar pessoa.";
            }
        } else {
            include '../views/movie/create.php';
        }
    }

    public function edit($id)
    {
        $this->movie->id = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->movie->title = $_POST['title'];
            $this->movie->descricao = $_POST['descricao'];
            $this->movie->genero = $_POST['genero'];
            $this->movie->imagem = $_POST['imagem'];
            $this->movie->video = $_POST['video'];

            if ($this->movie->update()) {
                header("Location: /public/index.php");
            } else {
                echo "Erro ao atualizar pessoa.";
            }
        } else {
            $stmt = $this->movie->read();
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $movie = null;
            foreach ($movies as $p) {
                if ($p['id'] == $id) {
                    $movie = $p;
                    break;
                }
            }
            include '../views/movie/edit.php';
        }
    }

    public function delete($id)
    {
        $this->movie->id = $id;
        if ($this->movie->delete()) {
            header("Location: /public/index.php");
        } else {
            echo "Erro ao deletar pessoa.";
        }
    }
}



?>;