/**********
Versión: 001
Fecha: Fecha en formato (15-03-2018)
Desarrollador: Viviana Rodas
Descripción: js Distribuciones academicas
---------------------------------------
*/

$( document ).ready(function() {
    
	
	modificar = $("#hidModificar").val();
	asignaturas_distribucion=$("#hidAsig").val();
	paralelos_distribucion=$("#hidPara").val();
	idSede=$("#hidIdSede").val();

	listarHorario(); 
	llenarListasActualizar();
	
});

function listarHorario(){
	
	$.get( "index.php?r=distribuciones-academicas/horario&idSedes=48", 
				function( data )
				{
					cargarInformacionEnTabla(data);
					
				},
		"json");

}

//llenar el datatable del horario
function cargarInformacionEnTabla(data)
{
		
		//se destruye el datatable al inicio
	if(typeof table !== "undefined"){
            table.destroy(); 
            $('#tablaModulos').empty();
        }
		
		// data =[{"bloques":"BLOQUE_1","LUNES":"Educación Física, Recreación y Deporte","MARTES":"No asignado","MIERCOLES":"No asignado","JUEVES":"No asignado","VIERNES":"No asignado","SABADO":"No asignado","DOMINGO":"No asignado"},{"bloques":"BLOQUE_2","LUNES":"No asignado","MARTES":"Idiomas","MIERCOLES":"No asignado","JUEVES":"No asignado","VIERNES":"No asignado","SABADO":"No asignado","DOMINGO":"No asignado"},{"bloques":"BLOQUE_3","LUNES":"No asignado","MARTES":"No asignado","MIERCOLES":"No asignado","JUEVES":"Matemáticas","VIERNES":"No asignado","SABADO":"No asignado","DOMINGO":"No asignado"},{"bloques":"BLOQUE_4","LUNES":"No asignado","MARTES":"No asignado","MIERCOLES":"No asignado","JUEVES":"Ciencias Sociales","VIERNES":"No asignado","SABADO":"No asignado","DOMINGO":"No asignado"}];		
		
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
			
			// { title: "Id Módulo" },
			// { title: "Módulo" },
			// { title: "Fecha Inicial" },
			// { title: "Fecha Final" },
			// { title: "Duración" },
			// { title: "Sede" },
			// { title: "Días Curso" },
			// { title: "Horario" },
			// { title: "IntensidadHorariaDiaria" },
			// { title: "Inscritos" },
			// { title: "Ruta" },
			// { title: "Modalidad" },
			// { title: "cantidadSesiones" },
			
			// {data: null, className: "center", defaultContent: '<a id="view-link" class="edit-link" href="#" title="Edit">Estudiantes por Salón </a>'},
			// {data: null, className: "center", defaultContent: '<a id="asistencias-link" class="asistencias-link" href="#" title="Edit">Asistencias</a>'}
			],
			"paging":   true,
			"info":     false,
			"order": [[ 0, "asc" ]],
			"scrollY": "300px",
			"scrollX": true,
			"bDestroy": true,
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
				
			// if ( $(this).hasClass('selected')) {
				// $(this).removeClass('selected');
				// seleccionado = false;
			// }else{
				// table.$('tr.selected').removeClass('selected');
				// $(this).addClass('selected');
				// seleccionado = true;
			// }
			
		// } );
		
		$('#tablaModulos').on( 'click', 'tbody td', function () {
			 alert( table.cell( this ).data() );
			 var idx = table.cell( this ).index().row;
			var data = table.cells( idx, '' ).render( 'display' );
		 
			console.log( data );
		} );
		
}




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
					 
					 // setTimeout(function(){ 
						if (paralelos_distribucion != ""){ 
							$( "#distribucionesacademicas-id_paralelo_sede" ).val(paralelos_distribucion);
						 }
					// }, 2000);
					 
				},
		"json");
	
	
}); 

// $("#btnHorario").click(function(){
      
		// // // $( "#divHorario" ).load( "/are/views/distribuciones-academicas/horario.php" );
		
		// // // if($('#divHorario').css('display') == 'none'){
		   // // // // Acción si el elemento no es visible
		   // // // $("#divHorario").show();
		// // // }else{
		   // // // // Acción si el elemento es visible
		   // // // $("#divHorario").hide();
		// // // }
		
		
	  // window.open("/are/views/distribuciones-academicas/horario.html?idSede="+idSede, '_blank');
    // });



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



// function listar(){
	
	
	
	// $.get( "index.php?r=distribuciones-academicas/listar&idMunicipio=1006", 
				// function( data )
				// {
					// alert(data);
					
				// },
		// "json");

// }

function Abrir_ventana (pagina) {
var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,width=300,height=300,top=85,left=140";
window.open(pagina,"",opciones);
}

