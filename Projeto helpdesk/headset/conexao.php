<?php

 class Conexao{
      public function conectar(){
  
         try{
            $conexao = new PDO("mysql:host=localhost;dbname=helpdesk",
                    "root", "linuxconfig.org"); 
            
            return $conexao;
         }catch (PDOException $e){
             echo '<p>'.$e->getMessage().'</p>';
          }
       }

}

?>
