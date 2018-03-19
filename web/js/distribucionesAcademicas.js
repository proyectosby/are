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
	// alert(modificar+ ""+asignaturas_distribucion);
	// setTimeout(function(){ alert(); modificar = $("#hidModificar").val();
// alert(modificar);	}, 2000);
	
	
	//listar(); 
	llenarListasActualizar();	
	
});

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
	
	
}); 


/**
 * Funcion de listar las distribucines academicas.
 * 
 * param Parámetro: No recibe parametros
 * return Tipo de retorno: Retorna la lista de distribuciones
 * author : Viviana Rodas
 * exception : No tiene excepciones.
 */



function listar(){
	
	
	
	$.get( "index.php?r=distribuciones-academicas/listar&idMunicipio=1006", 
				function( data )
				{
					alert(data);
					
				},
		"json");

}

