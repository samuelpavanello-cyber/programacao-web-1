<?php
class Contato {
    private $tipo;
    private $nome;
    private $valor;

    public function getTipo(){
        return $this->tipo;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }
    

}