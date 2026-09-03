<?php
session_start();
require __DIR__ . '/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        header('Location: /projeto_php/produtos/listar.php');
        exit;
    } else {
        $mensagem = 'E-mail ou senha inválidos.';
    }
}
?>

<?php require __DIR__ . '/cabecalho.php'; ?>

<main class="login-container">

    <div class="login-card glass-card">

        <h2>Login</h2>

        <?php if (isset($mensagem)) { ?>
            <p class="error-message"><?php echo $mensagem; ?></p>
        <?php } ?>

        <form class="glass-form" action="/projeto_php/login.php" method="POST">

            <label>E-mail:</label>
            <input class="glass-input" type="text" name="email"><br>

            <label>Senha:</label>
            <input class="glass-input" type="password" name="senha"><br>

            <button class="glass-button login-button" type="submit">
                Entrar
            </button>

        </form>

    </div>

</main>

<?php require __DIR__ . '/rodape.php'; ?>
