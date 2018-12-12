<?php
 
  require "../headset/headset_model.php";
  require "../headset/headset_service.php";
  require "../headset/conexao.php";

  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

  if ($acao == 'inserir'){

	  $headset = new Headset();
	  $headset->__set('tecnico', $_POST['tecnico']);
	  $headset->__set('supervisor', $_POST['supervisor']);
	  $headset->__set('campanha', $_POST['campanha']);
	  $headset->__set('retirado', $_POST['retirado']);
	  $headset->__set('colocado', $_POST['colocado']);
	  $headset->__set('defeito', $_POST['defeito']);
	  $headset->__set('pa', $_POST['pa']);
	  $headset->__set('chamado', $_POST['chamado']);

	  $conexao = new Conexao();

	  $headsetService = new HeadsetService($conexao, $headset);
	  $headsetService->inserir();

	  header('Location: nova_troca.php?inclusao=1'); 
     }else if ($acao == 'recuperar'){
       $headset = new Headset();
       $conexao = new Conexao();

       $headsetService = new HeadsetService($conexao, $headset);
       $headsets = $headsetService->recuperar($inicio, $qnt_result_pg);
       $num_rows = $headsetService->numRows();
       $queryItems = $headsetService->queryItems();

    }else if($acao == 'data'){

       $headset = new Headset();
       $conexao = new Conexao();

       $headsetService = new HeadsetService($conexao, $headset);
	
       $dataOrigem = $headsetService->formataData( $_POST['dataDigitada'] );
       $dataLimite = $headsetService->formataData( $_POST['dataLimite'] );

       $headsets = $headsetService->buscaPorData($dataOrigem, $dataLimite);
       $num_rows = $headsetService->numRowsData($dataOrigem, $dataLimite);

      
    }else if ($acao == 'recuperar2'){
       $headset = new Headset();
       $conexao = new Conexao();

       $headsetService = new HeadsetService($conexao, $headset);
       $headsets = $headsetService->recuperar2();

    }

?>
