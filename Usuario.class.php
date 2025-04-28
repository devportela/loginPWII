<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;    
    private $pdo;

    public function __construct(){
        $dns    = "mysql:dbname=usuariosLogin;host=localhost"; 
        $dbUser = "root";
        $dbPass = "";
        try {
            $this->pdo = new PDO($dns, $dbUser, $dbPass);           
            return true;
        } catch (\Throwable $th){           
            return false;
        }   
    }

    public function cadastrar($nome, $email, $senha){
    
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";
        
    
        $stmt = $this->pdo->prepare($sql);

        
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);

       
        return $stmt->execute();
    }

   

    }
