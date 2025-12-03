<?php
    include_once "conexao.php";

    if($_POST){
        $nomeProduto = $_POST['nomeProduto'];
        $categoriaProduto = $_POST['categoriaProduto'];
        $precoProduto = $_POST['precoProduto'];
        $estoqueProduto = $_POST['estoqueProduto'];

        $sql = $conexao -> prepare("INSERT INTO produtos_tbl (pro_nome, pro_categoria, pro_preco, pro_estoque) VALUES (?, ?, ?, ?)");
        $sql -> bindParam(1, $nomeProduto);
        $sql -> bindParam(2, $categoriaProduto);
        $sql -> bindParam(3, $precoProduto);
        $sql -> bindParam(4, $estoqueProduto);
        $sql -> execute();

        if($sql -> rowCount() > 0){
            header("Location: ../pages/produtos.php");
        } else {
            echo "<script>alert('Erro ao cadastrar o produto. Tente novamente.');</script>";
        }
        
    }

    if($_GET){
        $idProduto = $_GET['idProduto'];

        $sql = $conexao -> prepare("DELETE FROM produtos_tbl WHERE pro_id = ?");
        $sql -> bindParam(1, $idProduto);
        $sql -> execute();

        if($sql -> rowCount() > 0){
            header("Location: ../pages/produtos.php");
        } else {
            echo "<script>alert('Erro ao excluir o produto. Tente novamente.');</script>";
        }
    }
?>