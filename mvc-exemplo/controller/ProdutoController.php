<?php

require_once __DIR__ . '/../model/Produto.php';

class ProdutoController {
    
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $mensagem = $_SESSION['flash_mensagem'] ?? '';
        $sucesso = $_SESSION['flash_sucesso'] ?? true;
        
        unset($_SESSION['flash_mensagem'], $_SESSION['flash_sucesso']);

        $produtos = Produto::listarTodos();
        
        require_once __DIR__ . '/../view/form_produto.php';
        require_once __DIR__ . '/../view/lista_produtos.php';
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $nome = trim($_POST['nome'] ?? '');
            $preco = isset($_POST['preco']) ? (float)$_POST['preco'] : 0.0;

            if (empty($nome)) {
                $_SESSION['flash_mensagem'] = "O nome do produto é obrigatório.";
                $_SESSION['flash_sucesso'] = false;
                header("Location: index.php");
                exit;
            }

            try {
                $novoProduto = new Produto($nome, $preco);
                Produto::salvar($novoProduto);

                $_SESSION['flash_mensagem'] = "Produto '{$nome}' cadastrado com sucesso!";
                $_SESSION['flash_sucesso'] = true;
            } catch (InvalidArgumentException $e) {
                $_SESSION['flash_mensagem'] = $e->getMessage();
                $_SESSION['flash_sucesso'] = false;
            }
        }
        
        header("Location: index.php");
        exit;
    }
}
