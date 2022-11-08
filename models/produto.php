<?php
session_start();
include_once('../classes/config.php');

$inputTextNomeProd = $_POST['inputTextNomeProd'];

$insert = "INSERT INTO produtos (NM_PRODUTO) VALUES ('$inputTextNomeProd')";
$result = $conexao->query($insert);

if ($result == 1) {
    $_SESSION['salvo'] = 'Salvo com sucesso!';
    header('Location: ../views/cadProduto.php');
} else {
    $_SESSION['erro'] = 'Erro ao salvar!';
    header('Location: ../views/cadProduto.php');
}
