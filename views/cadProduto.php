<?php
session_start();

if (isset($_SESSION['salvo'])) {
    echo "<script>alert('" . $_SESSION['salvo'] . "');</script>";
    unset($_SESSION['salvo']);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/app/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Cadastro Cliente</title>
</head>
<header class="header">
    <div class="conteinar-fluid navegador">
        <div class=" row">
            <div class="col">
                <a href="../home.php">
                    <h4>Pastelaria/Pizzaria</h4>
                </a>
            </div>
            <div class="col">
                <a class="btn" href="views/cadProduto.php">Produtos</a>
            </div>
        </div>
    </div>
</header>

<body>
    <div class="container home">
        <div class="row my-1">
            <div class="col">
                <div class="box">
                    <form action="../models/produto.php" method="post">
                        <div class="row">
                            <h4 class="text-center p-2 my-1">Tela de Produtos</h4>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Nome</label>
                                <input type="text" name="inputTextNomeProd" id="inputTextNomeProd" class="form-control" required>
                            </div>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-sm-2">
                                    <button class="btn btn-primary d-grid gap-2 my-4 col-6 mx-auto" type="submit">Salvar</button>
                                </div>
                                <div class="col"></div>
                                <?php if (isset($_SESSION['erro'])) : ?>
                                    <div class="alert alert-danger text-center pMensagemErro">
                                        <?= $_SESSION['erro'] ?>
                                        <?php unset($_SESSION['erro']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <div class="conteinar-fluid fixed-bottom rodape">
        <div class="row">
            <div class="col-12 text-center p-3" p-3>
                <h6>Turma </h6>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>