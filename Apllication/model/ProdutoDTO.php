<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoDTO
 *
 * @author Venan
 */
class ProdutoDTO extends AbstractDTO {
    public $id;
    public $categoria;
    public $nome;
    public $especificacoes;
    
    function getId() {
        return $this->id;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function getEspecificacoes() {
        return $this->especificacoes;
    }

    function setEspecificacoes($especificacoes) {
        $this->especificacoes = $especificacoes;
    }

        
        public function findAll() {
        $queryString = "SELECT *
                        FROM produto 
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
        public function findProdStock() {
        $queryString = "SELECT *
                        FROM produto 
                        WHERE categoria ='Produto'
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
        public function findAllProdById($id) {
        $queryString = "SELECT *
                        FROM produto 
                        WHERE id='$id'
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
        public function quantidadeStock($idProduto) {
        $queryString = "SELECT id, idProduto, SUM(qtd) as qtdStock 
                                FROM stock 
                                WHERE idProduto = '1«$idProduto'
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

   public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
