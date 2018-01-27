<?php 
$headers = [
			"Accept: text/xml"
		];

		// Criando requisição
		$ch = curl_init();

		// Alterando o cabeçalho da requisição
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		// Alterando url da requisição
		curl_setopt($ch, CURLOPT_URL,"http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx/CalcPrecoPrazo");

		// Alterando para post (0, 1)
		curl_setopt($ch, CURLOPT_POST, 1);

		// Enviando os dados como query string
		curl_setopt($ch, CURLOPT_POSTFIELDS,
		            http_build_query($_POST));

		// Guardar resposta da requisição (false, true)
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Guardando a execução da requisição
		$server_output = curl_exec ($ch);

		// Finalizando requisição
		curl_close ($ch);

		// Criando elemento SimpleXMLElement
		$xml = new SimpleXMLElement($server_output);

		var_dump( $xml );

		echo "Codigo: ".$xml->Servicos->cServico->Codigo."<BR>";
/*echo "Valor: ".$correios->Servicos->cServico->Valor."<BR>";
echo "Prazo Entrega: ".$correios->Servicos->cServico->PrazoEntrega."<BR>";
echo "Entrega Sabado: ".$correios->Servicos->cServico->EntregaSabado."<BR>";*/