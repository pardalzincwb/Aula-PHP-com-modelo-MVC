<?php
require_once __DIR__ . '/model/Produto.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/controller/ProdutoController.php';

$action = $_GET['action'] ?? 'index';

$controller = new ProdutoController();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Produtos - MVC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="main-header">
        <h1>Sistema de Produtos MVC</h1>
    </header>
    
    <main class="main-content">
        <?php
        if ($action === 'cadastrar') {
            $controller->cadastrar();
        } else {
            $controller->index();
        }
        ?>
    </main>
</body>
</html>