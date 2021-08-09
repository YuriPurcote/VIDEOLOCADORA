<?php
class Alugado
{

  public $titulo  ;
  public $cliente ;
  public $retirada ;

  /* titulo */
  public function getTitulo() {
    return $this->titulo;
  }
  
  public function setTitulo($titulo) {
    $this->titulo= $titulo;
  }
  /* Cliente */
  public function getCliente() {
    return $this->cliente;
  }
  
  public function setCliente($cliente) {
    $this->cliente= $cliente;
  }
  /* Retirada */
  public function getRetirada() {
    return $this->retirada;
  }
  
  public function setRetirada($retirada) {
    $this->retirada= $retirada;
  }
}
