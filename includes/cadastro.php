<?php
include '../infra/connect.php';
if (!isset($conn) || $conn === null) {
    die('Erro ao conectar com o banco de dados.');
}

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conn, $sql);

if ($resultado === false) {
    die('Erro ao consultar usuários: ' . mysqli_error($conn));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    $usuario_id = $_POST['usuario'];

    $sql = "INSERT INTO pratos (nome, descricao, preco, categoria, id_usuario) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        die('Erro ao preparar a inserção do prato: ' . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 'ssdsi', $nome, $descricao, $preco, $categoria, $usuario_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Prato cadastrado com sucesso!";
        echo "<br><a href='../index.php'>Voltar</a>";
        exit();
    } else {
        echo "Erro ao cadastrar prato: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}


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
