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

                        <li><a class="dropdown-item" href="">Listar tipo de movimento Entrada / Saida</a></li>
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
                        include_once "clscadProd.php";

                        //instanciou a classe para um objeto
                        $cadastro = new cadProd();

                        //armazena os inputs nas respectiveis variaveis
                        $codProd   = filter_input(INPUT_GET,'codProd',FILTER_VALIDATE_INT);
                        $descricao = filter_input(INPUT_GET,'descricao',FILTER_SANITIZE_SPECIAL_CHARS);
                        $valor     = filter_input(INPUT_GET,'valor', FILTER_VALIDATE_FLOAT);
                        $validade  = filter_input(INPUT_GET,'validade');
                        $ordem     = filter_input(INPUT_GET,'ordem');
                        $dataVal1  = filter_input(INPUT_GET,'dataVal1');
                        $dataVal2  = filter_input(INPUT_GET,'dataVal2');

                        //envia os parametros (input-> variavel -> atributo da classe) para os atributos da classe
                        $cadastro->setcodProd($codProd);
                        $cadastro->setdescricao($descricao);
                        $cadastro->setvalor($valor);
                        $cadastro->setvalidade($validade);
                        $cadastro->setordem($ordem);
                        $cadastro->setdataVal1($dataVal1);
                        $cadastro->setdataVal2($dataVal2);


                        if (isset($_GET["inserir"]))
                        {
                            echo $cadastro->inserir();
                        }

                        if (isset($_GET["apagar"]))
                        {
                            echo $cadastro->apagar();
                        }

                        if (isset($_GET["listar"]))
                        {
                            $Dados = $cadastro->listar();

                            if (empty($Dados))
                            {
                                echo "<script> alert('Produtos nao localizadados') </script>";
                                echo "<script>document.location='index-listarprod.php'</script>";
                            }
                            else
                            {   
                                print "<h2>Produtos cadastrados</h2><br><br>";
                                print "<hr>";
                                print "<br><br>";

                                print "<table class='table table-hover table striped table-bordered'>";
                                    print "<tr>";
                                        print "<th>Código</th>";
                                        print "<th>Descrição</th>";
                                    print "</tr>";
                                foreach($Dados as $Dd)
                                {
                                    // array
                                    print "<tr>"; 
                                        print "<td>{$Dd['codProd']} </td>";
                                        print "<td>{$Dd['descricao']} </td>";        
                                    print "</tr>"; 
                                    
                                    // objeto
                                    //echo "Matricula {$Dd->Matricula}   <br>";
                                    //echo "Nome      {$Dd->Nome}        <br>";        
                                    //echo "<hr> <br>";
                                }
                                print "</table>";  
                            }    
                        }

                        if (isset($_GET["listarVal"]))
                        {
                            $Dados = $cadastro->validade();

                            if (empty($Dados))
                            {
                                echo "<script> alert('Produtos nao localizadados') </script>";
                                echo "<script>document.location='index-listar-val.php'</script>";
                            }
                            else
                            {   
                                print "<h2>Data de validade</h2><br><br>";
                                print "<hr>";
                                print "<br><br>";

                                print "<table class='table table-hover table striped table-bordered'>";
                                    print "<tr>";
                                        print "<th>Código</th>";
                                        print "<th>Descrição</th>";
                                        print "<th>Validade</th>";
                                    print "</tr>";
                                foreach($Dados as $Dd)
                                {
                                    // array
                                    print "<tr>"; 
                                        print "<td>{$Dd['codProd']} </td>";
                                        print "<td>{$Dd['descricao']} </td>";
                                        print "<td>" . date ('d/m/y', strtotime("{$Dd['validade']}")) . "</td>";           
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





