<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes de voz</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
    <div class="container" id="ifr">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="./img/logo.png" alt="" class="logo">
                    <h2>TELE<span style="color: #e97326;">VOICE</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-rounded">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="./dashboard.php">
                    <span class="material-symbols-rounded">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="./usuarios.php">
                    <span class="material-symbols-rounded">person</span>
                    <h3>Usuarios</h3>
                </a>
                <a href="./departamentos.php">
                    <span class="material-symbols-rounded">groups</span>
                    <h3>Departamentos</h3>
                </a>
                <a href="llamadas.php">
                    <span class="material-symbols-rounded">dialer_sip</span>
                    <h3>Llamadas</h3>
                </a>
                <a href="./mensajes_voz.php">
                    <span class="material-symbols-rounded">perm_phone_msg</span>
                    <h3>Mensajes de voz</h3>
                </a>
                <a href="./servidores.php">
                    <span class="material-symbols-rounded">dns</span>
                    <h3>Servidores</h3>
                </a>
                <a href="logs.php" class="active">
                    <span class="material-symbols-rounded">receipt_long</span>
                    <h3>Logs</h3>
                    <span class="log-count fwhite">
                        <?php
                            include("./con.php");
                            $query = mysqli_query($con, "select * from (select * from logs order by fecha desc limit 50) as cincuenta where nivel like 'ERROR%';") or die("Fallo en la consulta");
                            $num_rows = mysqli_num_rows($query);
                            $num_errors = $num_rows;
                            echo $num_errors;
                        ?>
                    </span>
                </a>
                <a href="cerrar_sesion.php">
                    <span class="material-symbols-rounded">logout</span>
                    <h3>Cerrrar sesión</h3>
                </a>
            </div>
        </aside>
        <!------------------- END OF ASIDE ----------------------->
        <main>
            <h1>Logs</h1>    
            <div class="ifr">  
                <div class="recent-logs">
                <h2>Logs recientes</h2>
                <div class="logs all-logs">

                    <?php
                        include("./con.php");
                        exec("/var/www/html/televoice/update_logs.sh");
                        $sql = "load data local infile '/var/log/asterisk/logs.csv' into table logs fields terminated by ',' lines terminated by '\n' ignore 0 rows;";
                        $delete = mysqli_query($con, "drop table logs;") or die("fallo en el drop");
                        $create = mysqli_query($con, "create table logs ( fecha varchar(80), nivel varchar(80), mensaje varchar(200) );") or die("Fallo en el create");
                        $update = mysqli_query($con, $sql) or die("Fallo en la consulta1");

                        $query = mysqli_query($con, "select fecha,nivel,mensaje from logs order by fecha desc limit 50") or die("Fallo en la consulta");
                        $num_rows = mysqli_num_rows($query);
                        for ($i=0; $i < $num_rows; $i++) { 
                            $row = mysqli_fetch_array($query);
                            ?>
                        <div class="log">
                            <div class="icon">
                                <?php

                                    if(preg_match('/NOTICE/', $row["nivel"])) {
                                        ?>
                                            <span class="material-symbols-rounded success">bug_report</span>
                                        <?php
                                    }
                                    elseif(preg_match('/WARNING/', $row["nivel"])) {
                                        ?>
                                            <span class="material-symbols-rounded warning">warning</span>
                                        <?php
                                    }
                                    else {
                                        ?>
                                            <span class="material-symbols-rounded danger">error</span>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="message">
                                <p><b><?php echo $row["fecha"];?></b> <?php echo $row["mensaje"] ?></p>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
  

                </div>


            </div>
            </div>

        </main>

        <!--------- END OF MAIN ------------->
        <div class="right" id="ifr">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-rounded">menu</span>
                </button>
                <div class="theme-toggle">
                    <span class="material-symbols-rounded active">light_mode</span>
                        <span class="material-symbols-rounded">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hola, <b>Laura</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="./img/profile.jpg" alt="">
                    </div>
                </div>
            </div>
             <!--------- END OF TOP RIGHT ------------->
        </div>
    </div>
    <script src="./js/main.js"></script>
</body>
</html>