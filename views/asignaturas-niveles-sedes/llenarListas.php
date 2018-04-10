<?php

/**********
Versión: 001
Fecha: 14-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de asignaturasNivelesSedes
---------------------------------------
Modificaciones:
Fecha: 14-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - Se consultan los niveles disponibles para la sede seleccionada
---------------------------------------
Modificaciones:
Fecha: 14-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - Se consultan las asignaturas disponibles para la sede seleccionada

---------------------------------------
**********/
//array con los datos de conexion
$datosCon = require_once ('../../config/db.php');

$usuario = $datosCon['username'];
$contrasena = $datosCon['password'];
$dsn= $datosCon['dsn'];
$datos = "$dsn;user=$usuario;password=$contrasena";
$conn = new PDO($datos);



// print_r($data);

 
 
 
 
 
 