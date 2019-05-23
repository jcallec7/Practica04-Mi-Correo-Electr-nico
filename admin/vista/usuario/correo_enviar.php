<?php
    
    session_start();
    include '../../../config/conexionBD.php'; 

    $codigo = $_SESSION['codigo'];
    $rol = $_SESSION['rol'];
    $sqlUsu = "SELECT * FROM usuario WHERE usu_codigo=$codigo";
    $resultUsu = $conn->query($sqlUsu);
    $rowUsu = mysqli_fetch_assoc($resultUsu);
    $correo = $rowUsu['usu_correo'];   

    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $rol !='user'){
        header("Location: ../../../public/vista/login.html");
    }
?>


<!DOCTYPE html>
    <head>
        <meta charset="UTF-8"> 
        <title>Enviar Correo</title>
        <link href="../../../css/style.css" rel="stylesheet" /> 
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

        <section>

            <header><h3>Correo</h3></header>

            <form id="formulario02" method="POST" action="../../controladores/usuario/correo_enviar.php">
                <input type="hidden" id="remitente" name="remitente" value="<?php echo $correo ?>" /> 

                <label for="asunto">Asunto</label>
                <input type="text" id="asunto" name="asunto" value="" placeholder="Ingrese el asunto ..."/>
                <br/><br/>
                <label for="destinatario">Correo Destinatario(*)</label>
                <input type="text" id="destinatario" name="destinatario" value="" placeholder="Ingrese el correo del destinatario ..."/>
                <br/><br/>
                <label for="mensaje">Mensaje(*)</label>
                <textarea id="mensaje" name="mensaje" value="" placeholder="Ingrese el mensaje a enviar ..."></textarea>
                <br/><br/>
                <input type="submit" id="button" name="button" value="Enviar Correo"/>
            </form>
            
        </section>

        <footer>
        Jose Esteban Calle Chuchuca &#8226; Universidad Politécnica Salesiana &#8226; 
        <a href="mailto:jcallec7@est.ups.edu.ec">jcallec7@est.ups.edu.ec</a> &#8226; 
        <a href="tel:+593979376626">(593) 979-376-626</a> &#8226; © Todos los Derechos Reservados 
        </footer>

    </body>  
</html>
