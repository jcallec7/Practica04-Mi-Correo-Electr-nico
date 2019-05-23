# Practica04-Mi-Correo-Electronico

## INFORME
Creacion de un pequeño correo en base a JavaScript, PHP, y HTML. A continuacion los resutaldos.

Diagramas, bases de datos y sentencias SQL.

![1](https://github.com/jcallec7/Practica04-Mi-Correo-Electronico/blob/master/captures/1.png)
![2](https://github.com/jcallec7/Practica04-Mi-Correo-Electronico/blob/master/captures/2.png)

Sentencia SQL: 

CREATE TABLE `usuario` ( 
  `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, 
  `usu_cedula` varchar(10) NOT NULL, 
  `usu_avatar` varchar(255) NOT NULL,
   `usu_rol` varchar(7) NOT NULL,
  `usu_nombres` varchar(50) NOT NULL, 
  `usu_apellidos` varchar(50) NOT NULL, 
  `usu_direccion` varchar(75) NOT NULL, 
  `usu_telefono` varchar(20) NOT NULL, 
  `usu_correo` varchar(20) NOT NULL, 
  `usu_password` varchar(255) NOT NULL, 
  `usu_fecha_nacimiento` date NOT NULL, 
  `usu_eliminado` varchar(1) NOT NULL DEFAULT 'N', 
  `usu_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  `usu_fecha_modificacion` timestamp NULL DEFAULT NULL, 
  PRIMARY KEY (`usu_codigo`), 
  UNIQUE KEY `usu_cedula` (`usu_cedula`),
  UNIQUE KEY `usu_correo` (`usu_correo`),
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; 

 
CREATE TABLE `correo` ( 
  `corr_codigo` int(11) NOT NULL AUTO_INCREMENT, 
  `corr_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `corr_remitente` varchar(100) NOT NULL, 
  `corr_destinatario` varchar(100) NOT NULL, 
  `corr_asunto` varchar(100) NOT NULL, 
  `corr_mensaje` varchar(255) NOT NULL, 
  `corr_eliminado` varchar(1) NOT NULL DEFAULT 'N', 
   PRIMARY KEY (`corr_codigo`), 
   FOREIGN KEY (`corr_destinatario`) REFERENCES`usuario`(`usu_correo`),
   FOREIGN KEY (`corr_remitente`) REFERENCES`usuario`(`usu_correo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; 


Desarrollo de la pagina:

![3](https://github.com/jcallec7/Practica04-Mi-Correo-Electronico/blob/master/captures/3.png)
![4](https://github.com/jcallec7/Practica04-Mi-Correo-Electronico/blob/master/captures/4.png)
![5](https://github.com/jcallec7/Practica04-Mi-Correo-Electronico/blob/master/captures/5.png)
![6](https://github.com/jcallec7/Practica04-Mi-Correo-Electronico/blob/master/captures/6.png)
![7](https://github.com/jcallec7/Practica04-Mi-Correo-Electronico/blob/master/captures/7.png)
![8](https://github.com/jcallec7/Practica04-Mi-Correo-Electronico/blob/master/captures/8.png)
![9](https://github.com/jcallec7/Practica04-Mi-Correo-Electronico/blob/master/captures/9.png)
![10](https://github.com/jcallec7/Practica04-Mi-Correo-Electronico/blob/master/captures/10.png)

https://github.com/jcallec7/Practica04-Mi-Correo-Electronico.git
User: jcallec7
