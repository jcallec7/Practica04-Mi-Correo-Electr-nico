<?php
 session_start();
 $_SESSION['isLogged'] = FALSE;
 unset($_SESSION['codigo']);
 unset($_SESSION['rol']);
 unset($_SESSION);
 session_destroy();
 header("Location: ../public/vista/login.html");
?>