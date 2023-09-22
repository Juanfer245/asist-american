<?php

if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["textid"])) {
        $id = $_POST["textid"];
        $nombre = $_POST["textnombre"];
        $telefono = $_POST["texttelefono"];
        $ubicacion = $_POST["textubicacion"];
        $ruc = $_POST["textruc"];
        $sql = $conexion->query(" update empresa set nombre='$nombre', telefono='$telefono', ubicacion='$ubicacion', ruc='$ruc' where id_empresa=$id ");
        if ($sql == true) { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Correcto",
                        type: "success",
                        text: "Los datos se han modificado correctamente",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php } else { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Incorrecto",
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
                    text: "No se a enviado el identificador",
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