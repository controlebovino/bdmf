<?php
include_once("config.php");
$id = $_GET['identificacao'];
        $delete_vacinados = mysqli_query($conexao, "DELETE FROM  vacinados WHERE identificacao_vacinado = $id");
        if(!empty($_GET['identificacao_compra'])){
            $id_compra = $_GET['identificacao_compra'];
            $delete_compras = "DELETE FROM compras WHERE identificacao_compra=$id_compra";
            $result_delete_compra = $conexao->query($delete_compras);
            $delete_bovinos = mysqli_query($conexao, "DELETE FROM bovinos WHERE identificacao=$id");
            header("location: index.php");
        }else
        if(!empty($_GET['identificacao_natalidade'])){
            $id_natalidade = $_GET['identificacao_natalidade'];
            $delete_natalidades = mysqli_query($conexao, "DELETE FROM natalidades WHERE identificacao_natalidade = $id_natalidade");
            $delete_bovinos = mysqli_query($conexao, "DELETE FROM bovinos WHERE identificacao=$id");
            
            header("location: index.php");
        }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>