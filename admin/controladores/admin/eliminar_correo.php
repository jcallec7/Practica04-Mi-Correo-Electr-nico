<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar Correo </title>
</head>
<body>
<?php
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 $codigo = $_POST["codigo"];

 //Si voy a eliminar físicamente el registro de la tabla
 //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "UPDATE correos SET corr_eliminado = 'S', corr_fecha_modificacion = '$fecha' WHERE
corr_codigo = $codigo";
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha eliminado los datos correctamemte!</p>";
 } else {
 echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
 }
 echo "<a href='../../vista/usuario/index_admin.php'>Regresar</a>";
 $conn->close();

?>
</body>
</html>