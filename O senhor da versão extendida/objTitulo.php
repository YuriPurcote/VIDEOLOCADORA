<?php
class Titulo
{

  public $nome  ;
  public $qtd ;
  public $disp ;

  /* nome */
  public function getNome() {
    return $this->nome;
  }
  
  public function setNome($nome) {
    $this->nome= $nome;
  }
  /* numero */
  public function getQtd() {
    return $this->qtd;
  }
  
  public function setQtd($qtd) {
    $this->qtd= $qtd;
  }
  /* disponivel */
  public function getDisp() {
    return $this->disp;
  }
  
  public function setDisp($disp) {
    $this->disp= $disp;
  }
}
