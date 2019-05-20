<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: ../../../public/vista/login.html");
 }
?>

<!DOCTYPE html> 
<html> 
<head>     
    <meta charset="UTF-8"> 
    <title>Bandeja de Salida</title> 
</head> 
<body> 
    <nav>
        <li><a href="index_user.php">Inicio</a></li>
        <li><a href="correo_enviar.php">Nuevo Mensaje</a></li>
        <li><a href="index_msj_env.php">Mensajes Enviados</a></li>
        <li><a href="Mi Cuenta">Mi Cuenta</a></li>
        <li><a href="../../../config/cerrar_sesion.php">[Cerrar Sesion]</a></li>
    </nav>

    <section>

        <header><h3>Mensajes Enviados</h3></header>
     
        <table style="width:100%"> 
            <tr> 
                <th>Fecha</th> 
                <th>Destino</th>  
                <th>Asunto</th> 
                <th></th>             
            </tr> 
    
            <?php             
                include '../../../config/conexionBD.php';  
                $sql = "SELECT * FROM correos WHERE corr_eliminado = 'N' AND corr_tipo = 'E'"; 
                $result = $conn->query($sql); 
                $sql = 'SELECT = FROM news WHERE status <> 0'; 

                if ($result->num_rows > 0) { 
                    
                    while($row = $result->fetch_assoc()) {                          
                        echo "<tr>";                    
                        echo "<td>" . $row['corr_fecha_creacion'] . "</td>";        
                        echo "<td>" . $row['corr_destinatario'] ."</td>";        
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