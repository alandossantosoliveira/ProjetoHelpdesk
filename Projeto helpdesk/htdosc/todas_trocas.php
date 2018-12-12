<?php  
       include "menu.php";
       require_once 'validador_login.php';

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
       $c310 = 0;
       $unix = 0;
       $hw510 = 0;
       $tp = 0;

     if(!isset($_GET['acao']) && $_GET['acao'] != 'data'){
        $acao = 'recuperar';
       //paginação
       $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
       $pagina = (!empty ($pagina_atual)) ? $pagina_atual : 1;
       $qnt_result_pg = 80;

       $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
 
       require 'headset_controller.php';

       $num_pagina = ceil($num_rows/ $qnt_result_pg);
   
	 foreach($queryItems as $chave => $headset){
		  switch( $headset->defeito){
		     case 'MI':
		          $mi++;
			  break;
		     case 'MC':
		          $mc++;
			  break;
		     case 'AFI':
		          $afi++;
			  break;
		     case 'Q':
		          $q++;
			  break;
		     case 'FR':
		          $fr++;
			  break;
		     case 'MU':
		          $mu++;
			  break;
		     case 'CH':
		          $ch++;
			  break;
		  }
			 switch( $headset->retirado){
			     case 'DA40':
			          $da40++;
				  break;
			     case 'DA70':
			          $da70++;
				  break;
			     case 'C310':
			          $c310++;
				  break;
			     case 'UNIX':
			          $unix++;
				  break;
			     case 'HW510':
			          $hw510++;
				  break;
			     case 'TP':
			          $tp++;
				  break;
                        }
         }

     }else{
       require 'headset_controller.php';

	 foreach($headsets as $chave => $headset){
		  switch( $headset->defeito){
		     case 'MI':
		          $mi++;
			  break;
		     case 'MC':
		          $mc++;
			  break;
		     case 'AFI':
		          $afi++;
			  break;
		     case 'Q':
		          $q++;
			  break;
		     case 'FR':
		          $fr++;
			  break;
		     case 'MU':
		          $mu++;
			  break;
		     case 'CH':
		          $ch++;
			  break; 
		  }
			 switch( $headset->retirado){
			     case 'DA40':
			          $da40++;
				  break;
			     case 'DA70':
			          $da70++;
				  break;
			     case 'C310':
			          $c310++;
				  break;
			     case 'UNIX':
			          $unix++;
				  break;
			     case 'HW510':
			          $hw510++;
				  break;
			     case 'TP':
			          $tp++;
				  break;
			  }
              }
   }

   require_once 'verificaActive.php';

   $verifica = new Verifica();

