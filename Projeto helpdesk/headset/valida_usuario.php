<?php
  
  session_start();

  if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'helpdesk'){
    header('Location: home.php?usuario=1');
  }else{
    header('Location: nova_troca.php');
  }

?>
