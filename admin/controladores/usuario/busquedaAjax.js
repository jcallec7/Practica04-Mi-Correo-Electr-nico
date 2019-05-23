function buscarPorRemitente() {
    
    var correo = document.getElementById("busqueda").value;
    if(correo == ""){
        document.getElementById("tabla").innerHTML="";

        if (window.XMLHttpRequest) {
            //code for actuar browsers
            xmlhttp = new XMLHttpRequest();
        } else {
            //code for old browsers
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue");
                document.getElementById("tabla").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../controladores/usuario/defaultRecibidos.php?remitente=",true);
        xmlhttp.send();

    }else{
        
        if(window.XMLHttpRequest){
            
            //code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }else{
            //code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function(){
            
            if(this.readyState == 4 && this.status==200){
    
                document.getElementById("tabla").innerHTML = this.responseText;
            }

        };

        xmlhttp.open("GET","../../controladores/usuario/consultaRecibidos.php?remitente="+correo,true);
        xmlhttp.send();
    
    }   
}


function buscarPorDestinatario() {
    
    var correo = document.getElementById("busqueda").value;
    if(correo == ""){
        document.getElementById("tabla").innerHTML="";

        if (window.XMLHttpRequest) {
            //code for actuar browsers
            xmlhttp = new XMLHttpRequest();
        } else {
            //code for old browsers
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue");
                document.getElementById("tabla").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../controladores/usuario/defaultEnviados.php?destinatario=",true);
        xmlhttp.send();
    }else{
        
        if(window.XMLHttpRequest){
            
            //code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }else{
            //code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function(){
            
            if(this.readyState == 4 && this.status==200){
    
                document.getElementById("tabla").innerHTML = this.responseText;
            }

        };

        xmlhttp.open("GET","../../controladores/usuario/consultaEnviados.php?destinatario="+correo,true);
        xmlhttp.send();
    
    }   
}

