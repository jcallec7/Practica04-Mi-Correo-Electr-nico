<?php
    include '../../../config/conexionBD.php';  

    $remitente = isset($_POST["remitente"]) ? trim($_POST["remitente"]) : null;
    echo $remitente;
    $asunto = isset($_POST["asunto"]) ? trim($_POST["asunto"]) : null;
    echo $asunto;
    $destinatario = isset($_POST["destinatario"]) ? trim($_POST["destinatario"]) : null;
    echo $destinatario;
    $mensaje = isset($_POST["mensaje"]) ? trim($_POST["mensaje"]) : null;
    echo $mensaje;
        

    $sql="INSERT INTO correos VALUES (0, null ,'$remitente', '$destinatario', '$asunto', '$mensaje', 'N')";
    $conn->query($sql);
    echo "Correo enviado exitosamente";
    //header("Location: ../../vista/usuario/index_user.php"); 

    $conn->close();  
?>