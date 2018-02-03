<?php 
$estados='
123456/SP
123489/RJ
123489/TO
';
preg_match_all('/(?<![^\s])\d{4,6}\/(|SP|SE|TO)(?![^\s])/',$estados,$estado);
print_r($estado);



 ?>