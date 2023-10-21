<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de asistencia</title>
    <link rel="stylesheet" href="public/estilos/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap" rel="stylesheet">

    <!-- pNotify -->
    <link href="public/pnotify/css/pnotify.css" rel="stylesheet" />
    <link href="public/pnotify/css/pnotify.buttons.css" rel="stylesheet" />
    <link href="public/pnotify/css/custom.min.css" rel="stylesheet" />

    <!-- pnotify -->
    <script src="public/pnotify/js/jquery.min.js">
    </script>
    <script src="public/pnotify/js/pnotify.js">
    </script>
    <script src="public/pnotify/js/pnotify.buttons.js">
    </script>

</head>

<body style="background-image: url('vista/login/img/mesa1.jpg'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <!-- Resto de tu contenido -->
    <?php
    date_default_timezone_set("America/Guayaquil");
    ?>
    <h2 id="fecha"><?= date("d/m/Y, H:i:s")?></h2>
    <?php
    include "modelo/conexion.php";
    include "controlador/controlador_registrar_asistencia.php";
    ?>
    <div class="container">
        <a class="acceso" href="vista/login/login.php">Ingresar al Sistema</a>
        <p class="dni1">Ingrese su Cedula</p>
        <p class="dni">xxxxxxxxx-x = Profesor</p>
        <p class="dni">xxxxxxxxxx = Estudiante</p>
        <form action="" method="post">
            <input type="text" placeholder="Cedula del alumno" name="textdni" id="txtdni">
            <div class="botones">

                <button id="salida" class="Salida" type="submit" name="btnsalida" value="ok">Salida</button>
                <button id="entrada" class="Entrada" type="submit" name="btnentrada" value="ok">Entrada</button>
            </div>
            
        </form>
    </div>

    <script>
        setInterval(() => {
            let fecha = new Date();
            let fechaHora = fecha.toLocaleString();
            document.getElementById("fecha").textContent = fechaHora;
        }, 1000);
    </script>
<script>
    let dni=document.getElementById("txtdni");
    dni.addEventListener("input",function(){
        if (this.value.length > 11) {
            this.value=this.value.slice(0,11);
        }
    })


    //eventos para la entrada y salida
    document.addEventListener("keyup",function(event){
        if (event.code=="ArrowLeft"){
            document.getElementById("salida").click()
        } else {
            if (event.code=="ArrowRight") {
                document.getElementById("entrada").click()
            }
        }
    })
</script>
</body>

</html>