<?php

if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["textnombre"]) and !empty($_POST["textapellido"]) and !empty($_POST["textusuario"])) {
        $nombre = $_POST["textnombre"];
        $apellido = $_POST["textapellido"];
        $usuario = $_POST["textusuario"];
        $id = $_POST["textid"];
        $sql = $conexion->query(" update usuario set nombre='$nombre', apellido='$apellido', usuario='$usuario' where id_usuario=$id ");
        if ($sql == true) { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Correcto",
                        type: "success",
                        text: "Campos modificados correctamente",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php } else { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Inorrecto",
                        type: "error",
                        text: "Error al modificar los datos",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php }
    } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "Incorrecto",
                    type: "error",
                    text: "Los campos estan vacios",
                    styling: "bootstrap3"
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