# Agenda Académica

Una aplicación web para crear actividadades y eventos académicos, permite marcar y guardar tus actividades
para una posterior visualización en agenda.

Existen dos tipos de usuarios:  
* Usuario  
* Organizador

## Usuario
* Se considera usuario al alumno que desea buscar, marcar y organizar eventos academicos  
disponibles en la plataforma

* El usuario al ingresar podrá ver eventos sugeridos de acuerdo a sus temas de interes
Por defecto este campo esta vacio, para actualizarlo debe dirigirse a la seccion perfil

* En la seccion todos los eventos, el usuario podrá ver todos los eventos con fecha de inicio posterior a hoy
En las secciones me interesan y asistire se podran ver los eventos asi marcados, ademas de una agenda que ayude a organizar
los eventos al usuario

* En el historial se mostraran eventos cuya fecha de fin se posterior a la de hoy y que ademas
hayan sido marcadas como asistire por el usuario previamente

* En mi agenda, se veran todos los eventos que el usuario ha marcado ademas al hacer click sobre
el nombre del evento se podra visualizar mayor información de éste

## Organizador
* El organizador es el encargado de publicar el o los eventos academicos,  
ademas en cada evento debe ponerse el o los ponentes que expongan el tema,  
es decir organizador y ponente no son equivalentes

* En el inicio, el organizador podra ver graficos estadisticos de los usuarios a los que les interesa o han marcado asistencia a alguno de
sus eventos en la ultima semana. El dia que un usuario marca un evento sera el que se muestre al organizador, aun si el usuario elimina
y vuelve a marcar el mismo evento

* El organizador podra crear nuevos eventos luego de llenar correctamente un formulario

* En la seccion mis eventos el organizador podra editar algunos campos del evento, siempre que éste no haya empezado 
(tampoco se podra editar el evento si esta a 2 horas o menos de comenzar)

* A partir de 2 horas antes de iniciar cada evento al organizador se le habilitara la opcion Data  
Con la cual podra ver un listado completo de los usuarios asistentes al evento, con la opcion de
verificar la asistencia del usuario el pago correspondiente(en el caso de certificados, por ejemplo), la disponibilidad
del certificado de cada usuario y la entrega correspondiente(esto con fines de facilitar la gestion del evento)

* Cuando considere oportuno el organizador podra cerrar el evento, con lo cual la informacion relacionada solo sera visible 
mas no editable

* Ademas el organizador podra generar reportes pdf de la informacion relacionada a cada uno de sus eventos en la seccion Data

## Demo
[Demostracion online](http://demo-agenda-academica.sa-east-1.elasticbeanstalk.com/)



Puede iniciar sesion como  
User:  demo1@gmail.com  
Password:  demo123  

Nota:  
Puede reemplazar el numero 1 por cualquiera del 1 al 5  
Las mismas credenciales sirven para usuario y organizador

## Autores:
* Idea y plan de negocio:    
Ruiz Cecilio, Christopher  
* Desarrollador web:  
Salazar Ramos, Jose Gregorio  

