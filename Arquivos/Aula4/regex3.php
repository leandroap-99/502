<?php  
$line = "Primeira linha do arquivo. hora - 11:11;2: Segunda linha do arquivo. hora: 22:22;3: Terceira Linha do arquivo. hora: 33:33";
$text = preg_split('/;/', $line);
print_r($text);
//echo "<br>$text[2]";