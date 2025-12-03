<?php
    include_once "conexao.php";

    if($_POST){
        $produtoPedido = $_POST['produtoPedido'];
        $fornecedorPedido = $_POST['fornecedorPedido'];
        $quantidadePedido = $_POST['quantidadePedido'];
        $dataPedido = $_POST['dataPedido']; 

        $sqlProduto = $conexao -> prepare("SELECT pro_id FROM produtos_tbl WHERE pro_nome LIKE '%$produtoPedido%'");
        
        if($sqlProduto -> execute()){
            $produto = $sqlProduto -> fetch(PDO::FETCH_OBJ);
            $produtoId = $produto->pro_id;

            $sqlFornecedor = $conexao -> prepare("SELECT for_id FROM fornecedores_tbl WHERE for_nome LIKE '%$fornecedorPedido%'");

            if($sqlFornecedor -> execute()){
                $fornecedor = $sqlFornecedor -> fetch(PDO::FETCH_OBJ);
                $fornecedorId = $fornecedor->for_id;

                $sql = $conexao -> prepare("INSERT INTO pedido_tbl (pro_id, for_id, ped_data, ped_quantidade) VALUES (?, ?, ?, ?)");
                $sql -> bindParam(1, $produtoId);
                $sql -> bindParam(2, $fornecedorId);
                $sql -> bindParam(3, $dataPedido);
                $sql -> bindParam(4, $quantidadePedido);
                $sql -> execute();

                if($sql -> rowCount() > 0){
                    header("Location: ../pages/pedidos.php");
                } else {
                    echo "<script>alert('Erro ao cadastrar o pedido. Tente novamente.');</script>";
                }
            } else {
                echo "<script>alert('Erro ao buscar o fornecedor. Tente novamente.');</script>";
                exit();
            }
        } else {
            echo "<script>alert('Erro ao buscar o produto. Tente novamente.');</script>";
            exit();
        }
    }

    if($_GET){
        $idPedido = $_GET['idPedido'];

        $sql = $conexao -> prepare("DELETE FROM pedido_tbl WHERE ped_id = ?");
        $sql -> bindParam(1, $idPedido);
        $sql -> execute();

        if($sql -> rowCount() > 0){
            header("Location: ../pages/pedidos.php");
        } else {
            echo "<script>alert('Erro ao excluir o pedido. Tente novamente.');</script>";
        }
    }
?>