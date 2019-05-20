<?php
    session_start();
    include '../../../config/conexionBD.php';
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
    }

    $codigo = $_SESSION['codigo'];
    $sqlUsu = "SELECT * FROM usuario WHERE usu_codigo=$codigo";
    $resultUsu = $conn->query($sqlUsu);
    $rowUsu = mysqli_fetch_assoc($resultUsu);
    $nombres = $rowUsu['usu_nombres'];
    $apellidos =$rowUsu['usu_apellidos'];

?>

<!DOCTYPE html> 
<html> 
<head>     
    <meta charset="UTF-8"> 
    <title>Inicio</title> 
</head> 
<body> 
    <nav>
        <?php
        echo "<li><a href=index_user.php>Inicio</a></li>";
        echo "<li><a href=correo_enviar.php?correo=".$rowUsu['usu_correo'].">Nuevo Mensaje</a></li>";
        echo "<li><a href=index_msj_env.php>Mensajes Enviados</a></li>";
        echo "<li><a href=Mi Cuenta>Mi Cuenta</a></li>";
        echo "<li><a href=../../../config/cerrar_sesion.php>[Cerrar Sesion]</a></li>"
        ?>
    </nav>

    <section>
        <?php
        echo "$nombres ";
        echo $apellidos;
        ?>
    </section>

    <section>

        <header>Mensajes Recibidos</header>
     
        <table style="width:100%"> 
            <tr> 
                <th>Fecha</th> 
                <th>Remitente</th>  
                <th>Asunto</th> 
                <th></th>             
            </tr> 
    
            <?php             
                include '../../../config/conexionBD.php';  
                $sql = "SELECT * FROM correos WHERE corr_eliminado = 'N' AND corr_tipo = 'R'"; 
                $result = $conn->query($sql); 
                $sql = 'SELECT = FROM news WHERE status <> 0'; 

                if ($result->num_rows > 0) { 
                    
                    while($row = $result->fetch_assoc()) {                          
                        echo "<tr>";                    
                        echo "<td>" . $row['corr_fecha_creacion'] . "</td>";        
                        echo "<td>" . $row['corr_remitente'] ."</td>";        
                        echo "<td>" . $row['corr_asunto'] . "</td>";                                                        
                        echo "<td><a href=leer_correo.php?codigo=".$row['corr_codigo'].">Leer</a></td>";
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

</body> 
</html> 