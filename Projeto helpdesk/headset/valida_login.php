<?php 
   
   session_start();

   $autenticado = false;

   $usuarios = array(
                ['login'=> 'helpdesk', 'senha'=> 'admin@123'],
                ['login'=> 'usuario', 'senha'=> 'usuario']
              );



     foreach($usuarios as $usuario){
        if( ($usuario['login'] == $_POST['login']) && ( $usuario['senha'] == $_POST['senha']) ){
             $autenticado = true;
             $user = $usuario['login'];
        }
     }

    if($autenticado){
      $_SESSION['autenticado'] = 'SIM';
      $_SESSION['usuario'] = $user;
      header('Location: home.php');
    }else{
      $_SESSION['autenticado'] = 'NAO';
      header('Location: index.php?login=erro');
    }
?>
