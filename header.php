<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pratos</title>
    <link rel="stylesheet" href="/sistema-pratos/css/style.css">
</head>
<body>
    <header>
        <h1> Sistema de Pratos</h1>
        <nav>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="/sistema-pratos/index.php">Início</a>
                <a href="/sistema-pratos/pratos/cadastrar.php">Cadastrar Prato</a>
                <span>Olá, <?= htmlspecialchars($_SESSION['usuario_nome']); ?>!</span>
                <a href="/sistema-pratos/logout.php" class="btn-sair">Sair</a>
            <?php else: ?>
                <a href="/sistema-pratos/login.php">Login</a>
                <a href="/sistema-pratos/cadastro.php">Criar Conta</a>
            <?php endif; ?>
        </nav>
    </header>
    <main class="container">