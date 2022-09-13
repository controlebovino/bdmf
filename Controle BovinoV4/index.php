<?php
include_once("config.php");


$select_m = mysqli_query($conexao, "SELECT count(*) FROM bovinos WHERE sexo = 'macho'");
$m_array = $select_m->fetch_row();
$machos = $m_array[0];

$select_f = mysqli_query($conexao, "SELECT count(*) FROM bovinos WHERE sexo = 'fêmea'");
$array_f = $select_f->fetch_row();
$femeas = $array_f[0];
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
    <link rel="stylesheet" href="./css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>G. A. D. O.</title>
    <link rel="shortcut icon" href="imagem/icoGado.ico" type="image/x-icon">
   
</head>
<body class="body_index">
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
                    <a class="nav-link active" aria-current="page" href="#">PÁGINA INICIAL</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="cadastro.php">CADASTRO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="relatorio.php">RELATÓRIO</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>
        <!---->
        <main class="main">
            <div class="pago">
                <div class="valor">
                    <span class="val"></span>
                    <span class="investe"></span>
                </div>
            </div>
            
            <div class="box" style="margin-top: 5%;">
                                <div></div>
                                <div class="card" style="width: 25rem;">
                                    <img src="assets/gadom.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                      <p class="card-text" style="color:rgb(24, 77, 71);text-align: center; font-size: 30px;">MACHO(S)</p>
                                      <p style="text-align:center; font-size: 25px; width: 50%; margin: auto; border-radius: 5px; background-color: rgb(24, 77, 71); color: white;">
                                      <span style="font-size: 30px;" class="qtd">
                                            <?php
                                            print_r($machos);
                                            ?>
                                        </span>
                                    </p>
                                    </div>
                                  </div>
                                <div class="card" style="width: 25rem;">
                                    <img src="assets/gadof.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                      <p class="card-text" style="color:rgb(24, 77, 71);text-align: center; font-size: 30px;">FÊMEA(S)</p>
                                      <p style="text-align:center; font-size: 25px; width: 50%; margin: auto; border-radius: 5px; background-color: rgb(24, 77, 71); color: white;">
                                        <span style="font-size: 30px;" class="qtd">
                                            <?php
                                            print_r($femeas);
                                            ?>
                                        </span>
                                    </p>
                                    </div>
                                  </div>
                                  <div></div>
                        </div>
            
        </main>
        <!---->
        <footer class="footer">
        </footer>
        <!---->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>