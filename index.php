<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/estilos/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Registro de asistencia</h1>
    <h2 id="fecha"></h2>
    <div class="container">
        <a class="acceso" href="vista/login/login.php">Ingresar al Sistema</a>
        <p class="dni">Ingrese su Cedula</p>
        <form action="">
            <input type="text" placeholder="Cedula del alumno" name="textdni">
            <div class="botones">
            <a class="Entrada" href="">Entrada</a>
            <a class="Salida" href="">Salida</a>
            </div>
        </form>
    </div>

    <script>
        setInterval(() => {
        let fecha=new Date();
        let fechaHora=fecha.toLocaleString();
        document.getElementById("fecha").textContent=fechaHora; 
        }, 1000);
    </script>
</body>
</html>