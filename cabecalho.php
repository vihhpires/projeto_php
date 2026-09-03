<?php
$base_url = '/projeto_php/';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/style.css">
    <title>Projeto PHP - CRUD</title>
</head>
<body class="glass-body">
    <header class="glass-header">
        <h1 class="site-title">Sistema de Produtos</h1>

        <nav class="glass-nav">
            <a href="<?php echo $base_url; ?>index.php">Início</a>
            <a href="<?php echo $base_url; ?>produtos/listar.php">Produtos</a>
            <a href="<?php echo $base_url; ?>login.php">Login</a>
            <a href="<?php echo $base_url; ?>logout.php">Sair</a>
        </nav>
    </header>
