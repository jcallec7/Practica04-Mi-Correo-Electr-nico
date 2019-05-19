<?php
    if(isset($_POST['asunto']) && !empty($_POST['asunto']) &&
    isset($_POST['mensaje']) && !empty($_POST['mensaje'])){
        
        mail($destinatario,$asunto,$mensaje,$remitente);
    }


?>