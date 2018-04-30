/**********
---------------------------------------
Versión: 001
Fecha: Fecha en formato (26-04-2018)
Desarrollador: Oscar David lopez
Descripción: listar los estudiantes deacuerdo al grupo y/o a la jornada
---------------------------------------

*/

$( document ).ready(function() {
    
	//se muestra el horario al seleccionar un docente
$("#listarestudiantes-id_paralelos,#listarestudiantes-estado").change(function() 
{
	var idParalelo = $("#listarestudiantes-id_paralelos").val();
	var idJornada = $("#listarestudiantes-estado").val();
	
	//si no selecciona ningun grupo se toma como todos
	//se pone en 0 para enviar el valor al selected y para validar cual fue seleccionado
	if(idParalelo =="")
	{
		idParalelo=0;		
	}
	if(idJornada=="")
	{
		idJornada=0;
	}
	
	location.href ="index.php?r=listar-estudiantes/index&idSedes="+idSede+"&idInstitucion="+idInstitucion+"&idParalelo="+idParalelo+"&idJornada="+idJornada;
	
  // listarHorario(); 
});
	
	
});
	


function listarHorario(){
		
	var idGrupo = $("#listarestudiantes-id_paralelos").val();
	
	//si no tien ningun docente seleccionado oculat la tabla
	if(idGrupo =="")
	{
		return false;		
	}
	$.get( "index.php?r=listar-estudiantes/index&idSedes="+idSede+"&idInstitucion="+idInstitucion, 
				function( data )
				{
					alert();
					// $('#tablaModulosLabel').show();
					// cargarInformacionEnTabla(data);
					
				},
		"json");
}
