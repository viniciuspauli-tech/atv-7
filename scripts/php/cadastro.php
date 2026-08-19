includes/footer.php (Rodapé)
PHP
    </main>
    <footer>
        <p>&copy; <?= date('Y'); ?> - Projeto de Aprendizado em PHP</p>
    </footer>
</body>
</html>
5. pratos/cadastrar.php (Formulário de Cadastro)
PHP
<?php
require_once '../config/database.php';

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
6. index.php (Visualização dos Pratos Cadastrados)
PHP
<?php
require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM pratos ORDER BY id DESC");
$pratos = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'includes/header.php';
?>

<h2>Pratos Cadastrados</h2>

<?php if (empty($pratos)): ?>
    <p>Nenhum prato cadastrado ainda.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pratos as $prato): ?>
                <tr>
                    <td><?= htmlspecialchars($prato['nome']) ?></td>
                    <td><?= htmlspecialchars($prato['descricao']) ?></td>
                    <td>R$ <?= number_format($prato['preco'], 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>