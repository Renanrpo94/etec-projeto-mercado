<?php

$bco   = 'mercado'; //nome do banco
$user  = 'root'; // usuario, no caso padrão root 
$senha = ''; //senha para acessar o banco, no caso sem senha


//criou o objeto conexao atraves da classe PDO,
try
{
    $conexao = new PDO("mysql:host=localhost; dbname=$bco", "$user", "$senha"); // mysql, onde está hospedado o banco, nome do banco, usuario e senha
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $conexao->exec("set names utf8");
}   
catch (PDOException $erro)
{
    echo "Erro na conexão" . $erro->getMessage();
}