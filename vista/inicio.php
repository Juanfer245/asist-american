<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
header('location:login/login.php');
}

?>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

    <h4 class="text-center text-secondary">Asistencia de Alumnos</h4>

    <?php
    include "../modelo/conexion.php";
    $sql=$conexion->query(" SELECT
	asistencia.*, 
	asistencia.id_asistencia, 
	asistencia.id_empleado, 
	asistencia.entrada, 
	asistencia.salida, 
	empleado.*, 
	empleado.id_empleado, 
	empleado.nombre as 'nom_empleado', 
	empleado.apellido, 
	empleado.dni, 
	empleado.cargo, 
	cargo.*, 
	cargo.id_cargo, 
	cargo.nombre as 'nom_cargo'
FROM
	asistencia
	INNER JOIN
	empleado
	ON 
		asistencia.id_empleado = empleado.id_empleado
	INNER JOIN
	cargo
	ON 
		empleado.cargo = cargo.id_cargo ");

    ?>

    <table class="table table-striped" id="example">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre y Apellido</th>
      <th scope="col">Cedula</th>
      <th scope="col">Cargo</th>
      <th scope="col">Entrada</th>
      <th scope="col">Salida</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($datos=$sql->fetch_object()) { ?>
            <tr>
      <td><?=$datos->id_asistencia?></td>
      <td><?=$datos->nom_empleado. " ".$datos->apellido?></td>
      <td><?=$datos->dni?></td>
      <td><?=$datos->id_asistencia?></td>
      <td><?=$datos->id_asistencia?></td>
      <td><?=$datos->id_asistencia?></td>
    </tr>
    <?php }
    ?>


  </tbody>
</table>

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>