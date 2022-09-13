<?php
include_once("config.php");


if(isset($_GET['update'])){  
  $identificacao = $_GET['id']; 
  $idade = filter_input(INPUT_GET, 'idade');
  $nome = filter_input(INPUT_GET, 'nome');
  $descricao = filter_input(INPUT_GET, 'descricao');
  
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



    $sql_update_bovinos = "UPDATE bovinos SET nome='$nome', data_nascimento='$idade', descricao='$descricao', sexo='$sexo' WHERE identificacao = '$identificacao'";
    $result = $conexao->query($sql_update_bovinos);

    $sql_update_vacinados = mysqli_query($conexao, "UPDATE vacinados SET febre_aftosa1 = '$aftosa1', febre_aftosa2 = '$aftosa2', febre_aftosa3 = '$aftosa3', febre_aftosa4 = '$aftosa4', febre_aftosa5 = '$aftosa5',brucelose = '$brucelose', raiva1 = '$raiva1', raiva2 = '$raiva2', raiva3 = '$raiva3', raiva4 = '$raiva4', raiva5 = '$raiva5' WHERE identificacao_vacinado = '$identificacao'");

    header('location: index.php');
    
}




if(!empty($_GET['identificacao'])){ 
    $id = $_GET['identificacao'];
    $sql_select = "SELECT * FROM bovinos WHERE identificacao = $id";
    $result = mysqli_query($conexao, $sql_select);
    if($result->num_rows > 0){
        while($dados_bov = mysqli_fetch_assoc($result)){
            $idade = $dados_bov['data_nascimento'];
            $nome = $dados_bov['nome'];
            $descricao = $dados_bov['descricao'];
            $sexo = $dados_bov['sexo'];

        }
    }
    $vacina = mysqli_query($conexao, "SELECT * FROM vacinados WHERE identificacao_vacinado = $id");
    if($vacina->num_rows > 0){
        while($row_vacinas = mysqli_fetch_assoc($vacina)){
            $brucelose = $row_vacinas['brucelose'];

            $aftosa1 = $row_vacinas['febre_aftosa1'];
            $aftosa2 = $row_vacinas['febre_aftosa2'];
            $aftosa3 = $row_vacinas['febre_aftosa3'];
            $aftosa4 = $row_vacinas['febre_aftosa4'];
            $aftosa5 = $row_vacinas['febre_aftosa5'];

            $raiva1 = $row_vacinas['raiva1'];
            $raiva2 = $row_vacinas['raiva2'];
            $raiva3 = $row_vacinas['raiva3'];
            $raiva4 = $row_vacinas['raiva4'];
            $raiva5 = $row_vacinas['raiva5'];
        }
    }
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
                    <a class="nav-link active" aria-current="page" href="relatorio.php">RELATÓRIO</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>
    <main>

        <form action="edit.php" method="GET" id="dadoscompraid">
            <div>
            <h2>Editar</h2>
            
            <div class="form-floating mb-3">
            <input type="text" name="nome" id="nome" autocomplete="off" maxlength = "20" required value="<?php echo $nome ?>" class="form-control" id="floatingInput" placeholder="Nome">
            <label for="floatingInput">Nome</label>
            </div>

            <br>

            Data de Nascimento: <br> 
            <input class="input-group-text" type="date" name="idade" id="idade" value="<?php echo $idade ?>" required>
            <br>

            <p class="dados1">Sexo:
                <br> 
                <input type="radio" name="radsex" value="macho" id="macho" <?php echo ($sexo == 'macho') ? 'checked' : '' ?>>
                <label for="macho">Macho</label>
                <input type="radio" name="radsex" value="fêmea" id="femea" <?php echo ($sexo == 'fêmea') ? 'checked' : '' ?>>
                <label for="fêmea">Fêmea</label>
            </p>

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
            <input type="text" name="raiva1" class="input-group-text" value="<?php echo $raiva1 ?>" autocomplete="off">
            <br>

            Dose 2
            <input type="text" name="raiva2" class="input-group-text" value="<?php echo $raiva2 ?>" autocomplete="off">
            <br>

            Dose 3
            <input type="text" name="raiva3" class="input-group-text" value="<?php echo $raiva3 ?>" autocomplete="off">
            <br>

            Dose 4
            <input type="text" name="raiva4" class="input-group-text" value="<?php echo $raiva4 ?>" autocomplete="off">
            <br>

            Dose 5
            <input type="text" name="raiva5" class="input-group-text" value="<?php echo $raiva5 ?>" autocomplete="off">
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
            <input type="text" name="aftosa1" class="input-group-text" value="<?php echo $aftosa1?>" autocomplete="off">
            <br>

            Dose 2
            <input type="text" name="aftosa2" class="input-group-text" value="<?php echo $aftosa2?>" autocomplete="off">
            <br>

            Dose 3
            <input type="text" name="aftosa3" class="input-group-text" value="<?php echo $aftosa3?>" autocomplete="off">
            <br>

            Dose 4
            <input type="text" name="aftosa4" class="input-group-text" value="<?php echo $aftosa4?>" autocomplete="off">
            <br>

            Dose 5
            <input type="text" name="aftosa5" class="input-group-text" value="<?php echo $aftosa5?>" autocomplete="off">
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
            <input type="text" name="brucelose" class="input-group-text" value="<?php echo $brucelose ?>" autocomplete="off">
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
            <textarea class="form-control" name="descricao" maxlength="70" id="textarea" cols="30" rows="5" aria-label="With textarea"><?php echo $descricao?></textarea>
            </div>
            </div>

            <br>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" name="update" class="btn btn-primary">Alterar</button>
            <br> <br> <br>
        </form>
         
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>