<?php
    include("./con.php");
    $nombre = $_REQUEST["nombre"];
    $exten = $_REQUEST["exten"];
    $secret = $_REQUEST["secret"];


    if(isset($_REQUEST["edit"])) {
        $query = mysqli_query($con, "delete from sip where exten = $exten;") or die("Fallo en el delete");
        exec("/var/www/html/televoice/eliminaruser.sh $exten");
        $query = mysqli_query($con, "insert into sip values('$nombre','$exten','$secret')") or die("Fallo en el insert");

        $fopen = fopen("/etc/asterisk/sip.conf","a");
        fputs($fopen, "\n[$exten]
type=friend
secret=$secret
context=menu
nat=no
host=dynamic
mailbox=$exten@voicemail\n");
    
    }
    if(isset($_REQUEST["delete"])) {
        $query = mysqli_query($con, "delete from sip where exten = $exten") or die("Fallo en el update");
        exec("/var/www/html/televoice/eliminaruser.sh $exten");
        
    }
    if(isset($_REQUEST["add"])) {
        $query = mysqli_query($con, "insert into sip values('$nombre','$exten','$secret')") or die("Fallo en el insert");
        $fopen = fopen("/etc/asterisk/sip.conf","a");
        fputs($fopen, "\n[$exten]
type=friend
secret=$secret
context=menu
nat=no
host=dynamic
mailbox=$exten@voicemail\n");    

}

exec("/usr/sbin/asterisk -rx 'module reload chan_sip.so'");
header("location: usuarios.php");


?>
