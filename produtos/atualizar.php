<?php
require __DIR__ . '/verifica_login.php';
require __DIR__ . '/../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "UPDATE produtos SET
            nome = '$nome',
            descricao = '$descricao',
            preco = '$preco',
            quantidade = '$quantidade'
            WHERE id = '$id'";

    mysqli_query($conexao, $sql);

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
    <div class="glass-card card-editar-aquafruit">
        <h2>Atualizar Produto</h2>
        <form action="atualizar.php" method="POST" class="glass-form">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

            <div class="input-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" class="glass-input" name="nome" value="<?php echo $produto['nome']; ?>">
            </div>

            <div class="input-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" class="glass-input" name="descricao" value="<?php echo $produto['descricao']; ?>">
            </div>

            <div class="input-group">
                <label for="preco">Preço:</label>
                <input type="text" id="preco" class="glass-input" name="preco" value="<?php echo $produto['preco']; ?>">
            </div>

            <div class="input-group">
                <label for="quantidade">Quantidade:</label>
                <input type="text" id="quantidade" class="glass-input" name="quantidade" value="<?php echo $produto['quantidade']; ?>">
            </div>

            <button type="submit" class="glass-button btn-salvar-aquafruit">Salvar alterações</button>
        </form>
    </div>
</main>

<?php require __DIR__ . '/../rodape.php'; ?>