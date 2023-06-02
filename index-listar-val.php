<!doctype html>
<html lang="pt-BR">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Mercado do Zezinho v1.0</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mercado do Zezinho</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Opções</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index-cad.php">Cadastrar / Exluir produtos</a></li>
                        <li><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="index-listarprod.php">Consultar lista de produtos cadastrados</a></li>
                        <li><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="index-listar-val.php">Consultar data de vencimento</a></li>
                        <li><hr class="dropdown-divider"></li>

                        <li><a class="dropdown-item" href="index-estoque.php">Cadastrar Movimento de estoque</a></li>
                        <li><hr class="dropdown-divider"></li>

                        <li><a class="dropdown-item" href="index-listar-mov.php">Listar tipo de movimento Entrada / Saida</a></li>
                </ul>
          </div>
        </div>
      </nav>
    </header>

    <br>

    <main>
        <div class="container">
            <div class="row">
                <div class="col mt-5">
                    
                    <h1>Consulta de produtos</h1><hr><br>

                    <form action="controlecad.php" method="get">
                        
                        <h2>Insira o periodo que deseja consultar</h2><br>
                        
                        <label for="dataVal1">Data de inicio</label><br>
                        <input type="date" name="dataVal1" id="dataVal1" ><br>
                        
                        <label for="dataVal2">Data final</label><br>
                        <input type="date" name="dataVal2" id="dataVal2" ><br><br>

                        <input type="submit" value="Listar" name="listarVal" id="listarVal" class="btn btn-success">
                        <input type="reset"  value="Limpar"  name="limpar"  id="limpar" class='btn btn-secondary'>
                    </form>
                </div>
            </div>
        </div>
    </main>    

</body>
</html>