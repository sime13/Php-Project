<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/admin.php';

class admincontroller
{
    private $db;
    private $admin;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->admin = new Admin($this->db);
    }

    public function index()
    {
        $stmt = $this->admin->read();
        $admin = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../view/admin/admin.php';
        return $admin;
    }

    public function create()
    {
        echo "Método create() foi chamado."; // Adicione mensagens para verificar se o método está sendo chamado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->admin->nome = $_POST['nome'];
            $this->admin->email = $_POST['email'];
            $this->admin->senha = $_POST['senha'];

            var_dump($_POST); // Verifique os dados recebidos do formulário
            var_dump($this->admin); // Verifique os dados do objeto Admin antes de inserir no banco de dados

            if ($this->admin->create()) {
                echo "Administrador criado com sucesso."; // Adicione uma mensagem de sucesso para verificar se a inserção foi bem-sucedida
                header("Location: ../view/admin/create.php");
                exit;
            } else {
                echo "Erro ao criar administrador."; // Adicione uma mensagem de erro para verificar se houve falha na inserção
            }
        } else {
            include '../view/admin/create.php';
        }
    }

    public function edit($id)
    {
        $this->admin->id = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->admin->nome = $_POST['nome'];
            $this->admin->email = $_POST['email'];
            $this->admin->senha = $_POST['senha'];

            if ($this->admin->update()) {
                header("Location: /view/index.php");
                exit;
            } else {
                echo "Erro ao atualizar administrador.";
            }
        } else {
            $stmt = $this->admin->read();
            $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $admin = null;
            foreach ($admins as $p) {
                if ($p['id'] == $id) {
                    $admin = $p;
                    break;
                }
            }
            include '../view/edit.php';
        }
    }

    public function delete($id)
    {
        $this->admin->id = $id;
        if ($this->admin->delete()) {
            header("Location: /view/index.php");
            exit;
        } else {
            echo "Erro ao deletar administrador.";
        }
    }
}

// Código para tratar as ações (create, edit, delete)
if (isset($_GET['action'])) {
    $controller = new admincontroller();

    switch ($_GET['action']) {
        case 'create':
            $controller->create();
            break;
        case 'edit':
            if (isset($_GET['id'])) {
                $controller->edit($_GET['id']);
            }
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                $controller->delete($_GET['id']);
            }
            break;
        default:
            $controller->index();
            break;
    }
} else {
    $controller = new admincontroller();
    $controller->index();
}
?>
;