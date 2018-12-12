<?php

 
   $acao = 'recuperar2';
 

 require 'headset_controller.php';
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
           <meta charset="utf-8">
           <title>Headset</title> 
    <head>
    <body>

      <?php  

          $arquivo = 'troca-headsets.xls';

          $html = '';
          $html .= '<table border="1">';
          $html .= '<tr>';
          $html .= '<td colspan="10">Planilha de Controle de troca de headsets</td>';
          $html .= '</tr>';

          $html .= '';
          $html .= '<tr>';
          $html .= '<td><b>ID-registro</b></td>';
          $html .= '<td><b>Tecnico</b></td>';
          $html .= '<td><b>Supervisor</b></td>';
          $html .= '<td><b>Campanha</b></td>';
          $html .= '<td><b>Retirado</b></td>';
          $html .= '<td><b>Colocado</b></td>';
          $html .= '<td><b>Defeito</b></td>';
          $html .= '<td><b>PA</b></td>';
          $html .= '<td><b>Chamado</b></td>';
          $html .= '<td><b>Data</b></td>';
          $html .= '</tr>';
         
          foreach($headsets as $chave => $headset){
            $html .= '<tr>';
            $html .= '<td>'.$headset->id.'</td>';
            $html .= '<td>'.$headset->tecnico.'</td>';
            $html .= '<td>'.$headset->supervisor.'</td>';
            $html .= '<td>'.$headset->campanha.'</td>';

            switch( $headset->retirado){
             case 'DA40':
                  $retirado = 'QD DA40';
                  break;
             case 'DA70':
                  $retirado = 'QD DA70';
                  break;
             case 'C310':
                  $retirado = 'C310';
                  break;
             case 'UNIX':
                  $retirado = 'Unixtron';
                  break;
             case 'HW510':
                  $retirado='HW510';
                  break;
             case 'TP':
                  $retirado = 'TOP USE';
                  break;
            }
            $html .= '<td>'.$retirado.'</td>';
            $html .= '<td>'.$headset->colocado.'</td>';
            switch( $headset->defeito){
              case 'MI': 
                    $defeito = 'Microfone inoperante';
	            break;
              case 'MC': 
                    $defeito = 'Mau contato';
	            break;
              case 'AFI': 
                    $defeito = 'Alto falante inoperante';
	            break;
              case 'Q': 
                    $defeito = 'Quebrado';
	            break;
              case 'FR': 
                    $defeito = 'Fio rompido';
	            break;
              case 'MU': 
                    $defeito = 'Mau uso';
	            break;
              case 'CH': 
                    $defeito = 'Chiando';
	            break;
            }
            $html .= '<td>'.$defeito.'</td>';
            $html .= '<td>'.$headset->pa.'</td>';
            $html .= '<td>'.$headset->chamado.'</td>';
            $data = date('d/m/Y H:i:s', strtotime($headset->data));
            $html .= '<td>'.$data.'</td>';
            $html .= '</tr>';
          }

	  //header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
          //header("Last Modified:  " . gmdate("D,d M YH:i:s"). "GMT");
          header("Cache-Control: no-cache, must-revalidate ");
          header("Pragma: no-cache ");
          header("Content-type: application/x-msexcel");
          header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
          header("Content-Description: PHP Generated Data");

         echo $html;
         exit;   ?>
   
    </body>
</html>
