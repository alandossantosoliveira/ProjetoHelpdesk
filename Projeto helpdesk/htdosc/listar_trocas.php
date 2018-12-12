 <?php 

      if(!isset($_GET['acao']) && $_GET['acao'] != 'data'){
        $acao = 'recuperar';
      }
       require 'headset_controller.php';
       $total = 0;
       $mc= 0;
       $afi = 0;
       $mi = 0;
       $q = 0;
       $fr= 0;
       $mu = 0;
       $ch = 0;

       $da40 = 0;
       $da70 = 0;
       $pl = 0;
       $unix = 0;
       $hw510 = 0;
       $tp = 0;

  ?>
         <table class="table table-striped table-borderless table-sm">
                                                                 <thead>
                                                                    <th>Tecnico</th>
                                                                    <th>Supervisor</th>
                                                                    <th>Campanha</th>
                                                                    <th>Retirado</th>
                                                                    <th>Colocado</th>
                                                                    <th>Defeito</th>
                                                                    <th>PA</th>
                                                                    <th>Chamado</th>
                                                                    <th>Data</th>
                                                                 </thead>

                                                                 <tbody>


	   <?php
                     // echo'<pre>'; print_r($headsets); echo '</pre>';
		      foreach($headsets as $chave=> $headset){ 
	              $total++;
            ?>     
                    	<tr>
                            <td><?php echo $headset->tecnico; ?></td>
                            <td><?php echo $headset->supervisor; ?></td>
                            <td><?php echo $headset->campanha;?></td>
			    <?php
                                  switch( $headset->retirado){
                                     case 'DA40':
				          {$da40++; $retirado = 'QD DA40';}
					  break;
                                     case 'DA70':
				          {$da70++; $retirado = 'QD DA70';}
					  break;
                                     case 'PL':
				          {$pl++; $retirado = 'Plantronics';}
					  break;
                                     case 'UNIX':
				          {$unix++; $retirado = 'Unixtron';}
					  break;
                                     case 'HW510':
				          {$hw510++; $retirado='HW510';}
					  break;
                                     case 'TP':
				          {$tp++; $retirado = 'TOP USE';}
					  break;
                                  }
                            ?>
                            <td><?php echo $headset->retirado; ?></td>
			    <td><?php echo $headset->coloado; ?></td>
			    <?php

                                  switch( $headset->defeito){
                                     case 'MI':
				          {$mi++; $impressao = 'Microfone inoperante';}
					  break;
                                     case 'MC':
				          {$mc++; $impressao = 'Mau contato';}
					  break;
                                     case 'AFI':
				          {$afi++; $impressao = 'Alto falante inoperante';}
					  break;
                                     case 'Q':
				          {$q++; $impressao = 'Quebrado';}
					  break;
                                     case 'FR':
				          {$fr++; $impressao = 'Fio rompido';}
					  break;
                                     case 'MU':
				          {$mu++; $impressao = 'Mau uso';}
					  break;
                                     case 'CH':
				          {$ch++; $impressao = 'Chiando';}
					  break; 
                                  }  
                            ?>
		            <td><?php echo $impressao; ?></td>
                            <td><?php echo $headset->pa; ?></td>
			    <td><?php echo $headset->chamado; ?></td>
            		    <?php $data = date('d/m/Y H:i:s', strtotime($headset->data));?>
			    <td><?php echo $data; ?></td>
			</tr>
		     <?php } ?>
                      </tbody>

                 <tfoot>
                     <?php if($total != 0){ ?>
                     <h4>Total: <?=$total?> </h4>
                     <?php }else { ?>
                     <h5><div class="text-danger">Nenhum registro encontrado </div></h5>
                     <?php } ?>
                 </tfoot>
                </table>
      
