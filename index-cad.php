<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos - Mercado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

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
                        
                        <li><a class="dropdown-item" href="index-listarprod.php">Consultar Estoque</a></li>
                        <li><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <form action="controlecad.php" method="get">
                    
                    <div class="mb-3">
                        <label for="codProd">Codigo do produto</label>
                        <input type="number" name="codProd" id="codProd" min="1" max="9999999999" required class="form-control"><br>
                    </div>    

                    <div class="mb-3">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" id="descricao" maxlength=60 class="form-control"><br>
                    </div>    
                    
                    <div class="mb-3">
                        <label for="valor">Valor R$</label>
                        <input type="number" name="valor" id="valor" step="0.01" max=99999 class="form-control"><br>
                    </div> 
                    
                    <div class="mb-3">
                        <label for="validade">Validade</label>
                        <input type="date" name="validade" id="validade"  class="form-control"><br><br>
                    </div> 
                    
                    <input type="submit" value="Inserir" name="inserir" id="inserir" class='btn btn-success'>
                    <input type="submit" value="Apagar"  name="apagar"  id="apagar" class='btn btn-danger'>
                    <input type="reset"  value="Limpar"  name="limpar"  id="limpar" class='btn btn-secondary'>
                </form>
            </div>
        </div>
    </div>
        
       
</body>
</html>