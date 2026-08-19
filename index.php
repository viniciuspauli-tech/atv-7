<?php
include './config/database.php';

$pratos = []; // inicializa sempre, evita "undefined variable"

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_POST['usuario'] ?? null;

    if ($usuario_id) {
        $sql = "SELECT * FROM pratos WHERE id_usuario = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $usuario_id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
    } else {
        $sql = "SELECT * FROM pratos";
        $resultado = mysqli_query($conn, $sql);
    }

    // transforma o resultado da query em array
    if ($resultado) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $pratos[] = $row;
        }
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

<?php include './includes/user.php'; ?>