?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listar trocas</title>
               	<!--  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
		<!-- <script type="text/javascript" src="js/geraGrafico.js"></script> -->
                 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.7/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
               
	</head>

	<body>


                     <div class="col "> 
			<div class="row mt-5">
                             <!-- <div class="col-sm-3">
				<div id="graficoDefeitos"></div>
                             	<div id="graficoProduto"></div>
		             </div> -->
				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
						  <div class="col">
	                                            <form action="todas_trocas.php?acao=data" method="post">
                                                      <div class="input-group">
							<input class="form-control" name="dataDigitada" type="text" required placeholder="Busque a partir de uma data. Exemplo: 23/11/2018">
						        <input class="form-control" name="dataLimite" type="text" required placeholder="Especifique uma data limite. Exemplo: 23/12/2018">
						        <div class="input-group-append">
							  <button class="btn btn-info">Buscar</button>
						        </div>
 						      </div>
						    </form>
						  </div>
						</div>
						<div class="row d-flex justify-content-center ">
							<div class="table-wrapper-scroll-y">
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
								     <?php foreach($headsets as $chave => $headset){
								          $total++;
                                                                      ?>
                                                                    	<tr>
                                                                            <td><?= $headset->tecnico?></td>
                                                                            <td><?= $headset->supervisor?></td>
                                                                            <td><?= $headset->campanha?></td>
									    <?php
                                                                                  switch( $headset->retirado){
                                                                                     case 'DA40':
 										          $retirado = 'QD DA40';
											  break;
                                                                                     case 'DA70':
 										          $retirado = 'QD DA70';
											  break;
                                                                                     case 'C310':
 										          $retirado = 'C-310';
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
                                                                            ?>
                                                                            <td><?= $retirado?></td>
									    <td><?= $headset->colocado?></td>
									    <?php

                                                                                  switch( $headset->defeito){
                                                                                     case 'MI':
 										          $impressao = 'Microfone inoperante';
											  break;
                                                                                     case 'MC':
 										          $impressao = 'Mau contato';
											  break;
                                                                                     case 'AFI':
 										          $impressao = 'Alto falante inoperante';
											  break;
                                                                                     case 'Q':
 										          $impressao = 'Quebrado';
											  break;
                                                                                     case 'FR':
 										          $impressao = 'Fio rompido';
											  break;
                                                                                     case 'MU':
 										          $impressao = 'Mau uso';
											  break;
                                                                                     case 'CH':
 										          $impressao = 'Chiando';
											  break; 
                                                                                  }
                                                                            ?>
								            <td><?= $impressao ?></td>
                                                                            <td><?= $headset->pa?></td>
									    <td><?= $headset->chamado?></td>
                                                            		    <?php $data = date('d/m/Y H:i:s', strtotime($headset->data));?>
									    <td><?= $data?></td>
									</tr>
								     <?php } ?>
								 </tbody>

								 <tfoot>
 								     <?php if($num_rows != 0){ ?>
							             <h4>Total: <?=$num_rows?> </h4>
                                                                     <?php }else { ?>
							             <h5><div class="text-danger">Nenhum registro encontrado </div></h5>
                                                                     <?php } ?>
						        	 </tfoot>
								</table>
                                                          
             						</div>
                                                            <div class="container mt-4 ">

                                                              <div class="" >
                                                      <?php  if(!isset($_GET['acao']) && $_GET['acao'] != 'data') { ?>

                                                              <nav aria-label="Navegação de página exemplo">
                                                                  <ul class="pagination  justify-content-center pagination-sm">
                                                              
                                                               <?php  if($num_pagina < 6){
                                                                
                                                                   if ($pagina -1 != 0)
                                                                   $pagina_anterior = $pagina -1;
                                                                   else $pagina_anterior = 1;

                                                                   if ($pagina < $num_pagina)
                                                                   $pagina_posterior = $pagina +1;
                                                                   else $pagina_posterior = $num_pagina;

                                                                   if($pagina == 1){
                                                               ?>
                                                                    <li class="page-item disabled">
                                                                      <a class="page-link" href="#">Anterior</a>
                                                                    </li>
                                                               <?php }else{ ?>
                                                                    <li class="page-item">
                                                                       <a class="page-link" href="todas_trocas.php?pagina=<?= $pagina_anterior ?>">Anterior</a>
                                                                    </li>
                                                               <?php }
                                                                     for($i= 1; $i <= $num_pagina; $i ++){ 
                                                               
                                                                       $active = ""; if($i == $pagina) $active= "active";
                                                               ?>
                                                                       <li class="page-item <?php echo $active; ?>">
                                                                          <a class="page-link" href="todas_trocas.php?pagina=<?php echo $i; ?>"><?= $i ?></a>
                                                                       </li>
                                                                <?php }
                                                                 if($pagina == $num_pagina){
                                                                 ?>
                                                                     <li class="page-item disabled">
                                                                        <a class="page-link" href="#">Próximo</a>
                                                                     </li>
                                                                 <?php }else{  ?>
                                                                     <li class="page-item">
                                                                       <a class="page-link" href="todas_trocas.php?pagina=<?= $pagina_posterior ?>">Próximo</a>
                                                                     </li>
                                                                 <?php } ?>




                                                             <?php  } else{

                                                                           if ($pagina -1 != 0)
	                                                                   $pagina_anterior = $pagina -1;
	                                                                   else $pagina_anterior = 1;

	                                                                   if ($pagina < $num_pagina)
	                                                                   $pagina_posterior = $pagina +1;
	                                                                   else $pagina_posterior = $num_pagina;

                                                                            if($pagina == 1){
                                                              ?>

					                           <li class="page-item disabled">
					                             <a class="page-link" href="#">Primeiro</a>
					                           </li>
					                           <li class="page-item disabled">
					                             <a class="page-link" href="#">Anterior</a>
					                           </li>
					                           <li class="page-item active">
					                             <a class="page-link" href="todas_trocas.php?pagina=1">1</a>
					                           </li>
					                           <li class="page-item ">
					                             <a class="page-link" href="todas_trocas.php?pagina=2">2</a>
					                           </li>
					                           <li class="page-item">
					                             <a class="page-link" href="todas_trocas.php?pagina=3">3</a>
					                           </li>
					                           <li class="page-item disabled">
					                             <a class="page-link" href="#">...</a>
					                           </li>
					                           <li class="page-item" >
					                             <a class="page-link" href="todas_trocas.php?pagina=<?= $pagina_posterior ?>">Próximo</a>
					                           </li>
					                           <li class="page-item">
					                             <a class="page-link" href="todas_trocas.php?pagina=<?= $num_pagina ?>">Último</a>
					                           </li>

                                                                <?php }else if($pagina == $num_pagina){  ?>

					                           <li class="page-item">
					                             <a class="page-link" href="todas_trocas.php?pagina=1">Primeiro</a>
					                           </li>
					                           <li class="page-item">
					                             <a class="page-link" href="todas_trocas.php?pagina=<?= $pagina_anterior ?>">Anterior</a>
					                           </li>
					                           <li class="page-item disabled">
					                             <a class="page-link" href="#">...</a>
					                           </li>
					                           <li class="page-item">
					                             <a class="page-link" href="todas_trocas.php?pagina=<?php echo $num_pagina-2; ?>"> <?php echo $num_pagina-2 ?></a>
					                           </li>
					                           <li class="page-item ">
					                             <a class="page-link" href="todas_trocas.php?pagina=<?php echo $num_pagina-1; ?>"><?php echo $num_pagina-1 ?></a>
					                           </li>
					                           <li class="page-item active">
					                             <a class="page-link" href="todas_trocas.php?pagina=<?= $num_pagina ?>"><?= $num_pagina ?></a>
					                           </li>
					                           <li class="page-item disabled" >
					                             <a class="page-link" href="todas_trocas.php?pagina=<?= $pagina_posterior ?>">Próximo</a>
					                           </li>
					                           <li class="page-item disabled">
					                             <a class="page-link" href="todas_trocas.php?pagina=<?= $num_pagina ?>">Último</a>
					                           </li>
                                                              <?php   }else{   ?>

							           <li class="page-item?>">
							             <a class="page-link" href="todas_trocas.php?pagina=1">Primeiro</a>
							           </li>
							           <li class="page-item?>">
							             <a class="page-link" href="todas_trocas.php?pagina=<?= $pagina_anterior ?>">Anterior</a>
							           </li>
							           <?php if($pagina_anterior != 1) { ?>
							                   <li class="page-item disabled">
							                     <a class="page-link" href="#">...</a>
							                   </li>
							            <?php } ?>
							           <li class="page-item <?php echo $verifica->verificaActive($pagina_anterior, $pagina);  ?>">
							             <a class="page-link" href="todas_trocas.php?pagina=<?= $pagina_anterior ?>"><?=$pagina_anterior?></a>
							           </li>
							           <li class="page-item <?php echo $verifica->verificaActive($pagina_atual, $pagina);  ?>">
							             <a class="page-link" href="todas_trocas.php?pagina=<?= $pagina_atual ?>"><?=$pagina_atual?></a>
							           </li>
							           <li class="page-item <?php echo $verifica->verificaActive($pagina_posterior, $pagina);  ?>">
							             <a class="page-link" href="todas_trocas.php?pagina=<?= $pagina_posterior ?>"><?=$pagina_posterior?></a>
							           </li>
							            <?php if($pagina_posterior != $num_pagina) { ?>
							                   <li class="page-item disabled">
							                     <a class="page-link" href="#">...</a>
							                   </li>
							           <?php } ?>
							           <li class="page-item" >
							             <a class="page-link" href="todas_trocas.php?pagina=<?= $pagina_posterior ?>">Próximo</a>
							           </li>
							           <li class="page-item">
							             <a class="page-link" href="todas_trocas.php?pagina=<?= $num_pagina ?>">Último</a>
							           </li>
                                                              <?php   } ?>
                                                            <?php } ?>
 
                                                                  </ul>
                                                               </nav>
                                                             <?php } ?>

                                                               </div>
                                                             
                                                                <div class="row mt-5">
						                      <div class="col-6">
						                        <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
						                      </div>

						                      <div class="col-6">
						                        <a  class="btn btn-lg btn-success btn-block" href="exportExcel.php">EXCEL</a>
						                      </div>
						                </div>
                                                             </div>
                                                         </div>
           					</div>
     	        			</div>
                        <?php
                                $arrayNumber = array($mc, $afi, $mi, $q, $fr, $mu, $ch);
				$arrayText = ['Mau contato', 'Alto falante inoperante', 'Microfone inoperante', 'Quebrado', 'Fio rompido', 'Mau uso', 'Chiando'];
                                array_multisort($arrayNumber, SORT_DESC, $arrayText);

				$arrayRetNumb = [$da40, $da70, $c310, $unix, $hw510, $tp];
				//echo '<pre>'; print_r($arrayRetNumb); echo '</pre>';
				$arrayRetText = ['QD DA40', 'QD DA70', 'C-310', 'Unixtron', 'HW510', 'TOP USE'];
				array_multisort($arrayRetNumb, SORT_DESC, $arrayRetText);
				
				/*$arrayDefeitos = array (
			           array('Task', 'Defeitos'),
				   array($arrayText[0], $arrayNumber[0]),
				   array($arrayText[1],  $arrayNumber[1]),
				   array($arrayText[2],  $arrayNumber[2]),
				   array($arrayText[3],  $arrayNumber[3]),
				   array($arrayText[4],  $arrayNumber[4]),
				   array($arrayText[5],  $arrayNumber[5]),
				   array($arrayText[6],  $arrayNumber[6]),
                                );

				$arrayProdutos = array (
			           array('Task', 'Produtos'),
                                   array($arrayRetText[0], $arrayRetNumb[0]),
                                   array($arrayRetText[1], $arrayRetNumb[1]),
                                   array($arrayRetText[2], $arrayRetNumb[2]),
                                   array($arrayRetText[3], $arrayRetNumb[3]),
                                   array($arrayRetText[4], $arrayRetNumb[4]),
                                   array($arrayRetText[5], $arrayRetNumb[5])
                                );
				echo '<pre>'; print_r($arrayProdutos); echo '</pre>';*/
                        ?>

                                <div class="col-sm-3">
                                    <div class="card mb-3 px-3 mr-5" style="width: 250px;">
                                       <div class="card-body">
                                         <h5 class="card-title">DEFEITOS</h5><br/>
				         <h6 class="card-subtitle text-muted"><?= $arrayText[0]?></h6>
                                         <p class="card-text"><?= $arrayNumber[0]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayText[1]?></h6>
                                         <p class="card-text"><?= $arrayNumber[1]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayText[2]?></h6>
                                         <p class="card-text"><?= $arrayNumber[2]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayText[3]?></h6>
                                         <p class="card-text"><?= $arrayNumber[3]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayText[4]?></h6>
                                         <p class="card-text"><?= $arrayNumber[4]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayText[5]?></h6>
                                         <p class="card-text"><?= $arrayNumber[5]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayText[6]?></h6>
                                         <p class="card-text"><?= $arrayNumber[6]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayText[7]?></h6>
                                         <p class="card-text"><?= $arrayNumber[7]?></p>
 				      </div>
                                    </div>

                                    <div class="card mb-3 px-3" style="width: 250px;">
                                       <div class="card-body">
                                         <h5 class="card-title">PRODUTOS</h5><br/>
				         <h6 class="card-subtitle text-muted"><?= $arrayRetText[0]?></h6>
                                         <p class="card-text"><?= $arrayRetNumb[0]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayRetText[1]?></h6>
                                         <p class="card-text"><?= $arrayRetNumb[1]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayRetText[2]?></h6>
                                         <p class="card-text"><?= $arrayRetNumb[2]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayRetText[3]?></h6>
                                         <p class="card-text"><?= $arrayRetNumb[3]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayRetText[4]?></h6>
                                         <p class="card-text"><?= $arrayRetNumb[4]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayRetText[5]?></h6>
                                         <p class="card-text"><?= $arrayRetNumb[5]?></p>
				         <h6 class="card-subtitle text-muted"><?= $arrayRetText[6]?></h6>
                                         <p class="card-text"><?= $arrayRetNumb[6]?></p>
 				      </div>
                                    </div>
                                </div>
			</div>




		 <script type="text/javascript">

			var defeitos = JSON.parse( '<?php echo json_encode($arrayDefeitos) ?>' );
			var produtos = JSON.parse( '<?php echo json_encode($arrayProdutos) ?>' );
			
			geraGrafico( defeitos, 'DEFEITOS', 'graficoDefeitos');
			geraGrafico( produtos, 'PRODUTOS', 'graficoProduto');

       			   /*function geraGrafico( titulo, id){

                              google.charts.load("current", {packages:["corechart"]});
			      google.charts.setOnLoadCallback(drawChart);
			      function drawChart() {
			        var data = google.visualization.arrayToDataTable([
			          ['Task', 'Hours per Day'],
			          ['Work',     11],
			          ['Eat',      2],
			          ['Commute',  2],
			          ['Watch TV', 2],
			          ['Sleep',    7]
			        ]);

			        var options = {
			          title: titulo,
			          pieHole: 0.4,
			        };

			        var chart = new google.visualization.PieChart(document.getElementById(id));
			        chart.draw(data, options);
			      }
                         }*/

	
		</script>
 
		
	</body>
</html>
