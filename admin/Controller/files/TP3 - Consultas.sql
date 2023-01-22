/*TP N° 3 */
/*1.Recuperar los nro de legajo, apellido y nombres de los empleados que han pedido al menos un adelanto de sueldo*/
Select legajo, apellidoynombre from legajos
where exists (Select legajo from adelantos where legajos.legajo = adelantos.legajo);
/*2.Recuperar los nro de legajo, apellido y nombres de los empleados que nunca pidieron adelantos mayores o iguales a $7000*/
Select legajo, apellidoynombre from legajos
where exists (Select legajo from adelantos where legajos.legajo = adelantos.legajo and adelantos >= 7000);
/*3.¿Qué empleados no tiene proyecto asignado?*/
select apellidoynombre from legajos
where not exists (select legajo from equipolegajo where legajos.legajo = equipolegajo.legajo);
/*Agregar un atributo denominado duracion (minúscula sin tilde) a la tabla Proyectos y asigne a cada registro los siguientes valores, en el orden que se indican:
1.	Proyecto   Duración (es un nro entero y representa la cantidad de hs)
2.	500         450
3.	501         1200
4.	502         1800
5.	503         2500
6.	504         2800
*/
Alter table proyectos
add duracion INT(4);
UPDATE proyectos
SET duracion = 450
where nroproyecto = 500;
UPDATE proyectos
SET duracion = 1200
where nroproyecto= 501;
UPDATE proyectos
SET duracion = 1800
where nroproyecto= 502;
UPDATE proyectos
SET duracion = 2500
where nroproyecto= 503;
UPDATE proyectos
SET duracion = 2800
where nroproyecto= 504;
/*4. ¿Muestre el Nro y Nombre del proyecto, los apellidos y nombres; de empleados que han trabajado en equipos que han alcanzado el 15% o más del total del tiempo asignado a cada proyecto? */
Select nroproyecto, nombrepoyecto, apellidoynombre from proyectos, legajos
inner join  proy_equipo_hs on proy_equipo_hs.idequipo
where proyectos.duracion * 0.15 >= proy_equipo_hs.hstrabajadas
order by nombrepoyecto;
/*5. ¿Muestre Nombre del proyecto y los apellidos y nombres; de empleados que han trabajado en equipos que han alcanzado el 15% o más del total del tiempo asignado al proyecto Facturación?*/
Select nombrepoyecto, apellidoynombre from proyectos, legajos
inner join  proy_equipo_hs on proy_equipo_hs.idequipo
where proyectos.duracion * 0.15 >= proy_equipo_hs.hstrabajadas and nroproyecto = 500;
/*6. ¿Qué proyecto tiene asignada más horas que el Promedio Total de hs trabajadas por todos los equipos?*/
Select nombrepoyecto from proyectos
inner join  proy_equipo_hs on proy_equipo_hs.idequipo
where sum(hstrabajadas)/ 6 < hstrabajadas;
/*7. Encontrar todos los equipos donde las hs trabajadas sea el 30% o más de las hs trabajadas totales*/
Select nombrepoyecto from proyectos
inner join  proy_equipo_hs on proy_equipo_hs.idequipo
where sum(hstrabajadas)/ 6 < hstrabajadas * 0.30;

CREATE  VIEW Pepe as 
Select dni, apellidoynombre, equipo from legajo, equipolejago
where equipo = 2;