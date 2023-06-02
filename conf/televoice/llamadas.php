<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llamadas</title>
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
                <a href="llamadas.php" class="active">
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
                <a href="logs.php">
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
            <h1>Llamadas</h1>            
            <div class="ifr">
                <?php
$sql = "load data local infile '/var/log/asterisk/cdr-csv/Master.csv' into table cdr fields terminated by ',' enclosed by '\"'lines terminated by '\n' ignore 0 rows;";
                
include("./con.php");
$localInfile = mysqli_query($con, "set global local_infile=1;") or die("fallo en el local_infile");
$delete = mysqli_query($con, "drop table cdr;") or die("fallo en el drop");
$create = mysqli_query($con, "create table cdr (
    accountcode varchar(80),
    src varchar(80),
    dst varchar(80),
    dcontext varchar(80),
    clid varchar(80),
    channel varchar(80),
    dstchannel varchar(80),
    lastapp varchar(80),
    lastdata varchar(80),
    answer datetime,
    start datetime ,
    end datetime,
    duration int,
    billsec int,
    disposition varchar(80),
    amaflags varchar(80),
    uniqueid varchar(80)
  );") or die("Fallo en el create");
$update = mysqli_query($con, $sql) or die("Fallo en la consulta1");
$query = mysqli_query($con,"Select src,left(right(lastdata,7),4) as 'dst',disposition, start,end,duration,uniqueid from cdr where lastapp = 'Dial' order by start desc;") or die("Fallo en la consulta");
$num_rows = mysqli_num_rows($query);

                ?>
                <h2>Llamadas registradas</h2>
                <table class="all-calls">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Fecha y hora</th>
                            <th class="no-ocultar">Grabación</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                            <div class="tbody">
                            <?php
                                for ($i=0; $i < $num_rows ; $i++) { 
                                    $row = mysqli_fetch_array($query);
                                    ?>
                                    <tr>
                                        <td>
                                        <?php
                                            if ($row["disposition"] != "ANSWERED") {
                                                ?>
                                                    <span class="material-symbols-rounded danger">phone_missed</span></td>
                                                    <?php
                                            }
                                            else {
                                                ?>
                                                <span class="material-symbols-rounded success">phone_in_talk</span></td>
                                                <?php
                                            }
                                            ?>    
                                    <td><?php echo $row["src"];?></td>
                                    <td><?php echo $row["dst"];?></td>
                                    <td><?php echo $row["start"];?></td>
                                    <?php
                                        if ($row["disposition"] != "ANSWERED") {
                                            ?>
                                            <td></td>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <td class="no-ocultar">
                                                <audio controls>
                                                    <source src="./call_records/<?php echo $row["uniqueid"] ?>.wav-in.wav" type="audio/wav">
                                                </audio>
                                            </td>
                                            
                                            <?php
                                        }
                                        ?>    

</tr>
<?php

}
?>
                       
                    </div>
                    </tbody>
                </table>
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