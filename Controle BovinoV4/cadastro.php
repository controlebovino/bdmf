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
    <link rel="shortcut icon" href="./imagem/icoGado.ico" type="image/x-icon">
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
                    <a class="nav-link active" aria-current="page" href="#">CADASTRO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="relatorio.php">RELATÓRIO</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>


    <div class="box" style="margin-top: 5%;">
                                <div></div>
                                <div class="card" style="width: 27rem;">
                                    <img src="assets/compra.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <p class="card-text">
                                    Selecione essa opção para registro de bovinos que foram comprados
                                    </p>
                                    <a href="compra.php" class="btn btn-success btn-lg" style="background-color: rgb(24, 77, 71);">Compra</a>
                                    </div>
                                  </div>
                                <div class="card" style="width: 27rem;">
                                    <img src="assets/natalidade.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <p class="card-text">
                                    Selecione essa opção para registro de bovinos que nasceram
                                    </p>
                                    <a href="natalidade.php" class="btn btn-success btn-lg" style="background-color: rgb(24, 77, 71);">Natalidade</a>
                                    </div>
                                  </div>
                                  <div></div>
                        </div>
                        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>