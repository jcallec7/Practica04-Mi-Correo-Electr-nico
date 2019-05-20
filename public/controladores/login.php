<?php 
    session_start(); 
 
    include '../../config/conexionBD.php'; 
 
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null; 
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null; 
    $sqlA = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena') and usu_rol = 'admin'";
    $sqlU = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena') and usu_rol = 'user'";
    $sqlC = "SELECT usu_codigo FROM usuario WHERE usu_correo ='$usuario' and usu_password = MD5('$contrasena')"; 
 
    $admin = $conn->query($sqlA);
    $user = $conn->query($sqlU);
    $codigo = $conn->query($sqlC);
    $row = mysqli_fetch_assoc($codigo);
               
    if ($admin->num_rows > 0) {   

        $_SESSION['isLogged'] = TRUE; 
        $_SESSION['codigo'] = $row['usu_codigo'];        
        header("Location: ../../admin/vista/admin/index_admin.php"); 

    } elseif ($user->num_rows > 0){ 

        $_SESSION['isLogged'] = TRUE; 
        $_SESSION['codigo'] = $row['usu_codigo'];          
        header("Location: ../../admin/vista/usuario/index_user.php");            
        
    }else {
        header("Location: ../vista/login.html");
         
    }
         
    $conn->close(); 
 
?> 