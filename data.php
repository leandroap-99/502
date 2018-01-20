<?php 

//formatar datas
echo  date('d/m/Y');
echo "<br>";
echo time();
echo "<br>";
echo microtime();
echo "<br>";
$data = new Datetime ('01/01/1999');
$data->modify('+1day');
echo $data->format('d/m/Y');
echo "<hr>";
$intervalo = new DateInterval('P2Y8M4D');
echo $intervalo->format('%y anos, %m em meses , %d em dias');


 ?>