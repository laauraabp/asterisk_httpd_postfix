<?php
$comando = "asterisk -rx 'sip show peers'";
exec($comando, $salida, $codigoSalida);
echo "El código de salida fue: " . $codigoSalida;
echo "\n";
echo "Ahora imprimiré las líneas de salida:";
foreach($salida as $linea){
        echo $linea;
        echo "\n";
}
?>
