<?php
require __DIR__ . '/verifica_login.php';
require __DIR__ . '/../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM produtos WHERE id = '$id'";
    mysqli_query($conexao, $sql);

    $_SESSION['mensagem'] = "Produto excluído com sucesso!";
    header('Location: listar.php');
    exit;
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM produtos WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $produto = mysqli_fetch_assoc($resultado);
}
?>

<?php require __DIR__ . '/../cabecalho.php'; ?>

<main class="main-content">
    <div class="glass-card card-excluir">
        <h2>Excluir Produto</h2>
        
        <p>Tem certeza que deseja excluir o produto<br>
           <strong>"<?php echo htmlspecialchars($produto['nome']); ?>"</strong>?
        </p>

        <form action="excluir.php" method="POST" class="form-excluir-acoes">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
            
            <button type="submit" class="delete-button">Sim, excluir</button>
            <a href="listar.php" class="glass-button btn-cancelar">Cancelar</a>
        </form>
    </div>
</main>

<?php require __DIR__ . '/../rodape.php'; ?>