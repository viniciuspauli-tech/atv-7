<?php
include '../config/database.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_POST['usuario'] ?? null;

    if ($usuario_id) {
        $sql = "SELECT * FROM pratos WHERE id_usuario = $usuario_id";
        $resultado = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM pratos";
        $resultado = mysqli_query($conn, $sql);
    }
}

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