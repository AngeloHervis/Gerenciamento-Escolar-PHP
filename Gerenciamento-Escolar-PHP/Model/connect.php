<?php 

class Conexao{

    
    public static function conectar(){
        
        


        try{
            $conn = new PDO("mysql:host=localhost;dbname=escola", 'root', 'positivo');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexão realizada com sucesso!";
            return $conn;
        }
        catch(PDOException $erro)
        {
            echo "Conexão Falhou! => " . $erro->getMessage();
            return null;
        }    

    }

}

?>