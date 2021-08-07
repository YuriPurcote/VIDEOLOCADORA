<?php
class Cliente
{

  public $nome  ;
  public $numero ;
  public $cpf  ;

  /* nome */
  public function getNome() {
    return $this->nome;
  }
  
  public function setNome($name) {
    $this->nome= $name;
  }
  /* numero */
  public function getNumero() {
    return $this->numero;
  }
  
  public function setNumero($numero) {
    $this->numero= $numero;
  }
  /* CPF */
  public function getCpf() {
    return $this->cpf;
  }
  
  public function setCpf($cpf) {
    $this->cpf= $cpf;
  }
}
