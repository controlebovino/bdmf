<?php
if (isset($_GET['submit'])){
include_once("config.php");

$idade = filter_input(INPUT_GET, 'idade');
$data_compra = filter_input(INPUT_GET, 'dataCompra');
$nome = filter_input(INPUT_GET, 'nome');
$vendedor = filter_input(INPUT_GET, 'vend');
$descricao = filter_input(INPUT_GET, "textarea");

$aftosa1 = filter_input(INPUT_GET, 'aftosa1');
$aftosa2= filter_input(INPUT_GET, 'aftosa2');
$aftosa3 = filter_input(INPUT_GET, 'aftosa3');
$aftosa4 = filter_input(INPUT_GET, 'aftosa4');
$aftosa5 = filter_input(INPUT_GET, 'aftosa5');

$brucelose = filter_input(INPUT_GET, 'brucelose');

$raiva1 = filter_input(INPUT_GET, 'raiva1');
$raiva2 = filter_input(INPUT_GET, 'raiva2');
$raiva3 = filter_input(INPUT_GET, 'raiva3');
$raiva4 = filter_input(INPUT_GET, 'raiva4');
$raiva5 = filter_input(INPUT_GET, 'raiva5');

if($_GET['radsex'] == 'macho'){
    $sexo = "macho";
}else
if($_GET['radsex'] == 'fêmea'){
    $sexo = "fêmea";
}


//inserinda na tabela bovinos
$sql1 = mysqli_query($conexao, "INSERT INTO bovinos(data_nascimento, nome, sexo, descricao)VALUES( '$idade', '$nome', '$sexo', '$descricao')");
$identificacao = $conexao->insert_id;

//inserindo na tabela compras
$sql2 = mysqli_query($conexao, "INSERT INTO  compras(identificacao_compra, data_compra, vendedor) VALUES('$identificacao','$data_compra', '$vendedor')");

//inserindo na tabela vacinados
$sql3 = mysqli_query($conexao, "INSERT INTO vacinados(identificacao_vacinado, febre_aftosa1, febre_aftosa2, febre_aftosa3, febre_aftosa4, febre_aftosa5, brucelose, raiva1, raiva2, raiva3, raiva4, raiva5)VALUES('$identificacao', '$aftosa1', '$aftosa2', '$aftosa3', '$aftosa4', '$aftosa5', '$brucelose', '$raiva1', '$raiva2', '$raiva3', '$raiva4', '$raiva5')");



header("location: index.php");

}


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
    <link rel="stylesheet" href="./css/compra-natalidade.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>G.  A.  D.  O.</title>
    <link rel="shortcut icon" href="imagem/icoGado.ico" type="image/x-icon">
</head>
<style>
  .vacina {
    background-color: rgb(91, 129, 93);
    color: white;
    padding: 2px 10px;
    border-radius: 10px;
  }
</style>
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
                    <a class="nav-link active" aria-current="page" href="cadastro.php">CADASTRO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="relatorio.php">RELATÓRIO</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>

    <main>
       
                <h2>Dados da compra</h2>

        <form action="compra.php" method="get" id="dadoscompraid">
            <div class="dadoscompra">

            <div class="form-floating mb-3">
            <input type="text" name="nome" id="nome" autocomplete="off" maxlength = "20" required class="form-control" id="floatingInput" placeholder="Nome">
            <label for="floatingInput">Nome</label>
            </div>

            <br>

            <div class="form-floating mb-3">
            <input type="text" name="vend" autocomplete="off" maxlength="30" id="vend" required class="form-control" id="floatingInput" placeholder="Vendedor">
            <label for="floatingInput">Vendedor</label>
            </div>

            <br>
        
            Data da Compra: <br>
            <input class="input-group-text" type="date" name="dataCompra" id="data" required>
            <br>

            Data de Nascimento: <br> 
            <input class="input-group-text" type="date" name="idade" id="idade" required>
            <br>

            Sexo: <br>
                <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="radsex" id="macho" value="macho" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Macho
                </label>
                </div>

                <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="radsex" id="femea" value="fêmea">
                <label class="form-check-label" for="exampleRadios2">
                    Fêmea
                </label>
                </div>
            <br> <br> 

            <p>Vacinas:</p>

            <button type="button" style="border-color:rgb(206, 212, 218); background-color:rgb(233, 236, 239);" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#raiva">
            Registro de Vacinas (Raiva)
            </button>
            
            <div class="modal fade" id="raiva" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vacinas - Raiva</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-check form-check-inline">
            <label class="form-check-label" for="raiva"></label>
            <br>
            Dose 1
            <input type="text" name="raiva1" class="input-group-text" autocomplete="off">
            <br>

            Dose 2
            <input type="text" name="raiva2" class="input-group-text" autocomplete="off">
            <br>

            Dose 3
            <input type="text" name="raiva3" class="input-group-text" autocomplete="off">
            <br>

            Dose 4
            <input type="text" name="raiva4" class="input-group-text" autocomplete="off">
            <br>

            Dose 5
            <input type="text" name="raiva5" class="input-group-text" autocomplete="off">
            </div>
            <br> <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
            </div>
            <br> <br>

            <button type="button" style="border-color:rgb(206, 212, 218); background-color:rgb(233, 236, 239);" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#aftosa">
            Registro de Vacinas (Aftosa)
            </button>
            
            <div class="modal fade" id="aftosa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vacinas - Aftosa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-check form-check-inline">
            <label class="form-check-label" for="aftosa"></label>
            <br>
            Dose 1
            <input type="text" name="aftosa1" class="input-group-text" autocomplete="off">
            <br>

            Dose 2
            <input type="text" name="aftosa2" class="input-group-text" autocomplete="off">
            <br>

            Dose 3
            <input type="text" name="aftosa3" class="input-group-text" autocomplete="off">
            <br>

            Dose 4
            <input type="text" name="aftosa4" class="input-group-text" autocomplete="off">
            <br>

            Dose 5
            <input type="text" name="aftosa5" class="input-group-text" autocomplete="off">
            </div>
            <br> <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
            </div>
            <br> <br>

            <button type="button" style="border-color:rgb(206, 212, 218); background-color:rgb(233, 236, 239);" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#brucelose">
            Registro de Vacinas (Brucelose)
            </button>
            
            <div class="modal fade" id="brucelose" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vacinas - Brucelose</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-check form-check-inline">
            <label class="form-check-label" for="brucelose"></label> <br>

            Dose 1
            <input type="text" name="brucelose" class="input-group-text" autocomplete="off">
            </div>
            <br> <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
            </div>
            <br> <br> <br>

            <div class="input-group">
            <span class="input-group-text">Descrição</span>
            <textarea class="form-control" name="textarea" maxlength="70" id="textarea" cols="30" rows="5" aria-label="With textarea"></textarea>
            </div>

            <br>
            <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
            <br> <br> <br>
        </form>
        
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>