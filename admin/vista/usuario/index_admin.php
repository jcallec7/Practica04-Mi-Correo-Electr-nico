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
    <title>Inicio</title> 
</head> 
<body> 
    <nav>
        <li><a href="index_admin.php">Inicio</a></li>
        <li><a href="index.php">Usuarios</a></li>
    </nav>

    <section>

        <header><h3>Mensajes Recibidos</h3></header>
     
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
                $sql = "SELECT * FROM correos WHERE corr_eliminado = 'N'"; 
                $result = $conn->query($sql); 
                $sql = 'SELECT = FROM news WHERE status <> 0'; 

                if ($result->num_rows > 0) { 
                    
                    while($row = $result->fetch_assoc()) {                          
                        echo "<tr>";                    
                        echo "<td>" . $row['corr_fecha_creacion'] . "</td>";        
                        echo "<td>" . $row['corr_remitente'] ."</td>"; 
                        echo "<td>" . $row['corr_destinatario'] ."</td>";       
                        echo "<td>" . $row['corr_asunto'] . "</td>";                                                        
                        echo "<td><a href=leer_correo.php?codigo=".$row['corr_codigo'].">Eliminar</a></td>";
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
    
    <a href="../../../config/cerrar_sesion.php">[Cerrar Sesion]</a>

 
</body> 
</html> 