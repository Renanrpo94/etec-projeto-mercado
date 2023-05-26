<?php

//arquivo onde está a classe
include_once "clsmovto.php";

//instanciou a classe para um objeto
$movimentacao = new movto();

//armazena os inputs nas respectiveis variaveis
$codProd   = filter_input(INPUT_GET,'codProd',FILTER_VALIDATE_INT);
$tipo      = filter_input(INPUT_GET,'tipo');
$qtde      = filter_input(INPUT_GET,'qtde',FILTER_SANITIZE_NUMBER_FLOAT);
$datamov  = filter_input(INPUT_GET,'datamov');

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

