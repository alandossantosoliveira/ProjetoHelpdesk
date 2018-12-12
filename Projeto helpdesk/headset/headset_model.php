<?php
  class Headset {
    private $id;
    private $tecnico;
    private $supervisor;
    private $campanha;
    private $retirado;
    private $colocado;
    private $defeito;
    private $pa;
    private $chamado;
    private $data;

    public function __get($atributo){
       return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

}

?>
