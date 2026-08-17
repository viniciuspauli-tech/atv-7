<?php
require_once 'config/database.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT); 

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$nome, $email, $senha]);
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        $mensagem = "Erro ao cadastrar: Email já pode estar em uso.";
    }
}

include 'includes/header.php';
?>

<h2>Criar Conta</h2>
<?php if ($mensagem): ?><p style="color:red;"><?= $mensagem ?></p><?php endif; ?>

<form method="POST">
    <div>
        <label>Nome:</label>
        <input type="text" name="nome" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Senha:</label>
        <input type="password" name="senha" required>
    </div>
    <button type="submit">Cadastrar</button>
</form>

<?php include 'includes/footer.php'; ?>