$( document ).ready(function() {
	// Handler for .ready() called.
	$( "input" ).change(function(){
		
		var tr = $( this ).parent().parent().parent();
		
		var tds = $( "input", tr );
		var sum = 0;
		
		sum += tds.eq(0).val()*0.3;
		sum += tds.eq(1).val()*0.4;
		sum += tds.eq(2).val()*0.3;
		sum = sum*0.7;
		sum += tds.eq(3).val()*0.1;
		sum += tds.eq(4).val()*0.1;
		sum += tds.eq(5).val()*0.1;
		
		$( tds[ 6 ] ).val( Math.round( 100*sum )/100 );
	});
	
	llenarComboDocentes();
	
});


//consulta los docentes 
function llenarComboDocentes()
{
	
	$.get( "index.php?r=calificaciones/listar-docentes", 
				function( data )
				{
					$("#selDocentes").html(data);
				},
		"json");
	
	
}


//consulta los niveles(grados) que tiene asociado ese docente desde #selDocentes
$("#selDocentes").change(function()
{
	llenarComboGrados();
});

//consulta los grupo(paralelos) que tiene asociado ese docente en ese grado desde #selDocentes
$("#selGrado").change(function()
{
	llenarComboGrupo();
});


//consulta las materias que tiene asociado ese docente en ese grupo des #selGrado
$("#selGrupo").change(function()
{
	llenarComboMateria();
});


//consulta los niveles(grados) que tiene asociado ese docente
function llenarComboGrados()
{
	
	idDocente=$("#selDocentes").val();
	//si el id esta vacio no hace nada
	if(idDocente == "")
	{
		//si docente tiene ningun nombre seleccionado se vacia el combo de grado y se pone ese html
		$("#selGrado").html("<option value=''>Seleccione...<\/option>");
		return false;
	}
	
	//consulta los niveles que tiene asociado ese docente
	$.get( "index.php?r=calificaciones/niveles-docente&idDocente="+idDocente, 
			function( data )
			{
				$("#selGrado").html(data);
			},
	"json");
		
}


//consulta los grupo(paralelos) que tiene asociado ese docente en ese grupo des #selGrado
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



//consulta las materias que tiene asociado ese docente en ese grupo des #selGrado
function llenarComboMateria()
{
	
	idDocente =	$("#selDocentes").val();
	idParalelo   =	$("#selGrupo").val();
	//si el idNivel esta vacio no hace nada
	if(idParalelo == "")
	{
		//si grado tiene ningun nombre seleccionado se vacia el combo de grado y se pone ese html
		$("#selMateria").html("<option value=''>Seleccione...<\/option>");
		return false;
	}
	
	//consulta los niveles que tiene asociado ese docente
	$.get( "index.php?r=calificaciones/materia-grupo&idDocente="+idDocente+"&idParalelo="+idParalelo, 
			function( data )
			{
				$("#selMateria").html(data);
			},
	"json");
		
}
