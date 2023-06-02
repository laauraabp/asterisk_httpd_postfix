<?php
$comando = "sudo /usr/sbin/asterisk -rx 'sip show peers' | /usr/bin/tail -n 1 | /usr/bin/awk {'print $1,$10,$12'}";
$comando2 = "whoami";
$comando3 = "sudo /usr/sbin/asterisk -rx 'module reload chan_sip.so' ";

exec($comando, $salida, $codigoSalida);
exec($comando2, $salida, $codigoSalida);
exec($comando3, $salida, $codigoSalida);


echo "El código de salida fue: " . $codigoSalida;
echo "\n";
echo "Ahora imprimiré las líneas de salida:";
foreach($salida as $linea){
        echo $linea;
        echo "\n";
}
?>
