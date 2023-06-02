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
                <a href="./servidores.php" class="active">
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
            <h1>Servidores</h1>
            


            <h2 class=m1rem>Gestión de servidores</h2>
            <div class="ip-flotante">
                <div class="ip">
                    <h2>172.20.10.10 / 28</h2>
                </div>
            </div>
            <div class="servers">
                <div class="server-card server-1">
                    <span class="material-symbols-rounded">dns</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Nodo 1</h3>
                            <h1 class="c-success">Online</h1>
                        </div>
                        <div class="percent">
                            <svg>
                                <circle cx="38" cy="38" r="36" pathlength="100" style="--porcentaje-usuarios: <?php echo $porcentajeUsuarios; ?>"></circle>
                            </svg>
                            <div class="number">
                                <p> 99%
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php

                            ?>
                    <small class="text-muted">172.10.20.4</small>
                </div>

                <div class="server-card server-1">
                    <span class="material-symbols-rounded">dns</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Nodo 2</h3>
                            <h1 class="c-warning">Standby</h1>
                        </div>
                        <div class="percent">
                            <svg>
                                <circle cx="38" cy="38" r="36" pathlength="100" style="--porcentaje-usuarios: <?php echo $porcentajeUsuarios; ?>"></circle>
                            </svg>
                            <div class="number">
                                <p> 99%
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php

                            ?>
                    <small class="text-muted">172.10.20.5</small>
                </div>

            </div>
            <div class="buttons">
                <div class="buttons-1">
                    <div class="play">

                        <span class="material-symbols-rounded">play_arrow</span>
                    </div>
                    <div class="stop">

                        <span class="material-symbols-rounded">stop</span>
                    </div>
                </div>

                <div class="buttons-2">
                    <div class="play">

                        <span class="material-symbols-rounded">play_arrow</span>
                    </div>
                    <div class="stop">

                        <span class="material-symbols-rounded">stop</span>
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