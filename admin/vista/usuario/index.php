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
    <title>Gestión de usuarios</title>
    <link href="../../../css/style.css" rel="stylesheet" /> 
</head> 
<body> 

    <nav>
    <nav>
        <?php
        echo "<li><a href=index_user.php>Inicio</a></li>";
        echo "<li><a href=correo_enviar.php?correo=".$rowUsu['usu_correo'].">Nuevo Mensaje</a></li>";
        echo "<li><a href=index_msj_env.php>Mensajes Enviados</a></li>";
        echo "<li><a href=index.php>Mi Cuenta</a></li>";
        echo "<li><a href=../../../config/cerrar_sesion.php>Cerrar Sesion</a></li>"
        ?>
    </nav>
    </nav>
     
    <table style="width:100%"> 
        <tr> 
            <th>Cedula</th> 
            <th>Nombres</th>  
            <th>Apellidos</th> 
            <th>Dirección</th> 
            <th>Telefono</th>             
            <th>Correo</th> 
            <th>Fecha Nacimiento</th>
            <th>Modificar</th>
            <th>Cambiar Contraseña</th>              
        </tr> 
 
        <?php             
            include '../../../config/conexionBD.php';  
            $sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' AND usu_codigo = '$codigo'"; 
            $result = $conn->query($sql); 
            $sql = 'SELECT = FROM news WHERE status <> 0'; 

            if ($result->num_rows > 0) { 
                 
                while($row = $result->fetch_assoc()) {                          
                    echo "<tr>";                    
                    echo "<td>" . $row['usu_cedula'] . "</td>";        
                    echo "<td>" . $row['usu_nombres'] ."</td>";        
                    echo "<td>" . $row['usu_apellidos'] . "</td>";     
                    echo "<td>" . $row['usu_direccion'] . "</td>";
                    echo "<td>" . $row['usu_telefono'] . "</td>"; 
                    echo "<td>" . $row['usu_correo'] . "</td>";        
                    echo "<td>" . $row['usu_fecha_nacimiento'] . "</td>";                                               
                    echo "<td><a href=modificar.php?codigo=".$row['usu_codigo'].">[Enlace Modificar]</a></td>";
                    echo "<td><a href=cambiar_contrasena.php?codigo=".$row['usu_codigo'].">[Enlace Cambiar]</a></td>";
                    echo "</tr>"; 
                }             
            } else {                 
                    echo "<tr>";                 
                    echo "<td colspan='7'> No existen usuarios registradas en el sistema </td>";                 
                    echo "</tr>"; 
 
            }
             
            $conn->close();          
        ?> 
    </table>

    <footer>
        Jose Esteban Calle Chuchuca &#8226; Universidad Politécnica Salesiana &#8226; 
        <a href="mailto:jcallec7@est.ups.edu.ec">jcallec7@est.ups.edu.ec</a> &#8226; 
        <a href="tel:+593979376626">(593) 979-376-626</a> &#8226; © Todos los Derechos Reservados 
    </footer>
    
</body> 
</html> 
