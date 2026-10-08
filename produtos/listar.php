<?php
require __DIR__ . '/verifica_login.php';
require __DIR__ . '/../conexao.php';

$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao, $sql);
?>

<?php require __DIR__ . '/../cabecalho.php'; ?>

<main class="main-content">
    <div class="page-header">
        <h2>Produtos Cadastrados</h2>
        <a href="cadastrar.php" class="glass-button">+ Cadastrar Novo Produto</a>
    </div>

    <?php if (isset($_SESSION['mensagem'])) { ?>
        <div class="alert-sucesso">
             <?php echo $_SESSION['mensagem']; ?>
        </div>
        <?php unset($_SESSION['mensagem']); ?>
    <?php } ?>

    <div class="glass-table-container">
        <table class="glass-table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Qtd.</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($produto = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                        <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                        <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo $produto['quantidade']; ?></td>

                        <td class="actions">
                            <a class="edit-button" href="atualizar.php?id=<?php echo $produto['id']; ?>">
                                Editar
                            </a>

                            <a class="delete-button" href="excluir.php?id=<?php echo $produto['id']; ?>">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php require __DIR__ . '/../rodape.php'; ?>