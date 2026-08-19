<?php
require_once '../config/database.php';

$stmt = $pdo->query("SELECT * FROM pratos ORDER BY id DESC");
$pratos = $stmt->fetchAll(PDO::FETCH_ASSOC);

include '../includes/header.php';
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

<?php include '../includes/footer.php'; ?>