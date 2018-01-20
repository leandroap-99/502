<?php
echo '<pre>';

$json = '{
    "name":"John",
    "age":30,
    "cars": [
        { "name":"Ford", "models":[ "Fiesta", "Focus", "Mustang" ] },
        { "name":"BMW", "models":[ "320", "X3", "X5" ] },
        { "name":"Fiat", "models":[ "500", "Panda" ] }
    ]
 }';
 //json para array
$array=json_decode($json);
print_r($array);

//array para json

echo json_encode($array);



 ?>