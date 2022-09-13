<?php

use function PHPSTORM_META\map;
use function PHPSTORM_META\type;

include_once("config.php");


$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
$qtd_result_pag = 2;
 
$inicio = ($qtd_result_pag * $pagina) - $qtd_result_pag;
$result_bovinos = "SELECT * FROM bovinos LIMIT $inicio, $qtd_result_pag";
$resultado_bovinos = mysqli_query($conexao, $result_bovinos);

$result_pg = "SELECT COUNT(identificacao) AS num_result FROM bovinos";
$resultado_pg = mysqli_query($conexao, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);

$qtd_pg = ceil($row_pg['num_result'] / $qtd_result_pag);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/cadastro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>G. A. D. O.</title>
    <link rel="shortcut icon" href="imagem/icoGado.ico" type="image/x-icon">
   
<style>

body{
    font-size: 1.2em;
    font-family: Arial, Helvetica, sans-serif;
    display: flex;
    flex-direction: column;

}


.nav{
    border-bottom: 3px solid #000000;
    border-top: 3px solid #000000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
}
.indice{
    display: flex;
    flex-direction: row;
    gap: 10px;
    font-weight: bold;
}
.indice > a{
    color: #000000;
    font-size: 1.2em;
    font-family: Arial, Helvetica, sans-serif;
    text-decoration: none;
}

.registros {
    padding: 1% 3%;
    font-size: 1.2em;
}
.acoes{
    position: relative;
    left: 90%;
    bottom: 30px;
    height: 30px;
    width: 200px;
}

.edita {
    padding: 5px 10px;
    border-radius: 5px;
    background-color: rgb(21, 115, 71);
    color: white;

}

.box {
    display: flex;
    justify-content: space-between;
  }
</style>
</head>
<body>
<div style="background-color: rgb(91, 129, 93)">
        <nav class="navbar navbar-expand-xxl navbar-dark">
            <div class="container-fluid">
                <!-- Logo -->
                <div id="logo">
                    <a href="index.php">
                      <img src="assets/logo.svg" style="padding: 10px;" width="60px">
                    </a>
                </div>
                  <a class="navbar-brand" href="index.php" style="font-size: 20px; color:rgb(255, 159, 41);">Fazenda Riachão dos Dourado</a>    

              <!-- Árvores-->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse collapse justify-content-end text-center" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">PÁGINA INICIAL</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="cadastro.php">CADASTRO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">RELATÓRIO</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>

    <!---->
    <nav class="nav">
            <h2>Controle de animais</h2>
            <div class="indice">
            <?php
            $max_links = 2;
            echo "<a href='relatorio.php?pagina=1'>Primeira</a>";
            
            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >= 1){
                echo "<a href='relatorio.php?pagina=$pag_ant'>$pag_ant </a>";
                }
            }
            echo " $pagina ";
            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                if($pag_dep <= $qtd_pg){
                echo "<a href='relatorio.php?pagina=$pag_dep'>$pag_dep </a>";
                }
            }
            echo "<a href='relatorio.php?pagina=$qtd_pg'> Última</a>";
            ?>
            </div>
        </nav> 
    <div class="container_relatorio">
          <div class="registros">
              <?php
              while($row_bovinos = mysqli_fetch_assoc($resultado_bovinos)){
                    $compras = mysqli_query($conexao, "SELECT * FROM compras WHERE identificacao_compra = $row_bovinos[identificacao]");
                    $row_compras = mysqli_fetch_assoc($compras);
                    
                    $natalidades = mysqli_query($conexao, "SELECT * FROM natalidades WHERE identificacao_natalidade = $row_bovinos[identificacao]");
                    $row_natalidades =mysqli_fetch_assoc($natalidades);
                    
                    $vacinas = mysqli_query($conexao, "SELECT * FROM vacinados WHERE identificacao_vacinado = $row_bovinos[identificacao]");
                    $row_vacinas = mysqli_fetch_assoc($vacinas);

                        echo "<br>Nome: " . $row_bovinos['nome'] . "<br>";
                        echo "ID: " . $row_bovinos['identificacao'] . "<br>";
                        echo "Sexo: " . $row_bovinos['sexo'] . "<br>";
                        echo "Data de Nascimento: " . $row_bovinos['data_nascimento'] . "<br>";
                        echo "Descrição: " . $row_bovinos['descricao'] . "<br> <br>";
                        echo "Vacinas: <br>";
                        echo "Brucelose1: ". $row_vacinas['brucelose']."<br><br>";

                        echo "Raiva1: " . $row_vacinas['raiva1']."<br>";
                        echo "Raiva2: " . $row_vacinas['raiva2']."<br>";
                        echo "Raiva3: " . $row_vacinas['raiva3']."<br>";
                        echo "Raiva4: " . $row_vacinas['raiva4']."<br>";
                        echo "Raiva5: " . $row_vacinas['raiva5']."<br><br>";

                        echo "Aftosa1: " . $row_vacinas['febre_aftosa1']."<br>";
                        echo "Aftosa2: " . $row_vacinas['febre_aftosa2']."<br>";
                        echo "Aftosa3: " . $row_vacinas['febre_aftosa3']."<br>";
                        echo "Aftosa4: " . $row_vacinas['febre_aftosa4']."<br>";
                        echo "Aftosa5: " . $row_vacinas['febre_aftosa5']."<br><br>";

                    if(!empty($row_compras['identificacao_compra'])){
                        echo "Data da compra: " . $row_compras['data_compra'] . "<br>";
                        echo "Vendedor: " . $row_compras['vendedor']."<br>";
                        echo "
                        <div class='acoes'>
                        <a class='btn btn-primary' href='edit.php?identificacao=$row_bovinos[identificacao]&identificacao_compra=$row_compras[identificacao_compra]'> Editar </a>
                        <a class='btn btn-danger' href='excluir.php?identificacao=$row_bovinos[identificacao]&identificacao_compra=$row_compras[identificacao_compra]'> Excluir </a>
                        </div> ";
                        echo "<hr>";

                    }else
                    if(!empty($row_natalidades['identificacao_natalidade'])){                      
                        echo "Filhote do boi: " . $row_natalidades['filho_do_boi']."<br>";
                        echo "Filhote da vaca: " . $row_natalidades['filho_da_vaca']."<br>";
                        echo "
                        <div class='acoes'>
                        <a class='btn btn-primary' href='edit.php?identificacao=$row_bovinos[identificacao]&identificacao_natalidade=$row_natalidades[identificacao_natalidade]'> Editar </a>
                        <a class='btn btn-danger' href='excluir.php?identificacao=$row_bovinos[identificacao]&identificacao_natalidade=$row_natalidades[identificacao_natalidade]'> Excluir </a>
                        </div> ";
                        echo "<hr>";
                    }
                    
                    
                }
?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>