<?php
 session_start();

 include '../../../config/conexionBD.php';  

 $codigo = $_SESSION['codigo'];
 $rol = $_SESSION['rol'];
 $sqlUsu = "SELECT * FROM usuario WHERE usu_codigo=$codigo";
 $resultUsu = $conn->query($sqlUsu);
 $rowUsu = mysqli_fetch_assoc($resultUsu);

 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $rol != 'user'){
    header("Location: ../../../public/vista/login.html");
 }

?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos de persona</title>
</head>
<body>
 <?php
 $codigo = $_GET["codigo"];
 ?>
 <form id="formulario01" method="POST" action="../../controladores/usuario/cambiar_contrasena.php">

 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <label for="cedula">Contraseña Actual (*)</label>
 <input type="password" id="contrasena1" name="contrasena1" value="" required
placeholder="Ingrese su contraseña actual ..."/>
 <br>
 <label for="cedula">Contraseña Nueva (*)</label>
 <input type="password" id="contrasena2" name="contrasena2" value="" required
placeholder="Ingrese su contraseña nueva ..."/>
 <br>

 <input type="submit" id="modificar" name="modificar" value="Modificar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
 </form>

 <footer>
        Jose Esteban Calle Chuchuca &#8226; Universidad Politécnica Salesiana &#8226; 
        <a href="mailto:jcallec7@est.ups.edu.ec">jcallec7@est.ups.edu.ec</a> &#8226; 
        <a href="tel:+593979376626">(593) 979-376-626</a> &#8226; © Todos los Derechos Reservados 
</footer>

</body>
</html>