<?php

    session_start();
    include '../../../config/conexionBD.php';

    $codigo = $_SESSION['codigo'];
    $rol = $_SESSION['rol'];
    $sqlUsu = "SELECT * FROM usuario WHERE usu_codigo=$codigo";
    $resultUsu = $conn->query($sqlUsu);
    $rowUsu = mysqli_fetch_assoc($resultUsu);
    $nombres = $rowUsu['usu_nombres'];
    $apellidos = $rowUsu['usu_apellidos']; 
    $imagen = "../".$rowUsu['usu_avatar']; 
    
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $rol !='user'){
        header("Location: ../../../public/vista/login.html");
    }

    

?>

<!DOCTYPE html> 
<html> 
<head>     
    <meta charset="UTF-8"> 
    <title>Inicio</title> 
    <link href="../../../css/img-style.css" rel="stylesheet" />
</head> 
<body> 
    <nav>
        <?php
        echo "<li><a href=index_user.php>Inicio</a></li>";
        echo "<li><a href=correo_enviar.php?correo=".$rowUsu['usu_correo'].">Nuevo Mensaje</a></li>";
        echo "<li><a href=index_msj_env.php>Mensajes Enviados</a></li>";
        echo "<li><a href=index.php>Mi Cuenta</a></li>";
        echo "<li><a href=../../../config/cerrar_sesion.php>[Cerrar Sesion]</a></li>"
        ?>
    </nav>

    <section><img id="avatar" src="<?php echo $imagen?>" alt="usu_avatar"/></section>
    
    

    <section>
        <?php
        echo "$nombres ";
        echo $apellidos;
        ?>
    </section>

    <section>

        <header>Mensaje</header>
     
        <table style="width:100%">  
           
            <?php             
                include '../../../config/conexionBD.php'; 
                $codigoCorr = $_GET["codigoCorr"];

                $sql = "SELECT * FROM correos WHERE corr_codigo = $codigoCorr";
                $result = $conn->query($sql); 
                $sql = 'SELECT = FROM news WHERE status <> 0'; 

                if ($result->num_rows > 0) { 
                    
                    while($row = $result->fetch_assoc()) {                          
                        echo "<tr>";  
                        echo "<th>Fecha</th>";                   
                        echo "<td>" . $row['corr_fecha_creacion'] . "</td>";  
                        echo "</tr>"; 

                        echo "<tr>";  
                        echo "<th>Remitente</th>";       
                        echo "<td>" . $row['corr_remitente'] ."</td>";
                        echo "</tr>"; 

                        echo "<tr>"; 
                        echo "<th>Asunto</th>";          
                        echo "<td>" . $row['corr_asunto'] . "</td>"; 
                        echo "</tr>"; 

                        echo "<tr>"; 
                        echo "<th>Mensaje</th>";  
                        echo "<td>" . $row['corr_mensaje'] . "</td>";                                                        
                        echo "</tr>"; 
                    }             
                } else {                 
                        echo "<tr>";                 
                        echo "<td colspan='7'> No existen correos en la bandeja de entrada </td>";                 
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