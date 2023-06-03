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
                    <?php

                        //arquivo onde está a classe
                        include_once "clsmovto.php";

                        //instanciou a classe para um objeto
                        $movimentacao = new movto();

                        //armazena os inputs nas respectiveis variaveis
                        $codProd   = filter_input(INPUT_GET,'codProd',FILTER_VALIDATE_INT);
                        $tipo      = filter_input(INPUT_GET,'tipo');
                        $qtde      = filter_input(INPUT_GET,'qtde',FILTER_SANITIZE_NUMBER_FLOAT);
                        $datamov   = date('Y-m-d H:i:s');

                        //envia os parametros (input-> variavel -> atributo da classe) para os atributos da classe
                        $movimentacao->setcodProd($codProd);
                        $movimentacao->settipo($tipo);
                        $movimentacao->setqtde($qtde);
                        $movimentacao->setdatamov($datamov);

                        if (isset($_GET["incluir"]))
                        {
                            echo $movimentacao->incluir();
                        }

                        if (isset($_GET["excluir"]))
                        {
                            echo $movimentacao->excluir();
                        }

                        if (isset($_GET["listarMovto"])) 
                        {
                            $Dados = $movimentacao->listarMovto();

                            if (empty($Dados))
                            {
                                echo "<script> alert('Movimentos não localizados') </script>";
                                echo "<script> document.location='index-listar-mov.php' </script>";
                            }
                            else
                            {
                                print "<h2>Lista de movimentação</h2>";
                                print "<hr>";
                                print "<br><br>";

                                print "<table class='table table-hover table striped table-bordered'>";
                                    print "<tr>";
                                        print "<th>Código</th>";
                                        print "<th>Tipo</th>";
                                        print "<th>Quantidade</th>";
                                        print "<th>Data</th>";
                                    print "</tr>";
                                foreach($Dados as $Dd)
                                {
                                    print "<tr>";
                                        print "<td>{$Dd['codProd']}</td>";
                                        print "<td>{$Dd['tipo']}</td>";
                                        print "<td>" . number_format("{$Dd['qtde']}",2,',','.') . "</td>";
                                        print "<td>". date('d/m/Y h:i:s', strtotime("{$Dd['datamov']}"))."</td>";
                                    print "</tr>";
                                }    
                                print "</table>";    
                            }
                        }

                    ?>   
                </div>
            </div>
        </div>
    </main>
    

    
</body>
</html>

