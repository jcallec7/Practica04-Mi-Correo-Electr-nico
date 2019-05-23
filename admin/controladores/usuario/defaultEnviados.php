<?php    
    session_start();            
    include '../../../config/conexionBD.php'; 

    $codigo = $_SESSION['codigo'];
    $sqlUsu = "SELECT * FROM usuario WHERE usu_codigo=$codigo";
    $resultUsu = $conn->query($sqlUsu);
    $rowUsu = mysqli_fetch_assoc($resultUsu);
    $correo = $rowUsu['usu_correo'];    

    $sql = "SELECT * FROM correos WHERE corr_eliminado = 'N' AND corr_remitente = '$correo' ORDER BY corr_fecha_creacion DESC";
    $result = $conn->query($sql);
    $sql = 'SELECT = FROM news WHERE status <> 0'; 

    echo "<tr> 
        <th>Fecha</th> 
        <th>Destino</th>  
        <th>Asunto</th> 
        <th></th>             
        </tr>";

    if ($result->num_rows > 0) { 
                    
        while($row = $result->fetch_assoc()) {                          
            echo "<tr>";                    
            echo "<td>" . $row['corr_fecha_creacion'] . "</td>";        
            echo "<td>" . $row['corr_destinatario'] ."</td>";        
            echo "<td>" . $row['corr_asunto'] . "</td>";                                                        
            echo "<td><a href=leer_correo.php?codigoCorr=".$row['corr_codigo'].">Leer</a></td>";
            echo "</tr>"; 
        }             
    } else {                 
            echo "<tr>";                 
            echo "<td colspan='7'> No existen correos enviados </td>";                 
            echo "</tr>"; 
    
    }
                
    $conn->close();          
?> 