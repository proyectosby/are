/**********
Versión: 001
Fecha: Fecha en formato (15-03-2018)
Desarrollador: Viviana Rodas
Descripción: js Distribuciones academicas
---------------------------------------
Versión: 002
Fecha: Fecha en formato (26-04-2018)
Desarrollador: Oscar David lopez
Descripción: Horario con datatables
---------------------------------------

*/

$( document ).ready(function() {
    
	
	modificar = $("#hidModificar").val();
	asignaturas_distribucion=$("#hidAsig").val();
	paralelos_distribucion=$("#hidPara").val();
	idSede=$("#hidIdSede").val();
	$('#tablaModulosLabel').hide();
	
	var table="";
	llenarListasActualizar();
	
});
	
	//se muestra el horario al seleccionar un docente
$("#distribucionesacademicas-id_perfiles_x_personas_docentes").change(function() 
{
  listarHorario(); 
});


function listarHorario(){
		
	var idDocente = $("#distribucionesacademicas-id_perfiles_x_personas_docentes").val();
	
	//si no tien ningun docente seleccionado oculat la tabla
	if(idDocente =="")
	{
		$('#tablaModulos_wrapper').hide();
		$('#tablaModulosLabel').hide();
		return false;
		
	}
	$.get( "index.php?r=distribuciones-academicas/horario&idSedes="+idSede+"&idDocente="+idDocente, 
				function( data )
				{
					$('#tablaModulosLabel').show();
					cargarInformacionEnTabla(data);
					
				},
		"json");
}

//llenar el datatable del horario
function cargarInformacionEnTabla(data)
{
		
		//se destruye el datatable al inicio
	if(typeof table !== "undefined")
	{
		
        table.destroy(); 
        $('#tablaModulos').empty();
    }
		
			
		 table = $('#tablaModulos').DataTable({
			"data": data,
			columns: [
			{ data: "bloques"},
			{ data: "LUNES"},
			{ data: "MARTES"},
			{ data: "MIERCOLES" },
			{ data: "JUEVES" },
			{ data: "VIERNES" },
			{ data: "SABADO" },
			{ data: "DOMINGO" },
			
			// {data: null, className: "center", defaultContent: '<a id="view-link" class="edit-link" href="#" title="Edit">Estudiantes por Salón </a>'},
			// {data: null, className: "center", defaultContent: '<a id="asistencias-link" class="asistencias-link" href="#" title="Edit">Asistencias</a>'}
			],
			"info":     false,
			"order": [[ 0, "asc" ]],
			"scrollY": "300px",
			"scrollX": true,
			"bDestroy": true,
			"bSort": false,
			"scrollCollapse": true,
			"searching": false,
			"paging": false,
			"filter":false,
			"columnDefs": [
			// {"targets": [ 0 ],"visible": true,"searchable": true},
			// {"targets": [ 1 ],"visible": true,"searchable": false},
			// {"targets": [ 3 ],"visible": false,"searchable": false},
			// {"targets": [ 5 ],"visible": false,"searchable": false},
			// {"targets": [ 15 ],"visible": false,"searchable": false},
			// {"targets": [ 13 ],"visible": false,"searchable": false},
			// {"targets": [ 16 ],"visible": false,"searchable": false},
			// {"targets": [ 17 ],"visible": false,"searchable": false}
			],
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                "sProcessing":     "Procesando...",
				"sSearch": "Filtrar:",
				"zeroRecords": "Ningún resultado encontrado",
				"infoEmpty": "No hay registros disponibles",
				"Search:": "Filtrar"
			}
		});
		
		// $('#tablaModulos tbody').on('click', 'tr', function () 
		// {
			// console.log( table.row( this ).data() );
			// if ( $(this).hasClass('selected')) {
				// $(this).removeClass('selected');
				// seleccionado = false;
			// }else{
				// table.$('tr.selected').removeClass('selected');
				// $(this).addClass('selected');
				// seleccionado = true;
			// }
			
		// } );
		
		
}

