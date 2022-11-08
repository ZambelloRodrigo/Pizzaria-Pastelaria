<?php
    include_once('../classes/config.php');
    session_start();

    $selectMesas = $_POST['selectMesas'];
    $selectClientes = $_POST['selectClientes'];
    $selectProduto = $_POST['selectProduto'];
    $inputNumberQuant = $_POST['inputNumberQuant'];
    $inputNumberValor = $_POST['inputNumberValor'];
    $inputNumberValorTotal = $_POST['inputNumberValorTotal'];

    $insert = "INSERT INTO vendas (ID_MESA, ID_PRODUTO, ID_CLIENTE, VL_PRODUTO, VL_TOTAL, QT_PRODUTO) VALUES ('$selectMesas', '$selectProduto', '$selectClientes', '$inputNumberValor', '$inputNumberValorTotal', '$inputNumberQuant')";
    $result = $conexao->query($insert);
    
    if($result == 1){
        $_SESSION['salvo'] = 'Salvo com sucesso!';
        header('Location: ../home.php');
    }else{
        $_SESSION['erro'] = 'Erro ao salvar!';
        header('Location: ../home.php'); 
    }

    

