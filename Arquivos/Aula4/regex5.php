<?php 
$emails='
qualquerusuario@dominio.com.br
leandroaparecido1@hotmail.com
leandrogmail.com
';
preg_match_all('/(?<![^\s])[a-zA-Z\d_.]+@[a-zA-Z\d_.]+[.com.br|.com](?![^\s])/',$emails,$email);
print_r($email);



 ?>