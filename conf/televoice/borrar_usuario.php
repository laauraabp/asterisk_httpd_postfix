<?php


/*$string = '[2002] type = friend secret = 123456 context = menu nat = no host = dynamic mailbox = 2002@voicemail

[2222] type = friend secret = 123456 context = menu nat = no host = dynamic mailbox = 2002@voicemail';





    $nuevo = preg_replace("/\[2222\]\ntype \= friend secret \= 123456 context \= menu nat \= no host \= dynamic mailbox \= 2002@voicemail/i", "", $string);


echo $nuevo;*/

/*Leer archivo de texto con PHP*/

$nombre_archivo="/etc/asterisk/sip.conf";

$fd = fopen($nombre_archivo, "r"); #Modo r, read

echo "El contenido del fichero es : <br>";
$lectura = "";
while(!feof($fd)) {
    //feof : end of file que es parecido a EOL
    $lectura .= fgets($fd); //lee del fichero una línea.
    //$lectura .= "<br>";
    
}
echo $lectura;
//No olvides cerrar el fichero
fclose($fd);


$nuevo = preg_replace("/\[2222\] type = friend secret/i", "", $lectura);


echo $nuevo;

    
?>