<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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
                <a href="./departamentos.php" class="active">
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
            <h1>Departamentos</h1>            
            <div class="ifr">
                <h2>Departamentos registrados</h2>
                <table class="department-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Extensión</th>
                            <th>Contraseña cifrada</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("./con.php");
                            $query = mysqli_query($con, "select * from sip where exten like '100%' order by exten") or die("fallo en la consulta");
                            $num_rows = mysqli_num_rows($query);
                            ?>
                                <script>
                                    const numRows = <?php echo $num_rows?>
                                </script>
                            <?php

                            for ($i=1; $i <= $num_rows; $i++) { 
                                $row = mysqli_fetch_array($query);
                                
                                ?>
                                    <form action="administrar_usuarios.php" method="post">
                                <tr>
                                        
                                        <td class="nombre-<?php echo $i;?>"><?php echo $row["nombre"] ?></td>
                                        <td class="exten-<?php echo $i;?>"><?php echo $row["exten"] ?></td>
                                        <td class="secret-<?php echo $i;?>"><?php echo $row["secret"] ?></td>
                                        
                                        <td class="botones-edit-delete-<?php echo $i;?>">
                                           
                                                <span class="material-symbols-rounded qr qr-<?php echo $i;?>">qr_code</span>
                                        </td>
                                        <div class="modal qr-modal-<?php echo $i;?> dnone">
                                            <div class="modal-card">
                                                <div class="div-qr-image">
                                                    <img class="qr-image" src="https://oem.zoiper.com/qr.php?provider_id=bc28073e4397adbd6b1f91b2b6022ffa&u=<?php echo $row["exten"];
                                                ?>&h=172.20.10.3&p=<?php echo $row["secret"];
                                                ?>&o=&t=&a=&tr=" alt="QR code"/>
                                                </div>
                                                <div class="large-check check close-qr-modal-<?php echo $i;?>">
                                                    <span class="material-symbols-rounded ">check</span>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                </form>
                                
                                <?php
                            }
                            
                            ?>

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


    <script src="./js/main.js"></script>
</body>
</html>