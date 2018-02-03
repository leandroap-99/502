<?php 
$horas='
12:59
23:59
';
preg_match_all('/(?<![^\s])([0-1][0-9]|[2][0-3]):[0-5][0-9](?![^\s])/',$horas,$hora);
print_r($hora);



 ?>