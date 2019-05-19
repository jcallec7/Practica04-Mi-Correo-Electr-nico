<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: ../../../public/vista/login.html");
 }
?>


<!DOCTYPE html>
    <head>
        <meta charset="UTF-8"> 
        <title>Enviar Correo</title> 
    </head>  
    <body>

        <nav>
            <li><a href="index_user.php">Inicio</a></li>
            <li><a href="correo.php">Nuevo Mensaje</a></li>
            <li><a href="index_msj_env.php">Mensajes Enviados</a></li>
            <li><a href="Mi Cuenta">Mi Cuenta</a></li>
        </nav>

        <section>

            <header><h3>Correo</h3></header>

            <form id="formulario02" methog="POST" action="../../controladores/usuario/correo.php">
                <label for="asunto">Asunto</label>
                <input type="text" id="asunto" name="asunto" value="" placeholder="Ingrese el asunto ..."/>
                <br/><br/>
                <label for="destinatario">Correo Destinatario(*)</label>
                <input type="text" id="destinatario" name="destinatario" value="" placeholder="Ingrese el correo del destinatario ..."/>
                <br/><br/>
                <label for="cedula">Mensaje(*)</label>
                <textarea name="mensaje" id="mensaje" value="" placeholder="Ingrese el mensaje a enviar ..."></textarea>
                <br/><br/>
                <input type="submit" id="button" name="button" value="Enviar Correo"/>
            </form>
            
        </section>

    </body>  
</html>
