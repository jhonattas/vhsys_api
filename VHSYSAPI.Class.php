<?php
	/*!
	 * NFe VHSYS
	 *
	 * Copyright 2011, (http://www.vhsys.com.br)
	 * API DE COMUNICAÇÃO WEBSERVICE
	 * Versão da API: v1.0
	 *
	 * Documentação: http://docs.vhsys.com.br
	 * 
	 * NÃO ALTERAR
	 */

	class CommunicationVHSYS 
		{
			var $Campos = ""; //CAMPOS ARRAY QUE SERAM TRANSMITIDOS PARA O NFe VHSYS
			var $Retorno = true; //RETORNA O RESULTADO
			
			function PreparaEnvio()
				{
					if(function_exists('curl_exec'))
						{ return "https://www.vhsys.com/Communication/WebService/"; }
					else
						{ return false; }
				}
				
			function Transmitir()
				{
					$URLcom = CommunicationVHSYS::PreparaEnvio();
					if($URLcom)
						{
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $URLcom);
							curl_setopt($ch, CURLOPT_POST, true);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $this->Campos);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HEADER, false);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($ch, CURLOPT_TIMEOUT, 60);
							$Resposta = curl_exec($ch);
							
							$Erro = curl_error($ch);
							if($Erro)
								{ echo $Erro; }
						  	else 
								{ 
									if($this->Retorno)
										{
											return $Resposta;
										}
								}
							curl_close($ch);
						}
					else
						{
							die("Funcao 'curl_exec' nao existe!");	
						}
				}
		}
?>