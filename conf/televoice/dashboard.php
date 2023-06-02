<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="shortcut icon" href="./img/logo.ico">
</head>
<body>
    <div class="container">
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
                <a href="./dashboard.php" class="active">
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
                <a href="http://172.20.10.7/webmail" target="_blank">
                    <span class="material-symbols-rounded">mail</span>
                    <h3>Correo</h3>
                </a>
                <a href="logs.php">
                    <span class="material-symbols-rounded">receipt_long</span>
                    <h3>Logs</h3>
                    <span class="log-count fwhite">
                        <?php
                            include("./con.php");
                            $localInfile = mysqli_query($con, "set global local_infile=1;") or die("fallo en el local_infile");

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
            <h1>Dashboard</h1>
            


            <h2 class=m1rem>Resumen</h2>
            <div class="insights">
                <div class="users">
                    <span class="material-symbols-rounded">person</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Usuarios activos</h3>
                            <h1><?php
                            $usuariosConectados=0;
                            $comandoUsuarios = "/usr/sbin/asterisk -rx 'sip show peers' | grep -e '200[1-9]*' | awk {'print $2'}";
                            exec($comandoUsuarios, $salidaUsuarios);

                            include("./con.php");
                            $query = mysqli_query($con,"select * from sip where exten like '200%';") or die("Fallo en la consulta");
                            $num_rows = mysqli_num_rows($query);
                            $num_usuarios = $num_rows;

                            foreach($salidaUsuarios as $lineaUsuarios){
                               
                                    if ($lineaUsuarios != "(Unspecified)") {   
                                        $usuariosConectados++;
                                    }
                                }

                            $porcentajeUsuarios = round(($usuariosConectados * 100)/$num_usuarios,1);
                            echo $usuariosConectados;

                                ?></h1>
                        </div>
                        <div class="percent">
                            <svg>
                                <circle cx="38" cy="38" r="36" pathlength="100" style="--porcentaje-usuarios: <?php echo $porcentajeUsuarios; ?>"></circle>
                            </svg>
                            <div class="number">
                                <p>
                                    <?php
                                        echo $porcentajeUsuarios . "%";
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php

                            ?>
                    <small class="text-muted">Total <?php echo $num_usuarios; ?> usuarios</small>
                </div>

                <div class="departments">
                    <span class="material-symbols-rounded">groups</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Departamentos activos</h3>
                            <h1><?php
                            $departamentosConectados=0;
                            $comandoDepartamentos = "/usr/sbin/asterisk -rx 'sip show peers' | grep -e '100[1-9]*' | awk {'print $2'}";
                            exec($comandoDepartamentos, $salidaDepartamentos);

                            foreach($salidaDepartamentos as $lineaDepartamentos){
                                
                                    if ($lineaDepartamentos != "(Unspecified)") {   
                                        $departamentosConectados++;
                                    }
                                }

                                include("./con.php");
                                $query = mysqli_query($con,"select * from sip where exten like '100%';") or die("Fallo en la consulta");
                                $num_rows = mysqli_num_rows($query);
                                $num_departamentos = $num_rows;

                                $porcentajeDepartamentos = round(($departamentosConectados * 100)/$num_departamentos, 1);
                            echo $departamentosConectados;
                                ?></h1>
                        </div>
                        <div class="percent">
                            <svg>
                            <circle cx="38" cy="38" r="36" pathlength="100" style="--porcentaje-departamentos: <?php echo $porcentajeDepartamentos; ?>"></circle>

                            </svg>
                            <div class="number">
                                <p>
                                <?php
                                        echo $porcentajeDepartamentos . "%";
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                            ?>
                    <small class="text-muted">Total <?php echo $num_departamentos; ?> departamentos</small>
                </div>

                <div class="calls">
                    <span class="material-symbols-rounded">dialer_sip</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Llamadas totales</h3>
                            <h1><?php
                                 include("./con.php");
                                 $query = mysqli_query($con,"select left(start,10) from cdr where left(start,10) = left(now(),10) and lastapp = 'Dial';") or die("Fallo en la consulta");
                                 $num_rows = mysqli_num_rows($query);
                                 $ultimasLlamadas = $num_rows;
                                 echo $ultimasLlamadas;

                                 $query = mysqli_query($con,"select left(start,10) from cdr where lastapp = 'Dial';") or die("Fallo en la consulta");
                                 $num_rows = mysqli_num_rows($query);
                                 $llamadasTotales = $num_rows;

                                 $porcentajeLlamadas = round(($ultimasLlamadas * 100)/$llamadasTotales, 1);
                            ?></h1>
                        </div>
                        <div class="percent">
                            <svg>
                            <circle cx="38" cy="38" r="36" pathlength="100" style="--porcentaje-llamadas: <?php echo $porcentajeLlamadas; ?>"></circle>

                            </svg>
                            <div class="number">
                                <p>
                                <?php
                                        echo $porcentajeLlamadas . "%";
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Últimas 24 horas</small>
                </div>
            </div>
            <!---------------- END OF INSIGHTS --------------->
            <?php
                /*$sql = "load data local infile '/var/log/asterisk/cdr-csv/Master.csv' into table cdr fields terminated by ',' enclosed by";
                $sql .= ' “ " ” ';
                $sql .= "lines terminated by ";
                $sql .= "\"
                n" 
                $sql ignore 0 rows;";
                echo $sql;*/
                $sql = "load data local infile '/var/log/asterisk/cdr-csv/Master.csv' into table cdr fields terminated by ',' enclosed by '\"'lines terminated by '\n' ignore 0 rows;";
                
                include("./con.php");
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
                $query = mysqli_query($con,"Select src,left(right(lastdata,7),4) as 'dst',disposition, start,end,duration from cdr where lastapp = 'Dial' order by start desc limit 8;") or die("Fallo en la consulta");

            ?>
            <div class="recent-calls">
                <h2>Llamadas recientes</h2>
                <table class="recent-calls-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Fecha y hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                for ($i=0; $i < 8 ; $i++) { 
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

                                    </tr>
                                    <?php

                                }
                            ?>
                    </tbody>
                </table>
                <a href="./llamadas.php">Mostrar todo</a>
            </div>

        </main>

        <!--------- END OF MAIN ------------->
        <div class="right">
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
            <div class="recent-logs">
                <h2>Logs recientes</h2>
                <div class="logs">
                <?php
                        include("./con.php");
                        $query = mysqli_query($con, "select fecha,nivel,mensaje from logs order by fecha desc limit 7") or die("Fallo en la consulta");
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
                <a href="./logs.php">Mostrar todo</a>

            </div>
            <!------------------- END OF RECENT LOGS ----------------->
            <div class="monitor">
                <h2>Servidores</h2>
                <div class="servidor">
                    <div class="icon">
                        <span class="material-symbols-rounded">dns</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Servidor principal</h3>
                        </div>
                        <?php 
                                if(exec("ping 172.20.10.7 -w 1 -c 1")) {
                                    ?>
                                        <h3 class="success">
                                            <span class="material-symbols-rounded">done</span>
                                        </h3>
                                    <?php
                                }
                                else {
                                    ?>
                                    <h3 class="danger">
                                        <span class="material-symbols-rounded">close</span>
                                    </h3>
                                    <?php
                                }
                            ?>

                    </div>
                </div>

                <div class="servidor">
                    <div class="icon">
                        <span class="material-symbols-rounded">dns</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Servidor secundario</h3>
                        </div>
                        <h3 class="danger">
                            <?php 
                                if(exec("ping 172.20.10.3 -w 1 -c 1")) {
                                    ?>
                                        <h3 class="success">
                                            <span class="material-symbols-rounded">done</span>
                                        </h3>
                                    <?php
                                }
                                else {
                                    ?>
                                    <h3 class="danger">
                                        <span class="material-symbols-rounded">close</span>
                                    </h3>
                                    <?php
                                }
                            ?>
                        </h3>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="./js/main.js"></script>
</body>
</html>