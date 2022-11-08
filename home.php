<?php

session_start();
include_once('classes/config.php');

/* Pesquisa de cliente */
$client_sql = "SELECT * FROM cliente";
$client_con = $conexao->query($client_sql);

$product_sql = "SELECT * FROM produtos";
$product_con = $conexao->query($product_sql);

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
    <link rel="stylesheet" href="views/app/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Tela de Vendas</title>
</head>

<body>
    <header class="header">
        <div class="conteinar-fluid navegador">
            <div class=" row">
                <div class="col">
                    <h4>Pastelaria/Pizzaria</h4>
                </div>
                <div class="col">
                    <a class="btn" href="views/cadCliente.php">Clientes</a>
                </div>
                <div class="col">
                    <a class="btn" href="views/cadProduto.php">Produtos</a>
                </div>
            </div>
        </div>
    </header>
    <div class="container home">
        <div class="row my-1">
            <div class="col">
                <div class="box">
                    <form action="models/vendas.php" method="POST">
                        <div class="row">
                            <h4 class="text-center p-2 my-1">Tela de Vendas</h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label>Mesa</label>
                                <select class="form-control" name="selectMesas" id="selectMesas">
                                    <option value="#">...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="12.9">12.9</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label>Cliente</label>
                                <select class="form-control" name="selectClientes" id="selectClientes">
                                    <option>..</option>
                                    <?php while ($client = $client_con->fetch_array()) : ?>
                                        <option value="<?= $client['ID_CLIENTE']; ?>"><?= $client['NM_CLIENTE']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label>Produto</label>
                                <select class="form-control" name="selectProduto" id="selectProduto">
                                    <option>..</option>
                                    <?php while ($product = $product_con->fetch_array()) : ?>
                                        <option value="<?= $product['ID_PRODUTO']; ?>"><?= $product['NM_PRODUTO']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <label>Tamanho</label>
                                <select class="form-control" name="selectTamanho" id="selectTamanho" onchange="altera_valor()">
                                    <option value="#">...</option>
                                    <option value="P">P</option>
                                    <option value="M">M</option>
                                    <option value="G">G</option>
                                    <option value="GG">GG</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Valor</label>
                                    <input type="text" name="inputNumberValor" id="inputNumberValor" class="form-control">
                                </div>

                                <div class="col-sm-4">
                                    <label>Quantidade</label>
                                    <input type="number" name="inputNumberQuant" id="inputNumberQuant" class="form-control" onblur="calcula_total()">
                                </div>
                                <div class="col-sm-4">
                                    <label>Valor Total</label>
                                    <input type="text" name="inputNumberValorTotal" id="inputNumberValorTotal" class="form-control">
                                </div>
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
<script>
    let select = document.getElementById('selectTamanho');
    let inputNumberValor = document.getElementById('inputNumberValor');
    let inputNumberQuant = document.getElementById('inputNumberQuant');
    let inputNumberValorTotal = document.getElementById('inputNumberValorTotal');
    let valor;
    let valorTotal;

    function altera_valor() {
        if (select.options[select.selectedIndex].value == 'P') {
            inputNumberValor.value = '38,99';
            valor = 38.99;
        } else if (select.options[select.selectedIndex].value == 'M') {
            inputNumberValor.value = '45,99';
            valor = 45.99;
        } else if (select.options[select.selectedIndex].value == 'G') {
            inputNumberValor.value = '52,99';
            valor = 52.99;
        } else if (select.options[select.selectedIndex].value == 'GG') {
            inputNumberValor.value = '62,99';
            valor = 62.99;
        }

    }

    function calcula_total() {
        inputNumberValorTotal.value = valor * Number(inputNumberQuant.value);
    }
</script>

</html>