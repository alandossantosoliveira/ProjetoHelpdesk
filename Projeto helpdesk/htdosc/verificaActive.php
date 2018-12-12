<?php 

  class Verifica {

     function verificaActive($pagina, $pagina_atual){
          
         $active = "";

         if($pagina == $pagina_atual) $active = "active";

         return $active;
     }

    function verificaEtcDisabled($etc){
  
       $disabled = "";
     
       if($etc == "...") $disabled = "disabled";

       return $disabled;
   }

   function verificaHrefEtc($etc){
 
       $href="#";

      if($etc != "...") $href= "todas_trocas.php?pagina=".$etc;

      return $href;
   }

    function verificaPrimeiro($pagina_anterior){
      
           $disabled = "";
        
          if($pagina_anterior == 0){
            $disabled = "disabled";
          }
      return $disabled;
   }

   function verificaUltimo($pagina_atual, $ultima_pagina){

         $disabled = "";

         if($pagina_atual == $ultima_pagina) $disabled = "disabled";
     
         return $disabled;
   }

   function verificaEtcAnt($pagina_anterior){

       $etc= "...";

       if( $pagina_anterior-1 <= 1 || $pagina_anterior == 1 ) $etc = 1;

       return $etc;
   }

    function verificaEtcPost($pagina_posterior, $ultima_pagina){
    
       $etc= "..."; 
       if($pagina_posterior +1 == $ultima_pagina ) $etc = $ultima_pagina; 
       
       return $etc; 
   }

}

?>
