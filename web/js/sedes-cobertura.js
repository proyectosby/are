/**********
Versión: 001
Fecha: 04-04-2018
---------------------------------------
Modificaciones:
Fecha: 04-04-2018
Persona encargada: Edwin Molina Grisales
Se muestra el código de los indicadores y se mejora la carga y mostrada de las notas
---------------------------------------
**********/

$( ".content a" ).click(function(){
	 
	// if( idDocente != '' ){
		
		var table = $( "#tbTemas" );
		 
		var temas = $( "tbody > tr", table );

		var data = [];
		 
		temas.each(function(x){

			// inCalificaciones.each(function(y){

				data.push({
					id				: $( "[name=id]", this ).val() == '' ? 0 : $( "[name=id]", this ).val(),
					id_sede			: $( "#sede" ).val(),
					id_tema			: $( "[name=tema]", this ).val()*1,
					ninos			: $( "[name=ninos]", this ).val()*1,
					ninas			: $( "[name=ninas]", this ).val()*1,
					observaciones	: '',
					estado			: 1,
				});
			// });
		});
		
		
		// return;
		$.post(
			"index.php?r=sedes-cobertura/create",
			{ 
				data: data 
			},
			function( data ){
				
				try{
					for( var x in data ){
						
						var trEstudiante = $( "[estudiante="+x+"]" );
						var inIds		 = $( "input:hidden:lt(7)", trEstudiante );
						
						$( data[x] ).each(function(y){
							inIds.eq(y+1).val( this.id );
						});
					}
					
					swal({
						text: "Califiaciones guardadas exitosamente",
						icon: "success",
						button: "Cerrar",
					});
				}
				catch(e){
					swal({
						text: "Hubo un error al guardar las calificaciones",
						icon: "warning",
						button: "Cerrar",
					});
				}
			},
			"json"
		);
	// }
	
	return false;
});
