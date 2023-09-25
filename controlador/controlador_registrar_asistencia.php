<?php

if (!empty($_POST["btnentrada"])) {
    if (!empty($_POST["textdni"])) {
        $dni = $_POST["textdni"];
        $consulta = $conexion->query(" SELECT COUNT(*) as 'total' FROM empleado WHERE dni='$dni' ");
        $id = $conexion->query(" select id_empleado from empleado where dni='$dni' ");
        if ($consulta->fetch_object()->total > 0) {

            $fecha = date(" Y-m-d h:i:s");
            $id_empleado = $id->fetch_object()->id_empleado;
            

            $sql = $conexion->query(" insert into asistencia (id_empleado,entrada)values($id_empleado,'$fecha') ");
            if ($sql == true) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Correcto",
                            type: "success",
                            text: "Hola bienvenido",
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
                            text: "Error al registrar la entrada",
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
                        text: "El dni ingresado no existe",
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
                    text: "Ingrese el dni",
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


<!----Registro de salida -->

<?php

if (!empty($_POST["btnsalida"])) {
    if (!empty($_POST["textdni"])) {
        $dni = $_POST["textdni"];
        $consulta = $conexion->query(" SELECT COUNT(*) as 'total' FROM empleado WHERE dni='$dni' ");
        $id = $conexion->query(" select id_empleado from empleado where dni='$dni' ");
        if ($consulta->fetch_object()->total > 0) {

            $fecha = date(" Y-m-d h:i:s");
            $id_empleado = $id->fetch_object()->id_empleado;
            $busqueda = $conexion->query(" select id_asistencia from asistencia where id_empleado=$id_empleado order by id_asistencia desc limit 1 ");
            $id_asistencia = $busqueda->fetch_object()->id_asistencia;
            $sql = $conexion->query(" update asistencia set salida='$fecha' where id_asistencia=$id_asistencia ");
            if ($sql == true) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Correcto",
                            type: "success",
                            text: "Adios vuelve pronto",
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
                            text: "Error al registrar la salida",
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
                        text: "El dni ingresado no existe",
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
                    text: "Ingrese el dni",
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