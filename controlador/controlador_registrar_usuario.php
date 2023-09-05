<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["textnombre"])and !empty($_POST["textapellido"]) and !empty($_POST["textusuario"]) and !empty($_POST["textpassword"])) {
        $nombre=$_POST["textnombre"];
        $apellido=$_POST["textapellido"];
        $usuario=$_POST["textusuario"];
        $password=md5($_POST["textpassword"]);

        $sql=$conexion->query("SELECT COUNT(*) as 'total' FROM usuario WHERE usuario ='$usuario'");
        if ($sql->fetch_object()->total > 0) {?>
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
            $registro=$conexion->query("insert into usuario(nombre,apellido,usuario,password)values('$nombre','$apellido','$usuario','$password') ");
            if ($registro==true) {?>
                <script>
                $(function notificacion() {
                    new PNotify({
                        title:"Correcto",
                        type:"sucess",
                        text:"El usuario se ha registrado correctamente",
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
                        text:"Error al registrar el usuario",
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