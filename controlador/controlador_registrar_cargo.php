<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["textnombre"])) {
        $nombre=$_POST["textnombre"];
        $verificarNombre=$conexion->query("SELECT COUNT(*) as 'total' FROM cargo WHERE nom_cargo = '$nombre'");
        if ($verificarNombre->fetch_object()->total > 0) { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title:"Error",
                        type:"error",
                        text:"El cargo <?= $nombre ?> ya existe",
                        styling:"bootstrap3"
                    })
                })
            </script>
        <?php } else {
            $sql=$conexion->query(" insert into cargo(nom_cargo)values('$nombre')");
            if ($sql == true) { ?>
                <script>
                $(function notificacion() {
                    new PNotify({
                        title:"Correcto",
                        type:"success",
                        text:"Cargo registrado correctamente",
                        styling:"bootstrap3"
                    })
                })
            </script>
            <?php } else { ?>
                <script>
                $(function notificacion() {
                    new PNotify({
                        title:"Incorrecto",
                        type:"error",
                        text:"Error al registrar el cargo",
                        styling:"bootstrap3"
                    })
                })
            </script>
            <?php }
            
        }
    } else { ?>
        <script>
                $(function notificacion() {
                    new PNotify({
                        title:"Incorrecto",
                        type:"error",
                        text:"Los campos estan vacios",
                        styling:"bootstrap3"
                    })
                })
            </script>
    <?php } ?>
    <script>
                    setTimeout(() => {
                        window.history.replaceState(null, null, window.location.pathname);
                    }, 0);
                </script>
<?php }
?>