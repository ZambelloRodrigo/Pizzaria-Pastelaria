<?php
    session_start();
    include_once('../classes/config.php');

    $inputTextNome = $_POST['inputTextNome'];
    $inputTextEnderoco = $_POST['inputTextEnderoco'];
    $inputTextBairro = $_POST['inputTextBairro'];
    $inputTextCidade = $_POST['inputTextCidade'];
        
    $insert = "INSERT INTO cliente (NM_CLIENTE, ENDERECO, BAIRRO, CIDADE) VALUES ('$inputTextNome', '$inputTextEnderoco', '$inputTextBairro', '$inputTextCidade')";
    $result = $conexao->query($insert);

    if ($result == 1) {
        $_SESSION['salvo'] = 'Salvo com sucesso!';
        header('Location: ../views/cadCliente.php');
    } else {
        $_SESSION['erro'] = 'Erro ao salvar!';
        header('Location: ../views/cadCliente.php');
    }
