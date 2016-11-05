<?php

require_once 'Conn.php';

class AutenticaUsers extends Conn
{
	private $user;
	private $pass;


	public function AutenticaUsers($user, $pass, $_token)
	{
		  $this->user = $user;
		  $this->pass = $pass;
		  $this->_token = $_token;
		  $this->validar();
          $this->autenticar();
		  // echo $this->user = $user;
		  // echo $this->pass = $pass;
	}
	
    //AUTENTICANDO USER
    private function autenticar()
    {

    	$stmt = $this->conexao()->prepare("SELECT id FROM usuarios WHERE user = :user and pass = :pass");
    	$stmt->bindParam(":user", $this->user, PDO::PARAM_STR, 50);
    	$stmt->bindParam(":pass", $this->pass, PDO::PARAM_STR, 18);

    	$stmt->execute();
        $row = $stmt->rowCount();

    	if($row == 1){
             echo json_encode(["status" => true, "msg"=>"Usuário logado com sucesso !"]);
             exit();
    	}else{
    		 echo json_encode(["status" => false, "msg"=>"Usuário não cadastrado !"]);
    		 exit();
    	}
    }
     //VALIDAÇÃO
    private function validar()
    {
          $local = isset($_SERVER['SERVER_NAME'])?$_SERVER['SERVER_NAME']:null;
          

         /*Coloque um token para validar se realmente a solicitação esta 
         requisitada do seu formulário*/

	     if($local."/login-security/index.php" === "localhost/login-security/index.php"){
	     	    session_start();
	     	    $_token = $_SESSION['_token'];
                if($_token != $this->_token){
                  echo json_encode(["status" => false, "msg"=>"O formulário vem de uma fonte não confiável !"]);
		    		exit();
                }
		    	if(empty($this->user) or empty($this->pass)){
		    		echo json_encode(["status" => false, "msg"=>"Esses campos não pode ser vazios !"]);
		    		exit();
		    	}
		    	if(strlen($this->user) < 8 or strlen($this->user) > 50){
		            echo json_encode(["status" => false, "msg"=>"E-mail deve ter de 8 á 40 carac. !"]);
		            exit();
		    	}
		    	if(strlen($this->pass) < 8 or strlen($this->pass) > 18){
		            echo json_encode(["status" => false, "msg"=>"Senha deve ter de 8 á 18 carac. !"]);
		            exit();
		    	}

		    	/*
		    	*  validar E-mail com uma expressão regular.
                *  $email = exemplo@email.com.
                *  preg_match('/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/', $email) == false
                *
                *
		    	*/

		    	//======================================

		    	/*
		    	*validar Senha com uma expressão regular.
		    	*  
                *  $senha = 12345678
                *  preg_match('/^[a-zA-Zà-úÀ-Ú0-9_\.\-\@]+$/', $senha) == false
                *
                *
		    	*/
                  
	    }else{
	    	echo json_encode(["status" => false, "msg"=>"Error na solicitação. !"]);
	        exit();
	    }
	       
   }
    
}
