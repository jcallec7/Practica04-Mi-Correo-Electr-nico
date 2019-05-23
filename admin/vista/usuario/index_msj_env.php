<?php
 session_start();
    include '../../../config/conexionBD.php';

    $codigo = $_SESSION['codigo'];
    $rol = $_SESSION['rol'];
    $sqlUsu = "SELECT * FROM usuario WHERE usu_codigo=$codigo";
    $resultUsu = $conn->query($sqlUsu);
    $rowUsu = mysqli_fetch_assoc($resultUsu);
    $correo = $rowUsu['usu_correo'];
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
    <title>Bandeja de Salida</title> 
    <link href="../../../css/style.css" rel="stylesheet" />
    <script type ="text/javascript" src="../../controladores/usuario/busquedaAjax.js"></script>
</head> 
<body> 
    <nav>
    <?php
        echo "<li><a href=index_user.php>Inicio</a></li>";
        echo "<li><a href=correo_enviar.php?correo=".$rowUsu['usu_correo'].">Nuevo Mensaje</a></li>";
        echo "<li><a href=index_msj_env.php>Mensajes Enviados</a></li>";
        echo "<li><a href=index.php>Mi Cuenta</a></li>";
        echo "<li><a href=../../../config/cerrar_sesion.php>Cerrar Sesion</a></li>"
        ?>
    </nav>

    <section class="foto">

        <img id="avatar" src="<?php echo $imagen?>" alt="usu_avatar"/>
        <br>
        <span><?php echo $nombres?> <?php echo $apellidos?></span>

    </section>

    <section>

        <header><h3>Mensajes Enviados</h3></header>

        <input type = "text" id = "busqueda" placeholder = "Buscar..." onkeyup = "return buscarPorDestinatario()"/>
     
        <table style="width:100%" id="tabla"> 
            <tr> 
                <th>Fecha</th> 
                <th>Destino</th>  
                <th>Asunto</th> 
                <th></th>             
            </tr> 
    
            <?php             
                include '../../../config/conexionBD.php';  
                $sql = "SELECT * FROM correos WHERE corr_eliminado = 'N' AND corr_remitente = '$correo' ORDER BY corr_fecha_creacion DESC";
                $result = $conn->query($sql);
                $sql = 'SELECT = FROM news WHERE status <> 0'; 

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
        </table>

    </section>

    <footer>
        Jose Esteban Calle Chuchuca &#8226; Universidad Politécnica Salesiana &#8226; 
        <a href="mailto:jcallec7@est.ups.edu.ec">jcallec7@est.ups.edu.ec</a> &#8226; 
        <a href="tel:+593979376626">(593) 979-376-626</a> &#8226; © Todos los Derechos Reservados 
    </footer>
    
    

 
</body> 
</html> 