//se obtiene el valor de la celda de dia y bloque
	$('#tablaModulos').on( 'click', 'tbody td', function () 
	{
		
		columna = "";
		fila = "";
		informacion = "";
		
		var  dataColumn = table.column( this).data();
		var idx = table.cell( this ).index().row;
		var datafila = table.cells( idx, '' ).render( 'display' );
		
		//saber que dia se la semana escojieron 
		dia = dataColumn[0];
		
		//saber que bloque seleccionaron
		bloque = datafila[0];
		
		//saber que dato tiene la celda
		informacion = table.cell( this ).data();
		alert(informacion);
		nivel = $("#selSedesNivel").val();
		grupo = $("#distribucionesacademicas-id_paralelo_sede").val();
		aula  = $("#distribucionesacademicas-id_aulas_x_sedes").val();
		asignatura = $("#distribucionesacademicas-id_asignaturas_x_niveles_sedes").val();
		
		fecha_ingreso = $("#distribucionesacademicas-fecha_ingreso").val();
		
		
		if (nivel=="" || grupo=="" || aula==""|| asignatura=="")
		{
			alert("Debe selecccionar todos los campos");
		}
		else
		{
			
		idDocente = $("#distribucionesacademicas-id_perfiles_x_personas_docentes").val();
			
			$.post( "index.php?r=distribuciones-academicas/create&idSedes="+idSede+"&idInstitucion=55",
			{
				id_asignaturas_x_niveles_sedes:asignatura,
				id_perfiles_x_personas_docentes:idDocente,
				id_aulas_x_sedes		:aula,
				estado					:1,
				id_paralelo_sede		:grupo,
				fecha_ingreso			:fecha_ingreso,
				informacionCelda		:informacion,
				dia						:dia,
				bloque					:bloque,
			},
				function( data )
				{
					
					listarHorario();
				},
		"json");
			
			
		}
		
	} );
	



function llenarListasActualizar() 
{
	var url = window.location.href; 
	if (url.indexOf('update')!=-1) 
	{
		
		$('#selSedesNivel').trigger('change');
		// setTimeout(function(){ llenarListas(); }, 2000);	
	}
}


/**
 * Funcion de listar asignaturas por niveles sedes
 * 
 * param Parámetro: El onchange del select de niveles
 * return Tipo de retorno: Retorna asignaturas por niveles sedes
 * author : Viviana Rodas
 * exception : No tiene excepciones.
 */
$("#selSedesNivel").change(function(){ 
   
	idSedesNiveles = $("#selSedesNivel").val();
	idSedes = $("#hidIdSede").val();
	
	//llenar asignaturas
	$.get( "index.php?r=distribuciones-academicas/listar-a&idSedesNiveles="+idSedesNiveles, 
				function( data )
				{
					// console.log(data);
					$('#distribucionesacademicas-id_asignaturas_x_niveles_sedes').find('option:not(:first)').remove();
					for( i = 0; i< data.length; i++ ){ 
						
						$("#distribucionesacademicas-id_asignaturas_x_niveles_sedes").append('<option value='+data[i].id+'>'+data[i].descripcion+'</option>');
					}
					 
					 // setTimeout(function(){ 
						if (asignaturas_distribucion != ""){  
							$( "#distribucionesacademicas-id_asignaturas_x_niveles_sedes" ).val(asignaturas_distribucion);
						 }
					// }, 2000);
					 
				},
		"json");
		
		//llenar grupos paralelos
	$.get( "index.php?r=distribuciones-academicas/listar-g&idSedesNiveles="+idSedesNiveles+"&idSedes="+idSedes, 
				function( data )
				{
					// console.log(data);
					$('#distribucionesacademicas-id_paralelo_sede').find('option:not(:first)').remove();
					for( i = 0; i< data.length; i++ ){ 
						
						$("#distribucionesacademicas-id_paralelo_sede").append('<option value='+data[i].id+'>'+data[i].descripcion+'</option>');
					}
						if (paralelos_distribucion != ""){ 
							$( "#distribucionesacademicas-id_paralelo_sede" ).val(paralelos_distribucion);
						 }
					 
				},
		"json");
	
	
}); 


// $("#btnHorario").click(function(){
      
      // window.open("/are/views/distribuciones-academicas/horario.html?idSede="+idSede, '_blank');
   // });


/**
 * Funcion de listar las distribucines academicas.
 * 
 * param Parámetro: No recibe parametros
 * return Tipo de retorno: Retorna la lista de distribuciones
 * author : Viviana Rodas
 * exception : No tiene excepciones.
 */



function Abrir_ventana (pagina) {
var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,width=300,height=300,top=85,left=140";
window.open(pagina,"",opciones);
}

