<?php 

$arquivo = fopen('log.txt', 'a+');


$contents = '';
/*while(!feof($arquivo)){
$contents .=fread($arquivo, 4096);

}
echo "$contents";
echo '<hr';
fclose($arquivo);

echo file_get_contents('log.txt');*/
while (($linha = fgets($arquivo))!== false) {
	$contents.=$linha. '<br>';
}
echo $contents;
echo '<hr>';
fwrite($arquivo, 'teste de escrita'.PHP_EOL);
fclose($arquivo);
echo file_get_contents('log.txt');