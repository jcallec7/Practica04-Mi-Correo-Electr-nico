<?php
    include '../../../config/conexionBD.php';

    $rol = $_SESSION['rol'];

    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $rol != 'admin'){
        header("Location: ../../../public/vista/login.html");
    }


    $codigo = $_POST['codigo'];

    
        $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]): null;
            
        $sql = "UPDATE usuario SET usu_password = MD5('$contrasena') WHERE usu_codigo = $codigo";
    
        if ($conn->query($sql) === TRUE) {             
            echo "Modificado Correctamente";                  
        } else {             
            echo "Error al modificar";
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";           
        }
        
        
    

    echo "<br/><a href='../../vista/admin/index.php'>Regresar</a>";

    $conn->close();
    
?>


