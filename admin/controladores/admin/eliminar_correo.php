<?php
 session_start();

 include '../../../config/conexionBD.php';  

 $codigoUsu = $_SESSION['codigo'];
 $rol = $_SESSION['rol'];
 $sqlUsu = "SELECT * FROM usuario WHERE usu_codigo=$codigoUsu";
 $resultUsu = $conn->query($sqlUsu);
 $rowUsu = mysqli_fetch_assoc($resultUsu);

 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $rol != 'admin'){
    header("Location: ../../../public/vista/login.html");
 }

?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar Correo </title>
</head>
<body>
    <?php
        
        include '../../../config/conexionBD.php';
        $codigoCorr = $_GET["codigoCorr"];
        //Si voy a eliminar físicamente el registro de la tabla
        //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s', time());
        $sql = "UPDATE correos SET corr_eliminado = 'S' WHERE corr_codigo = $codigoCorr";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha eliminado los datos correctamente!</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
        }
        echo "<a href='../../vista/admin/index_admin.php'>Regresar</a>";
        $conn->close();

    ?>
</body>
</html>