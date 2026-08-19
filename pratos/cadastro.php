<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];


    $stmt = $pdo->prepare("INSERT INTO pratos (nome, descricao, preco) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $descricao, $preco]);


    header("Location: ../index.php");
    exit();
}

include '../includes/header.php';
?>

<h2>Cadastrar Prato</h2>

<form method="POST">
    <div>
        <label for="nome">Nome do Prato:</label>
        <input type="text" id="nome" name="nome" required>
    </div>
    <div>
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4"></textarea>
    </div>
    <div>
        <label for="preco">Preço (R$):</label>
        <input type="number" step="0.01" id="preco" name="preco" required>
    </div>
    <button type="submit">Salvar Prato</button>
</form>

<?php include '../includes/footer.php'; ?>
