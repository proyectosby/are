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
C:\xampp\htdocs\ARE\vendor\yiisoft\yii2\helpers
**********/
//array con los datos de conexion
$datosCon = require_once ('../../config/db.php');

$usuario = $datosCon['username'];
$contrasena = $datosCon['password'];
$dsn= $datosCon['dsn'];
$datos = "$dsn;user=$usuario;password=$contrasena";
$conn = new PDO($datos);

$idSede =$_POST['idSede'];

//consulta los niveles de la sede
$sql = "SELECT n.id, n.descripcion
FROM public.sedes_niveles as sn, public.niveles as n
where sn.id_sedes=$idSede
and sn.id_niveles = n.id";

$data = array('error'=>0,'niveles','asignaturas');

$data['niveles'][]="<option value='0'>Seleccione..</option>";
foreach ($conn->query($sql) as $row) {
   $id =  $row['id'];
   $descripcion = $row['descripcion'];
	$data['niveles'][]="<option value=$id>$descripcion</option>";
}

//consulta las asignaturas de la sede
$sql = "SELECT id,descripcion
FROM public.asignaturas
where id_sedes=$idSede";
$data['asignaturas'][]="<option value='0'>Seleccione..</option>";
foreach ($conn->query($sql) as $row) {
   $id =  $row['id'];
   $descripcion = $row['descripcion'];
	$data['asignaturas'][]="<option value=$id>$descripcion</option>";
}

if(@count($data['asignaturas'])==1 || count(@$data['niveles'])==1)
	$data['error']=1;

echo json_encode($data);

// print_r($data);

 
 
 
 
 
 