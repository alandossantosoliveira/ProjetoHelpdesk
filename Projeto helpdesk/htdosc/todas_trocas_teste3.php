<?php  
       include "menu.php";
       require_once 'validador_login.php';

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

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listar trocas</title>
               	<!--  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
		 <script type="text/javascript" src="js/geraGrafico.js"></script>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
               
	</head>

	<body>


                 
			<div class="row mt-5 ml-3">
                             <!-- <div class="col-sm-3">
				<div id="graficoDefeitos"></div>
                             	<div id="graficoProduto"></div>
		             </div> -->
				<div class="col">
					<div class="container pagina">
						<div class="row">
						  <div class="col">
	                                            <form action="todas_trocas_teste3.php?acao=data" method="post">
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
						<div class="row">
							<div class="table">
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
                                                                            <td><?= $retirado?></td>
									    <td><?= $headset->colocado?></td>
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
								            <td><?= $impressao ?></td>
                                                                            <td><?= $headset->pa?></td>
									    <td><?= $headset->chamado?></td>
                                                            		    <?php $data = date('d/m/Y H:i:s', strtotime($headset->data));?>
									    <td><?= $data?></td>
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

								<div class="row mt-5 d-flex justify-content-between">
								      <div class="col-2">
									<a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
								      </div>
								      <div class="col-2">
									<a class="btn btn-lg btn-success btn-block" href="exportExcel.php">EXCEL</a>
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

				$arrayRetNumb = [$da40, $da70, $pl, $unix, $hw510, $tp];
				//echo '<pre>'; print_r($arrayRetNumb); echo '</pre>';
				$arrayRetText = ['QD DA40', 'QD DA70', 'Plantronics', 'Unixtron', 'HW510', 'TOP USE'];
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
