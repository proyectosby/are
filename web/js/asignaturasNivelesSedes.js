$( document ).ready(function() {
	
	
	var url = window.location.href;
	if (url.indexOf('update')!=-1) 
	{
		llenarListas(idModelo);
		
	}
	else
	{
		llenarListas();
	}
});


function llenarListas(idModelo=0)
{		
		
$.get( "index.php?r=asignaturas-niveles-sedes/niveles-sedes&idSede=48&idModelo="+idModelo, 
				function( data )
				{
					$("#asignaturasnivelessedes-id_sedes_niveles").html(data.niveles);
					$("#asignaturasnivelessedes-id_asignaturas").html(data.asignaturas);
					
					$("#asignaturasnivelessedes-id_sedes_niveles").val(data.selectNiveles);
					$("#asignaturasnivelessedes-id_asignaturas").val(data.selectAsignatura);
				},
		"json");
	
}

function llenarComboGrupo()
{
	
	idDocente =	$("#selDocentes").val();
	idNivel   =	$("#selGrado").val();
	//si el idNivel esta vacio no hace nada
	if(idNivel == "")
	{
		//si grado tiene ningun nombre seleccionado se vacia el combo de grado y se pone ese html
		$("#selGrupo").html("<option value=''>Seleccione...<\/option>");
		return false;
	}
	
	//consulta los niveles que tiene asociado ese docente
	$.get( "index.php?r=calificaciones/grupo-niveles-docente&idDocente="+idDocente+"&idNivel="+idNivel, 
			function( data )
			{
				$("#selGrupo").html(data);
			},
	"json");
		
}