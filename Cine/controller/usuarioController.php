<?php
require_once '../config/database.php';
require_once '../model/user.php';
class usuarioController
{
    private $db;
    private $user;
    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new Usuario($this->db);
    }

    public function index()
    {
        $stmt = $this->user->read();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../view/user.php';
        return $user;
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->user->nome = $_POST['name'];
            $this->user->email = $_POST['email'];
            $this->user->senha = $_POST['senha'];

            if ($this->user->create()) {
                header("Location: /view/index.php");
            } else {
                echo "Erro ao criar pessoa.";
            }
        } else {
            include '../views/user/create.php';
        }
    }

    public function edit($id)
    {
        $this->user->id = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->user->nome = $_POST['nome'];
            $this->user->email = $_POST['email'];
            $this->user->senha = $_POST['senha'];

            if ($this->user->update()) {
                header("Location: /public/index.php");
            } else {
                echo "Erro ao atualizar pessoa.";
            }
        } else {
            $stmt = $this->user->read();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $user = null;
            foreach ($users as $p) {
                if ($p['id'] == $id) {
                    $user = $p;
                    break;
                }
            }
            include '../views/user/edit.php';
        }
    }

    public function delete($id)
    {
        $this->user->id = $id;
        if ($this->user->delete()) {
            header("Location: /public/index.php");
        } else {
            echo "Erro ao deletar pessoa.";
        }
    }
}



?>;