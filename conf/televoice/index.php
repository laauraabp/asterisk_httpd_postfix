<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="style.css">


</head>
<style>

</style>
<body class="bd-login">
    <div class="container-login">
        <div class="login-card">
            <img src="./img/logo.png" alt="">
            <h2 class="m1rem">TELE<span style="color: #e97326;">VOICE</span></h2>
            <form action="index.php" method="post">
                <input type="text" name="nombre-login" id="" class="input-nombre-login" placeholder="Usuario">
                <input type="password" name="pass-login" id="" class="input-pass-login" placeholder="Password">
                <button type="submit" name="login-button">
                    <div class="login">
                        <span class="material-symbols-rounded">login</span>
                    </div>
                </button>
                
            </form>
        </div>
    </div>
    <!---<canvas id="world"></canvas>--->
    <script  src="./script.js"></script>
</body>
</html>

<?php
    if(isset($_REQUEST["login-button"])) {
        header("location: dashboard.php");
    }
?>