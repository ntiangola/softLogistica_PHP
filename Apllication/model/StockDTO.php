<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StockDTO
 *
 * @author Venan
 */
class StockDTO extends AbstractDTO {
    public $id;
    public $idProduto;
    public $qtd;
    public $dataEntrada;
    public $horaEntrada;
    public $dataExpiracao;
    
    function getId() {
        return $this->id;
    }

    function getIdProduto() {
        return $this->idProduto;
    }

    function getQtd() {
        return $this->qtd;
    }

    function getDataEntrada() {
        return $this->dataEntrada;
    }

    function getHoraEntrada() {
        return $this->horaEntrada;
    }

    function getDataExpiracao() {
        return $this->dataExpiracao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    function setQtd($qtd) {
        $this->qtd = $qtd;
    }

    function setDataEntrada($dataEntrada) {
        $this->dataEntrada = $dataEntrada;
    }

    function setHoraEntrada($horaEntrada) {
        $this->horaEntrada = $horaEntrada;
    }

    function setDataExpiracao($dataExpiracao) {
        $this->dataExpiracao = $dataExpiracao;
    }

public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
