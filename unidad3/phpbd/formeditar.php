<?php include("conexion.php");
$id=$_GET['id'];
$sql="select id,nombre,apellidos,edad,sexo,celular,estado,fecha from persona where id=".$id;
//echo $sql;
$resultado=$con->query($sql);
$fila=$resultado->fetch_assoc();
//echo $id;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Insertar Datos</title>
</head>
<body>
	<form action="editar.php" method="POST" >
	<label for="txtNombre">Nombre</label>
	<input type="text" name="txtNombre" value="<?php echo $fila['nombre']; ?>"> <br>
	<label for="txtApellido">Apellido</label>
	<input type="text" name="txtApellido" value="<?php echo $fila['apellidos'] ?>"> <br>
	<label for="numEdad">Edad</label>
	<input type="number" name="numEdad" value="<?php echo $fila['edad']; ?>"> <br>
	<label for="txtSexo">Sexo</label> 
	<input type="radio" name="txtSexo" value="M" <?php if ($fila['sexo']=='M') echo "checked" ?>>Mascuino 
	<input type="radio" name="txtSexo" value="F" <?php if($fila['sexo']=='F')  echo "checked" ?>>Femenino <br>
	<label for="numCelular">Celular</label>
	<input type="number" name="numCelular" value="<?php echo $fila['celular'] ?>"> <br>
	<label for="selEstado">Estado de Salud(Referente a COVI-19)</label>
	<select name="selEstado" >
		<option value="S" <?php if($fila['estado']=='S')  echo "selected" ?>>Sano</option>
		<option value="I" <?php if($fila['estado']=='I')  echo "selected" ?>>Infectado</option>
		<option value="O" <?php if($fila['estado']=='O')  echo "selected" ?>>Sospechoso</option>
		<option value="P" <?php if($fila['estado']=='P')  echo "selected" ?>>Por Confirmar</option>
		<option value="R" <?php if($fila['estado']=='R')  echo "selected" ?>>Recuperado</option>
	</select> <br>
	<label for="fecRegistro">Fecha de Registro </label>

	<input type="date" name="fecRegistro"value="<?php echo $fila['fecha'] ?>">
	<input type="hidden" name="id" value="<?php echo $id;?>" >
		<input type="submit" value="Registrar">
</form>

</body>
</html>