$( document ).ready(function() {
	// Handler for .ready() called.
	$( "input" ).change(function(){
		
		var tr = $( this ).parent().parent().parent();
		
		var tds = $( "input:text", tr );
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

$( ".content a" ).click(function(){
	
	var nombreFormulario = $( ".content form" ).attr( "id"); 
	var idDocente = $( selDocentes ).val();
	 
	if( idDocente != '' ){
		
		var table = $( ".content table" ).eq( $( ".content table" ).length-1 );
		 
		var estudiantes = $( "tbody > tr", table );
		 
		//Obtenendo los codigos del desempño
		var codigosDesempeno = $( "thead > tr", table ).eq(3);
		var codigosDesempeno = $( "th", codigosDesempeno );

		data = [];
		 
		estudiantes.each(function(x){
			 
			var estudiante 		 = $( "[name=idPersona]", this ).val()*1;
			var inCalificaciones = $( "input:text:lt(6)", this );
			
			
			inCalificaciones.each(function(y){

				data.push({
					calificacion							: $( this ).val()*1,
					fecha									: "2018-03-21",
					observaciones							: "",
					id_perfiles_x_personas_docentes			: idDocente,
					id_perfiles_x_personas_estudiantes		: estudiante,
					id_distribuciones_x_indicador_desempeno	: codigosDesempeno.eq(y).html()*1,
					fecha_modificacion						: "2018-03-21",
					estado									: 1,
				});
			});
		});
		
		console.log(data);
		
		
		$.post(
			"index.php?r=calificaciones/create",
			{ data: data },
			function( data ){},
			"json"
		);
	}
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

//inicio eventos 

//consulta los niveles(grados) que tiene asociado ese docente desde #selDocentes
$("#selDocentes").change(function()
{
	llenarComboGrados();
	llenarCommbosSedeJornadaPeriodo();
	
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

//Fin eventos 


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


function llenarCommbosSedeJornadaPeriodo()
{
	
	idDocente =	$("#selDocentes").val();
	//si el idNivel esta vacio no hace nada
	if(idDocente == "")
	{
		//si grado tiene ningun nombre seleccionado se vacia el combo de grado y se pone ese html
		$("#xxxxxxxxxxxxxx").html("<option value=''>Seleccione...<\/option>");
		return false;
	}
	
	//consulta los niveles que tiene asociado ese docente
	$.get( "index.php?r=calificaciones/sede-jornada-periodo&idDocente="+idDocente, 
			function( data )
			{
				$("#txtSede").val(data.nombreSede);
				$("#selJornada").html(data.jornadas);
				$("#selPeriodo").html(data.periodos);
			},
	"json");
		
}

/**
 * Funcion llenar los indicadores de desempeño
 * 
 * param Parámetro: El onchange del select id selMateria
 * return Tipo de retorno: Retorna los indicadores a calficar
 * author : Viviana Rodas
 * exception : No tiene excepciones.
 */
$("#selMateria").change(function(){ 

	idDocente =	$("#selDocentes").val();
	idParalelo = $("#selGrupo").val();
	idAsignatura = $("#selMateria").val();
	
	
	//llenar indicadores desempeño
	$.get( "index.php?r=calificaciones/listar-i&idDocente="+idDocente+"&idParalelo="+idParalelo+"&idAsignatura="+idAsignatura, 
				function( data )
				{
					// console.log(data); //alert(data[0]['id']);
					$("#thSaber").html(data[0]['id']);
					$("#thHacer").html(data[1]['id']);
					$("#thSer").html(data[2]['id']);
					$("#thPers").html(data[3]['id']);
					$("#thSoci").html(data[4]['id']);
					$("#thAE").html(data[5]['id']);
					 
				},
		"json");
});
