<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDTO
 *
 * @author Venan
 */
class UserDTO extends AbstractDTO {
    public $id;
    public $idFuncionario;
    public $tipo;
    public $userName;
    public $senha;
    
    function getId() {
        return $this->id;
    }

    function getIdFuncionario() {
        return $this->idFuncionario;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getUserName() {
        return $this->userName;
    }

    function getSenha() {
        return $this->senha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setSenha($senha) {
        $this->senha = md5($senha);
    }

    
    
    public function logarR() {
        $queryString = "SELECT * FROM {$this->table} 
                        WHERE userName = '{$this->userName}' AND senha = '{$this->senha}'";
        $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
        }
    public function findUser() {
        $queryString = "SELECT u.*, f.nome 
                        FROM {$this->table} u 
                        INNER JOIN funcionario f ON f.id = u.idFuncionario 
                        ";
        $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
         
    }
    public function findUserById($id) {
        $queryString = "SELECT u.*, f.nome
                        FROM {$this->table} u 
                        INNER JOIN funcionario f ON f.id = u.idFuncionario
                        WHERE u.id = '$id'
                        ";
        $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
       }
        
    public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
