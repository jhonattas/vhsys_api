<?php
	/*!
	 * NFe VHSYS
	 *
	 * Copyright 2013, (http://www.vhsys.com.br)
	 * API DE COMUNICAÇÃO WEBSERVICE
	 * Versão da API: v1.0
	 *
	 * TOKEN (NUMERO GERADO PELO NFE VHSYS) 
	 */
	 
	//FAZ A COMUNICAÇÃO COM O NFE VHSYS
	include("VHSYSAPI.Class.php");
	$vhsys = new CommunicationVHSYS();
	$vhsys->Campos 	= array(
							//CABEÇARIO
							"API" => "Pedidos",
							"TOKEN" => "SEU_TOKEN",
							"METODO" => "LISTARPED",
							"QTDELISTA" => 20 /*LISTAR OS ULTIMOS 20 PEDIDOS*/);
	$retorno = $vhsys->Transmitir();
	
	//TRATA O RETORNO DO NFE VHSYS
	if($retorno)
		{
			$dados = json_decode($retorno);
			echo "<pre>";
			print_r($dados);
		}
	else
		{
			echo "Houve uma falha na comunicação!";	
		}
?>