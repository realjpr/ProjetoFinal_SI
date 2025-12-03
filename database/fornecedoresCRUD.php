<?php
    include_once "conexao.php";

    if($_POST){
        $nomeFornecedores = $_POST['nomeFornecedores'];
        $cnpjFornecedores = $_POST['cnpjFornecedores'];
        $cidadeFornecedores = $_POST['cidadeFornecedores'];

        $sql = $conexao -> prepare("INSERT INTO fornecedores_tbl (for_nome, for_cnpj, for_cidade) VALUES (?, ?, ?)");
        $sql -> bindParam(1, $nomeFornecedores);
        $sql -> bindParam(2, $cnpjFornecedores);
        $sql -> bindParam(3, $cidadeFornecedores);
        $sql -> execute();

        if($sql -> rowCount() > 0){
            header("Location: ../pages/fornecedores.php");
        } else {
            echo "<script>alert('Erro ao cadastrar o fornecedor. Tente novamente.');</script>";
        }
        
    }

    if($_GET){
        $idFornecedores = $_GET['idFornecedores'];

        $sql = $conexao -> prepare("DELETE FROM fornecedores_tbl WHERE for_id = ?");
        $sql -> bindParam(1, $idFornecedores);
        $sql -> execute();

        if($sql -> rowCount() > 0){
            header("Location: ../pages/fornecedores.php");
        } else {
            echo "<script>alert('Erro ao excluir o fornecedor. Tente novamente.');</script>";
        }
    }
?>