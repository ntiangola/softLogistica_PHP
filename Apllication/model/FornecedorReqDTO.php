<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FornecedorReqDTO
 *
 * @author Venan
 */
class FornecedorReqDTO extends AbstractDTO {
    public $id;
    public $idProduto;
    public $idFornecedor;
    public $sessao;
    
    function getId() {
        return $this->id;
    }

    function getIdProduto() {
        return $this->idProduto;
    }

    function getIdFornecedor() {
        return $this->idFornecedor;
    }

    function getSessao() {
        return $this->sessao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    function setIdFornecedor($idFornecedor) {
        $this->idFornecedor = $idFornecedor;
    }

    function setSessao($sessao) {
        $this->sessao = $sessao;
    }

          public function findFornecedorByReq($sessao) {
        $queryString = "SELECT fr.*, f.nome
                            FROM fornecedorreq fr
                            INNER JOIN fornecedor f ON fr.idFornecedor = f.id 
                            WHERE fr.sessao = '$sessao'
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
