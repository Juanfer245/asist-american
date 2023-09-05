<?php

if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["textnombre"])and !empty($_POST["textapellido"]) and !empty($_POST["textusuario"])) {
        $nombre=$_POST["textnombre"];
        $apellido=$_POST["textapellido"];
        $usuario=$_POST["textusuario"];
        $id=$_POST["textid"];
        $sql=$conexion->query("SELECT COUNT(*) as 'total' FROM usuario WHERE usuario ='$usuario' AND id_usuario!=$id");
        if ($sql->fetch_object()->total > 0) { ?>
             <script>
                $(function notificacion() {
                    new PNotify({
                        title:"Error",
                        type:"error",
                        text:"El usuario <?= $usuario ?> ya existe",
                        styling:"bootstrap3"
                    })
                })
            </script>
        <?php } else {
            $modificar=$conexion->query(" update usuario set nombre='$nombre',apellido='$apellido',usuario='$usuario' where id_usuario=$id");
            if ($modificar == true) {?>
                <script>
                $(function notificacion() {
                    new PNotify({
                        title:"Correcto",
                        type:"success",
                        text:"El usuario se ha modificado correctamente",
                        styling:"bootstrap3"
                    })
                })
            </script>
            <?php } else {?>
                <script>
                $(function notificacion() {
                    new PNotify({
                        title:"Incorrecto",
                        type:"error",
                        text:"Error al modificar usuario",
                        styling:"bootstrap3"
                    })
                })
            </script>
            <?php }
            
        }
        
    } else {?>
        <script>
                $(function notificacion() {
                    new PNotify({
                        title:"Error",
                        type:"error",
                        text:"Los campos estan vacios",
                        styling:"bootstrap3"
                    })
                })
            </script>
    <?php }?>
    <script>
                    setTimeout(() => {
                        window.history.replaceState(null, null, window.location.pathname);
                    }, 0);
                </script>
<?php }

?>