<?php
 session_start();

 include '../../../config/conexionBD.php';  

 $codigo = $_SESSION['codigo'];
 $rol = $_SESSION['rol'];
 $sqlUsu = "SELECT * FROM usuario WHERE usu_codigo=$codigo";
 $resultUsu = $conn->query($sqlUsu);
 $rowUsu = mysqli_fetch_assoc($resultUsu);
 $nombres = $rowUsu['usu_nombres'];
 $apellidos =$rowUsu['usu_apellidos'];
 $imagen = "../".$rowUsu['usu_avatar']; 

 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $rol != 'admin'){
    header("Location: ../../../public/vista/login.html");
 }


?>

<!DOCTYPE html> 
<html> 
<head>     
    <meta charset="UTF-8"> 
    <link href="../../../css/style.css" rel="stylesheet" /> 
    <title>Inicio</title> 
</head> 
<body> 
    <nav>
        <li><a href="index_admin.php">Inicio</a></li>
        <li><a href="index.php">Usuarios</a></li>
        <li><a href="../../../config/cerrar_sesion.php">Cerrar Sesion</a></li>
    </nav>

    <section class="foto">

        <img id="avatar" src="<?php echo $imagen?>" alt="usu_avatar"/>
        <br>
        <span><?php echo $nombres?> <?php echo $apellidos?></span>

    </section>

    

    <section>

    <header><h3>Correos electronicos</h3></header>
     
        <table style="width:100%"> 
            <tr> 
                <th>Fecha</th> 
                <th>Remitente</th> 
                <th>Destinatario</th>  
                <th>Asunto</th> 
                <th></th>             
            </tr> 
    
            <?php             
                include '../../../config/conexionBD.php';  
                $sql = "SELECT * FROM correos WHERE corr_eliminado = 'N' ORDER BY corr_fecha_creacion DESC"; 
                $result = $conn->query($sql); 
                $sql = 'SELECT = FROM news WHERE status <> 0'; 

                if ($result->num_rows > 0) { 
                    
                    while($row = $result->fetch_assoc()) {                          
                        echo "<tr>";                    
                        echo "<td>" . $row['corr_fecha_creacion'] . "</td>";        
                        echo "<td>" . $row['corr_remitente'] ."</td>"; 
                        echo "<td>" . $row['corr_destinatario'] ."</td>";       
                        echo "<td>" . $row['corr_asunto'] . "</td>";                                                        
                        echo "<td><a href=../../controladores/admin/eliminar_correo.php?codigoCorr=".$row['corr_codigo'].">Eliminar</a></td>";
                        echo "</tr>"; 
                    }             
                } else {                 
                        echo "<tr>";                 
                        echo "<td colspan='7'> No existen correos</td>";                 
                        echo "</tr>"; 
    
                }
                
                $conn->close();          
            ?> 
        </table>

    </section>
    
    <footer>
        Jose Esteban Calle Chuchuca &#8226; Universidad Politécnica Salesiana &#8226; 
        <a href="mailto:jcallec7@est.ups.edu.ec">jcallec7@est.ups.edu.ec</a> &#8226; 
        <a href="tel:+593979376626">(593) 979-376-626</a> &#8226; © Todos los Derechos Reservados 
    </footer>
 
</body> 
</html> 