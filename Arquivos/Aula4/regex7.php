<?php 
$site = "www.4linux.com.br";
echo preg_replace('/(www\.)?[\da-zA-Z_-]+(\.com\.br|\.com)/', '(UOL)', $site);




 ?>