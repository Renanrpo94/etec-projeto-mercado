<?php

//cria a classe
class movto{
    
    private $codProd;
    private $tipo;
    private $qtde;
    private $datamov;
    //---------------------------------------------
    
    public function getcodProd(){
        return $this->codProd;
    }
    public function setcodProd($cp){
        $this->codProd = $cp;
    }
    //---------------------------------------------
    
    public function gettipo(){
        return $this->tipo;
    }
    public function settipo($tp){
        $this->tipo = $tp;
    }
    //---------------------------------------------
    
    public function getqtde(){
        return $this->qtde;
    }
    public function setqtde($qt){
        $this->qtde = $qt;
    }
    //---------------------------------------------   
    
    public function getdatamov(){
        return $this->datamov;
    }
    public function setdatamov($dm){
        $this->datamov = $dm;
    }
    //--------------------------------------------- 
    
    //metodo incluir qtde produtos na tabela movto
    public function incluir(){

        include_once "conexao.php";

        try {
            $comando=$conexao->prepare("insert into movto (codProd,tipo,qtde,datamov) values (?,?,?,?)");
            $comando->bindParam(1,$this->codProd);
            $comando->bindParam(2,$this->tipo);
            $comando->bindParam(3,$this->qtde);
            $comando->bindParam(4,$this->datamov);

            if ($comando->execute())
            {
               $retorno = "<script>alert('movimento cadastrado com sucesso');</script><script>location.href='index-estoque.php';</script>";
            }   
        } catch (PDOException $erro){
            $retorno = 'Erro' . $erro->getMessage();
        }

        return $retorno;
    }
    //-----------------------------------------------------------------------
    
    //metodo apagar qtde de produtos da tabela movto
    public function excluir(){

        include_once "conexao.php";

        try {
            $comando=$conexao->prepare("delete from movto where codProd = ?");
            $comando->bindParam(1,$this->codProd);

            if ($comando->execute())
            {
               $retorno = "<script>alert('movimento excluido com sucesso');</script><script>location.href='index-estoque.php';</script>";
            }   
        } catch (PDOException $erro){
            $retorno = 'Erro' . $erro->getMessage();
        }

        return $retorno;


    }
}