<?php
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtid"]) and !empty($_POST["txtnombre"]) and !empty($_POST["txtapellido"]) and !empty($_POST["txtcargo"]) and !empty($_POST["txtdni"]) ){
        $id=$_POST["txtid"];
        $dni = $_POST["txtdni"];
        $nombre=$_POST["txtnombre"];
        $apellido=$_POST["txtapellido"];
        $cargo=$_POST["txtcargo"];
        $sql=$conexion->query(" UPDATE empleado SET nombre='$nombre', apellido='$apellido', cargo=$cargo ,dni='$dni' WHERE id_empleado=$id ");
        if ($sql == true) { ?>
             <script>
                $(function notificacion() {
                    new PNotify({
                        title:"Correcto",
                        type:"success",
                        text:"El empleado se ha modificado correctamente",
                        styling:"bootstrap3"
                    })
                })
            </script>
        <?php } else { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title:"Inorrecto",
                        type:"error",
                        text:"Error al modificar empleado",
                        styling:"bootstrap3"
                    })
                })
            </script>
        <?php }
        
    } else { ?>
        <script>
                $(function notificacion() {
                    new PNotify({
                        title:"Inorrecto",
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