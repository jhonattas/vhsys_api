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
							"API" => "Clientes",
							"TOKEN" => "SEU_TOKEN",
							"METODO" => "ALTERAR",
							
							//CAMPOS
							"tipo_pessoa" => "PJ", //PJ ou PF
							"tipo_cadastro" => "Cliente", //Cliente ou Fornecedor ou Ambos
							"cnpj_cliente" => "12.702.717/0001-64", //XX.XXX.XXX/XXXX/XX
							"razao_cliente" => "Teste de integra��o",
							"fantasia_cliente" => "Teste de integra��o",
							"endereco_cliente" => "Rua teste",
							"numero_cliente" => "555",
							"bairro_cliente" => "Centro",
							"complemento_cliente" => "Sala 10",
							"cep_cliente" => "83.045-170", //XX.XXX-XXX
							"cidade_cliente" => "S�o Jos� dos Pinhais",
							"uf_cliente" => "PR",
							"fone_cliente" => "(41) 3035-7775", //(XX) XXXX-XXXX
							"email_cliente" => "teste@teste.com.br",
							"insc_estadual_cliente" => "9053663785", //Ativo ou Inativo
							"situacao_cliente" => "Ativo", //Ativo ou Inativo
							"observacoes_cliente" => "teste obs",
							"id_cliente" => "" //UTILIZADO APENAS PARA ALTERAR E EXCLUIR
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
					$id_cliente = $xml->id_cliente; //ID DO CLIENTE
					
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