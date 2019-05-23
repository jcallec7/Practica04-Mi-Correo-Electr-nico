<?php  
    session_start();            
    include '../../../config/conexionBD.php'; 

    $codigo = $_SESSION['codigo'];
    $sqlUsu = "SELECT * FROM usuario WHERE usu_codigo=$codigo";
    $resultUsu = $conn->query($sqlUsu);
    $rowUsu = mysqli_fetch_assoc($resultUsu);
    $correoD = $rowUsu['usu_correo']; 

    
    $correoR=$_GET['remitente'];

    $sql = "SELECT * FROM correos WHERE corr_eliminado = 'N' AND corr_destinatario ='$correoD' AND corr_remitente LIKE '%$correoR%' ORDER BY corr_fecha_creacion DESC"; 

    $result = $conn->query($sql); 
                
    echo "<tr> 
        <th>Fecha</th> 
        <th>Remitente</th>  
        <th>Asunto</th> 
        <th></th>             
        </tr>"; 
                    
        while($row = $result->fetch_assoc()) {                          
            echo "<tr>";                    
            echo "<td>" . $row['corr_fecha_creacion'] . "</td>";        
            echo "<td>" . $row['corr_remitente'] ."</td>";        
            echo "<td>" . $row['corr_asunto'] . "</td>";                                                        
            echo "<td><a href=leer_correo.php?codigoCorr=".$row['corr_codigo'].">Leer</a></td>";
            echo "</tr>"; 
        }                    
    
                
    $conn->close();          
?> 