<?php

    include("./con.php");
    $nombre = $_REQUEST["nombre"];
    $exten = $_REQUEST["exten"];
    $secret = $_REQUEST["secret"];

    $nombre = "laurita";
    $exten = 2222;
    $secret = 123456;

    $sql = mysqli_query($con, "Insert into sip values('$nombre','$exten','$secret')") or die("Fallo en la consulta");

    $sip = fopen("/etc/asterisk/sip.conf", "a");
    fputs($sip, "
    
[$exten]
type = friend
secret = $secret
context = menu 
nat = no
host = dynamic
mailbox = $exten@voicemail
    ");
    
    $comando3 = "sudo /usr/sbin/asterisk -rx 'module reload chan_sip.so' ";

    exec($comando3, $salida, $codigoSalida);
    
    
    echo "El código de salida fue: " . $codigoSalida;
    echo "\n";
    echo "Ahora imprimiré las líneas de salida:";
    foreach($salida as $linea){
            echo $linea;
            echo "\n";
    }

?>