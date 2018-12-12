<?php
  date_default_timezone_set(@date_default_timezone_get());

  class HeadsetService {

   private $conexao;
   private $headset;

  public function __construct(Conexao $conn, Headset $head){
      $this->conexao = $conn->conectar();
      $this->headset = $head;
  }
   
  public function inserir(){
   // for ($i = 0; $i < 3000; $i++){
      $query = "insert into headset (tecnico, supervisor, campanha, retirado, colocado, defeito, pa, chamado)"
                ." values (:tecnico, :supervisor, :campanha, :retirado, :colocado, :defeito, :pa, :chamado)";
      $stm = $this->conexao->prepare($query);
      $stm->bindValue(':tecnico', $this->headset->__get('tecnico'));
      $stm->bindValue(':supervisor', $this->headset->__get('supervisor'));
      $stm->bindValue(':campanha', $this->headset->__get('campanha'));
      $stm->bindValue(':retirado', $this->headset->__get('retirado'));
      $stm->bindValue(':colocado', $this->headset->__get('colocado'));
      $stm->bindValue(':defeito', $this->headset->__get('defeito'));
      $stm->bindValue(':pa', $this->headset->__get('pa'));
      $stm->bindValue(':chamado', $this->headset->__get('chamado'));
      $stm->execute();
    //}

   }

   public function formataData($dataa){
    
    $orderdate = explode('/', $dataa);
    $day = $orderdate[0];
    $month = $orderdate[1];
    $ano = $orderdate[2];

    return $ano.'-'.$month.'-'.$day;
  
   }

    
   public function recuperar($inicio, $qtd){

      $query = 'select *from headset order by id desc LIMIT '.$inicio.', '.$qtd;
      $stm = $this->conexao->prepare($query);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
   }
  
   public function numRows(){
      $query = 'select *from headset';
      $stm = $this->conexao->prepare($query);
      $stm->execute();
      return $stm->rowCount();
  }

   public function queryItems(){
      $query = 'select *from headset';
      $stm = $this->conexao->prepare($query);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
  }

   public function recuperar2(){

      $query = 'select *from headset order by id desc';
      $stm = $this->conexao->prepare($query);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
   }


   public function buscaPorData($dataOrigem, $dataLimite){
     //$query = 'select *from headset where data >= "'.$dataOrigem.'%" and data <= "'.$dataLimite.'%" order by id desc';
     $query = 'select *from headset where data BETWEEN "'.$dataOrigem.'" AND "'.$dataLimite.'" order by id desc';
     $stm = $this->conexao->prepare($query);
     //$stm->bindValue(':dataOrigem', $dataOrigem.'%');
     //$stm->bindValue(':dataLimite', $dataLimite.'%');
     $stm->execute();
     return $stm->fetchAll(PDO::FETCH_OBJ);
   }

   public function numRowsData($dataOrigem, $dataLimite){
     $query = 'select *from headset where data >= :dataOrigem and data <= :dataLimite order by data desc';
     $stm = $this->conexao->prepare($query);
     $stm->bindValue(':dataOrigem', $dataOrigem.'%');
     $stm->bindValue(':dataLimite', $dataLimite.'%');
     $stm->execute();
     return $stm->rowCount();
   }

   public function atualizar(){

   }

   public function remover(){

   }
 }
?>
