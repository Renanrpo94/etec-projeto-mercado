 
 <?php

//cria a classe
class cadProd{
    
    private $codProd;
    private $descricao;
    private $valor;
    private $validade;
    private $ordem;
    private $dataVal1;
    private $dataVal2;

    //---------------------------------------------
    
    public function getcodProd(){
        return $this->codProd;
    }
    public function setcodProd($cp){
        $this->codProd = $cp;
    }
    //---------------------------------------------
    
    public function getdescricao(){
        return $this->descricao;
    }
    public function setdescricao($desc){
        $this->descricao = $desc;
    }
    //---------------------------------------------
    
    public function getvalor(){
        return $this->codProd;
    }
    public function setvalor($vl){
        $this->valor = $vl;
    }
    //---------------------------------------------   
    
    public function getvalidade(){
        return $this->codProd;
    }
    public function setvalidade($val){
        $this->validade = $val;
    }
    //--------------------------------------------- 

    public function getordem(){
        return $this->ordem;
    }
    public function setordem($or){
        $this->ordem = $or;
    }
    //---------------------------------------------

    public function getdataVal1(){
        return $this->dataVal1;
    }
    public function setdataVal1($dtv1){
        $this->dataVal1 = $dtv1;
    }
    //------------------------------------------------------------------

    public function getdataVal2(){
        return $this->dataVal2;
    }
    public function setdataVal2($dtv2){
        $this->dataVal2 = $dtv2;
    }
    
    //---------------------------------------------------------------------------
    //metodo cadastrar produtos
    public function inserir()
    {

        include_once "conexao.php";

        try {
            $comando=$conexao->prepare("insert into produto (codProd,descricao,valor,validade) values (?,?,?,?)");
            $comando->bindParam(1,$this->codProd);
            $comando->bindParam(2,$this->descricao);
            $comando->bindParam(3,$this->valor);
            $comando->bindParam(4,$this->validade);

            if ($comando->execute())
            {
               $retorno =  "<script>alert('Cadastrado com sucesso');</script><script>location.href='index-cad.php';</script>";
            }   
        } catch (PDOException $erro){
            $retorno = 'Erro' . $erro->getMessage();
        }

        return $retorno;
    }
    //-----------------------------------------------------------------------
    
    //metodo apagar produtos
    public function apagar()
    {

        include_once "conexao.php";

        try {
            $comando=$conexao->prepare("delete from produto where codProd = ?");
            $comando->bindParam(1,$this->codProd);

            if ($comando->execute())
            {
               $retorno = "<script>alert('Excluido com sucesso');</script><script>location.href='index-cad.php';</script>";
            }   
        } catch (PDOException $erro){
            $retorno = 'Erro' . $erro->getMessage();
        }

        return $retorno;


    }

    //-------------------------------------------------------------------------
    
    public function listar()
    {

        include_once "conexao.php";

        try 
        {         
            if($this->ordem == 'c')
            {
                $Comando=$conexao->prepare("select codProd, descricao, validade from produto order by codProd");
                //$Comando->bindParam(1,$this->ordem);
            }
            else
            {
                $Comando=$conexao->prepare("select codProd, descricao, validade from produto order by descricao");
                //$Comando->bindParam(1,$this->ordem);
            }

            $Comando->execute();
            // array
            $retorno = $Comando->fetchAll(PDO::FETCH_ASSOC); 
            // objeto
            //$Retorno = $Comando->fetchAll(PDO::FETCH_OBJ);  
        } 
        catch (PDOException $erro)
        {
            $retorno = 'Erro' . $erro->getMessage();
        }

        return $retorno;
    }

    //----------------------------------------------------------------------------------

    public function validade()
    {
        include_once "conexao.php";

        try 
        {         
            $comando=$conexao->prepare("select * from produto where validade >= ? and validade < ? order by validade;");
            
            $comando->bindParam(1,$this->dataVal1);
            $comando->bindParam(2,$this->dataVal2);

            $comando->execute();
            $retorno = $comando->fetchAll(PDO::FETCH_ASSOC); 
        } 
        catch (PDOException $erro)
        {
            $retorno = 'Erro' . $erro->getMessage();
        }

        return $retorno;
    }
}

