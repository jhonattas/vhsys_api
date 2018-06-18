<?php
	/*!
	 * NFe VHSYS
	 *
	 * Copyright 2013, (http://www.vhsys.com.br)
	 * API DE COMUNICA��O WEBSERVICE
	 * Vers�o da API: v1.0
	 *
	 * TOKEN (NUMERO GERADO PELO NFE VHSYS) 
	 */
	 
	//FAZ A COMUNICA��O COM O NFE VHSYS
	include("VHSYSAPI.Class.php");
	$vhsys = new CommunicationVHSYS();
	$vhsys->Campos 	= array(
							//CABE�ARIO
							"API" => "Categorias",
							"TOKEN" => "SEU_TOKEN",
							"METODO" => "CADASTRAR",
							
							//CAMPOS
							"nome_categoria" => "teste de integra��oxxxx",
							"status_categoria" => "Ativo",
							"id_categoria" => "" //UTILIZADO APENAS PARA ALTERAR E EXCLUIR
							);
	$retorno = $vhsys->Transmitir();
	
	//TRATA O RETORNO DO NFE VHSYS
	if($retorno)
		{
			if(@$xml = simplexml_load_string($retorno))
				{
					//CRIA AS VARIAVEIS
					$Erro = $xml->Erro;
					$Motivo = $xml->xMotivo; //MENSAGEM DE RETORNO
					$Status = $xml->Status; //STATUS DO RETORNO
					$id_categoria = $xml->id_categoria; //ID DA CATEGORIA
					
					if($Erro == 1)
						{
							//SE HOUVER ALGUM ERRO
							echo "Erro: ".$Motivo."<br>";
						}
					else
						{
							echo $Motivo;
							print_r($xml);
						}
				}
			else
				{
					echo "Houve uma falha na leitura da resposta!<br>".$retorno;	
				}
		}
	else
		{
			echo "Houve uma falha na comunica��o!";	
		}
?>