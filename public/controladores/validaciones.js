function validarCamposObligatorios(){

    var bandera = false

    for(var i = 0; i < document.forms[0].length; i++){
        var elemento = document.forms[0].elements[i]
        if(elemento.value.trim() == ''){
            bandera = true
            if(elemento.id == 'cedula')
            {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeCedula").innerHTML = ('cedula obligatoria')
            }
            if(elemento.id == 'nombres')
            {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeNombres").innerHTML = ('nombres obligatorios')
            }
            if(elemento.id == 'apellidos')
            {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeApellidos").innerHTML = ('apellidos obligatorios')
            }
            if(elemento.id == 'direccion')
            {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeDireccion").innerHTML = ('direccion obligatoria')
            }
            if(elemento.id == 'telefono')
            {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeTelefono").innerHTML = ('telefono obligatorio')
            }
            if(elemento.id == 'fechaNacimiento')
            {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeFecha").innerHTML = ('fecha de nacimiento obligatorio')
            }
            if(elemento.id == 'correo')
            {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeCorreo").innerHTML = ('correo obligatorio')
            }
            if(elemento.id == 'contrasena')
            {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeContrasena").innerHTML = ('contrasena obligatoria')
            }
            if(elemento.id == 'imagen')
            {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeImagen").innerHTML = ('imagen obligatoria')
            }
        }
    }
    

    if(bandera)
    {
        alert('Llenar todos los campos correctamente')
        return false
    }else{
        return true
    }

} 

function validarLetras(elemento) {

    key=elemento.keyCode || elemento.which

    teclado=String.fromCharCode(key).toLowerCase()

    letras="qwertyuiopasdfghjklñzxcvbnm "

    especiales="8-37-38-46-164"

    teclado_especial=false

    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true
            break
        }
    }

    if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false
    }
}

function validarNumeros(elemento) {
    for (var i=0, output='', validos="0123456789"; i<elemento.length; i++){
        if (validos.indexOf(elemento.charAt(i)) != -1){
            output += elemento.charAt(i)
        }
    } 
    return output;
} 

function validarFecha(fechNac){
    object=document.getElementById(fechNac);
  
    var Fecha = document.getElementById('fechaNacimiento').value
    var Mensaje = ''
    
    if(Fecha.length == 8){

        var Anio = Fecha.substr(4, 4)
        var Mes = parseFloat(Fecha.substr(2, 2)) - 1
        var Dia = Fecha.substr(0, 2)
     
     
     var VFecha = new Date(Anio, Mes, Dia)
     
     
     if((VFecha.getFullYear() == Anio) && (VFecha.getMonth() == Mes) && (VFecha.getDate() == Dia)){

        object.style.color="#000"
        return
     }
     else{

        object.style.color="#f00"
     }

    
    }
}

function validarMail(){
	
	object=document.getElementById('correo');
	valueForm=object.value;
 
	
    var patron=/^\w+([\.-]{3,8}?\w+)*@(?:est.ups.edu.ec|ups.edu.ec|)$/;
    
	if(valueForm.search(patron)==0)
	{
		
		
		object.style.color="#000";
		return;
	}
	
	
    object.style.color="#f00";
    
}