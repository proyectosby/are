<?php

/**********
Versión: 001
Fecha: 19-03-2018
Desarrollador: Oscar David Lopez
Descripción: Traer bloques por sede
---------------------------------------

**********/
//array con los datos de conexion
$datosCon = require_once ('../../config/db.php');

$usuario = $datosCon['username'];
$contrasena = $datosCon['password'];
$dsn= $datosCon['dsn'];
$datos = "$dsn;user=$usuario;password=$contrasena";
$conn = new PDO($datos);

// if (isset($_POST['accion']) and $_POST['accion'] == 'consultar_bloques_sede') {
	
	// $data = array('error'=>0,'bloques'=>'');
	
	// $idSede =$_POST['idSede'];
	
	//consulta los niveles de la sede
	// $sql = "select b.id, b.descripcion as des
		// from bloques as b, sedes_x_bloques as sb
		// where b.id = sb.id_bloques
		// and sb.id_sedes = $idSede
		// and b.estado = 1";

	$sql = "select d.id as id_dia, b.descripcion as bloques_descripcion, a.descripcion as asignaturas_descripion, 
	d.descripcion as dias_descripcion
from dias as d, bloques as b, distribuciones_x_bloques_x_dias as dbd, distribuciones_academicas as dis, 
asignaturas_x_niveles_sedes as ans, asignaturas as a
where dis.id = dbd.id_distribuciones_academicas
and d.id = dbd.id_dias
and b.id = dbd.id_bloques
and dis.id_asignaturas_x_niveles_sedes = ans.id
and ans.id_asignaturas = a.id
and b.id in (1,2)
and d.id in (1, 2, 3, 4)
";
	
	
	foreach ($conn->query($sql) as $row) 
	{	
		
		echo "<pre>";print_r($row);echo "</pre>";
		die;
		// $row[]='First name: <input type="text" name="fname">';
		// $row['otro']="boton";
		$data[]=$row;
	}
	// echo "<pre>";print_r($data);echo "</pre>";
	

	// echo "aqui";
	// print_r($data);
	echo json_encode($data);
// } 
 
 
 
 
 
 