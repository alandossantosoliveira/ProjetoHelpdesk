<?php 
 
   require 'validador_login.php';

   if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'helpdesk'){
    header('Location: index.php?login=erro2');
   }
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <style>
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>
  
  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
	<div class="bg-success pt-2 text-white d-flex justify-content-center mt-4">
	    <h5>Registro inserido com sucesso!</h5>
        </div>
    <?php } ?>

    <div class="container app">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Nova troca
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form action="headset_controller.php?acao=inserir" method="post">

                    
                    <div class="form-group">
                      <label>Tecnico</label>
                      <select required class="form-control" name="tecnico">
                         <option value="" disabled selected>---</option>
                        <option value="Alan">Alan</option>
                        <option value="Alessandro">Alessandro</option>
                        <option value="Clodoaldo">Clodoaldo</option>
                        <option value="Felipe">Felipe</option>
                        <option value="Marcelo">Marcelo</option>
                        <option value="Mikael">Mikael</option>
                        <option value="Moises">Moises</option>
                        <option value="Rodrigo">Rodrigo</option>
                        <option value="Eduardo">Eduardo</option>
                        <option value="Sidney">Sidney</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Retirado</label>
                      <select required class="form-control" name="retirado">
                         <option value="" disabled selected>---</option>
                        <option value="DA40">QD DA40</option>
                        <option value="DA70">QD DA70</option>
                        <option value="C310">C-310</option>
                        <option value="UNIX">Unixtron</option>
                        <option value="HW510">HW510</option>
                        <option value="TP">Top Use</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Colocado</label>
                      <select required class="form-control" name="colocado">
                         <option value="" disabled selected>---</option>
                        <option value="DA40">QD DA40</option>
                        <option value="DA70">QD DA70</option>
                        <option value="C310">C-310</option>
                        <option value="Unixtron">Unixtron</option>
                        <option value="HW510">HW510</option>
                        <option value="TOP USE">Top Use</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Defeito</label>
                      <select required class="form-control" name="defeito">
                        <option value="" disabled selected>---</option>
                        <option value="CH">Chiando</option> 
                        <option value="MC">Mau contato</option>
                        <option value="AFI">Alto falante inoperante</option>
                        <option value="MI">Mic inoperante</option>
                        <option value="Q">Quebrado</option>
                        <option value="FR">Fio rompido</option>
                        <option value="MU">Mau uso</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Supervidor</label>
                      <input type="text" name="supervisor" required class="form-control" placeholder="Exemplo: Daiane Ferrari">
                    </div>

                    <div class="form-group">
                      <label>Campanha</label>
                      <input type="text" name="campanha" required class="form-control" rows="3" placeholder="Exemplo: Combo Multi">
                    </div>

                    <div class="form-group">
                      <label>PA</label>
                      <input type="number" name="pa" required class="form-control" rows="3" placeholder="Exemplo: 2005">
                    </div>

                    <div class="form-group">
                      <label>Chamado</label>
                      <input type="number" name="chamado" required class="form-control" rows="3" placeholder="Exemplo: 5888">
                    </div>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block">Abrir</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
