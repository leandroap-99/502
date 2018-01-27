 
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form  action="" method="POST">                      

		<table frame="box" rules="none" style="border-collapse: collapse;" bordercolor="#dcdcdc" cellpadding="4" cellspacing="0">
			<tbody><tr>
				<td class="frmHeader" style="border-right: 2px solid white;" background="#dcdcdc">Parameter</td>
				<td class="frmHeader" background="#dcdcdc">Value</td>
			</tr>


			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">nCdEmpresa:</td>
				<td><input class="frmInput" size="50" name="nCdEmpresa" type="hidden"></td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">sDsSenha:</td>
				<td><input class="frmInput" size="50" name="sDsSenha" type="hidden"></td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">nCdServico:</td>
				<td>
				 <select name = "nCdServico[]" id = "" multiple="">
					<option value = "04014">SEDEX à vista</option>
					<option value = "04065">SEDEX à vista pagamento na entrega</option>
					<option value = "04510">PAC à vista</option>
					<option value = "04707">PAC a Vista Pagamento Entrega</option>
					<option value = "40169">SEDEX 12 (à vista e a faturar)*</option>
				</td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">sCepOrigem:</td>
				<td><input class="frmInput" size="50" name="sCepOrigem" type="text"></td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">sCepDestino:</td>
				<td><input class="frmInput" size="50" name="sCepDestino" type="text"></td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">nVlPeso:</td>
				<td><input class="frmInput" size="50" name="nVlPeso" type="text"></td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">nCdFormato:</td>
				<td>

					<select name="nCdFormato" id="">
					<option value = "1">Formato caixa/pacote</option>
					<option value = "2">Formato rolo/prisma</option>
					<option value = "3">Envelope</option>
				</td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">nVlComprimento:</td>
				<td><input class="frmInput" size="50" name="nVlComprimento" type="text"></td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">nVlAltura:</td>
				<td><input class="frmInput" size="50" name="nVlAltura" type="text"></td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">nVlLargura:</td>
				<td><input class="frmInput" size="50" name="nVlLargura" type="text"></td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">nVlDiametro:</td>
				<td><input class="frmInput" size="50" name="nVlDiametro" type="text"></td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">sCdMaoPropria:</td>
				<td><input class="frmInput" size="50" name="sCdMaoPropria" type="hidden" value="N"></td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">nVlValorDeclarado:</td>
				<td><input class="frmInput" size="50" name="nVlValorDeclarado" type="hidden" value = 0></td>
			</tr>

			<tr>
				<td class="frmText" style="color: #000000; font-weight: normal;">sCdAvisoRecebimento:</td>
				<td><input class="frmInput" size="50" name="sCdAvisoRecebimento" type="hidden" value = "N"></td>
			</tr>

			<tr>
				<td></td>
				<td align="right"> <input value="Invoke" class="button" type="submit"></td>
			</tr>
		</tbody></table>


	</form>
</body>
</html>
<?php


if($_POST){
	$teste = implode(",",$_POST['nCdServico']);
$_POST['nCdServico'] = $teste;
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

		//var_dump( $xml );

		
		}

		/*
		echo "Codigo: ".$xml->Servicos->cServico->Codigo."<BR>";
		echo "Valor: ".$xml->Servicos->cServico->Valor."<BR>";
echo "Prazo Entrega: ".$xml->Servicos->cServico->PrazoEntrega."<BR>";
if ($xml->Servicos->cServico->EntregaSabado = "S"){
	echo "Entrega Sabado: Sim <br>";
}else {
echo "Entrega Sabado: Não <Br>";}
//echo "Entrega Sabado: ".$xml->Servicos->cServico->EntregaSabado."<BR>";
echo "Valor Sem Adicionais: ".$xml->Servicos->cServico->ValorSemAdicionais."<BR>";*/



//"http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx/CalcPrecoPrazo"
?>
<?php if(!empty($xml) ): ?>
<table>
<thead>
<tr>
<th> Codigo</th>
<th> Valor</th>
<th>Prazo de entrega</th>
<th>Entrega no Sabado</th>
</tr>
</thead>
<tbody>
<?php foreach ($xml->Servicos->cServico as $servico): ?>
	
<tr>
<td><?= $servico->Codigo;?></td>
<td><?= $servico->Valor;?></td>
<td><?= $servico->PrazoEntrega;?>dia (s)</td>	
<td><?= $servico->EntregaSabado == 'S' ? 'Sim' : 'Nao';?></td>

</tr>
<?php endforeach; ?>
</tbody>

</table>

<?php endif; ?>