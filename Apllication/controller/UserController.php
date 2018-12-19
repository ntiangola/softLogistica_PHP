<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author Venan
 */
class UserController extends AbstractController {
        public function save($a){
        $dto = $this->setAttributes($a);
        $dto->save();
        #header("Location: index.php");
        
    }
    
    public function logar($a) {
        session_start();
        $dto = $this->setAttributes($a);
        $dadosLogin = $dto->logarR();
        $logDTO = new LogDTO;        
        $data = date('d-m-Y');
        $hora = date('H:i:s');
        
        if (count($dadosLogin) > 0) {
            $_SESSION['userName'] = $dadosLogin[0]->userName;
            $_SESSION['logedUserId'] = $dadosLogin[0]->id;
            $_SESSION['userTipo'] = $dadosLogin[0]->tipo;
            
            $logDTO->setIdUser($_SESSION['logedUserId']);
            $logDTO->setTipo(1);
            $logDTO->setData_Log($data);
            $logDTO->setHora_Log($hora);
            $logDTO->save();
        
            
          header("Location: Pages/requisicao.php");
         }else{
            header("Location: index.php?menssagem");
           }
   }

    public function logout() {
        session_start();
        
        $logDTO = new LogDTO;        
        $data = date('d-m-Y');
        $hora = date('H:i:s');
        $logDTO->setIdUser($_SESSION['logedUserId']);
        $logDTO->setTipo(2);
        $logDTO->setData_Log($data);
        $logDTO->setHora_Log($hora);
        $logDTO->save();
        
        unset($_SESSION['userName']);
        unset($_SESSION['logedUserId']);
        unset($_SESSION['userTipo']);
        unset($_SESSION['idCliente']);
        header("Location: index.php");
    }


    public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
