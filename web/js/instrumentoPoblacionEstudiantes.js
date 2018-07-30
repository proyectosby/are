

$( document ).ready(function(){
	
	var institucion = $( "#instrumentopoblacionestudiantes-id_institucion" );
	var sedes 		= $( "#instrumentopoblacionestudiantes-id_sede" );
	var estudiantes	= $( "#instrumentopoblacionestudiantes-id_persona_estudiante" );
	var wform		= $( "#w0" );
	
	
	function mostrarSede(){
		try{
			$.post(
				"index.php?r=instrumento-poblacion-estudiantes/sede",
				{
					sede		:	sedes.val(),
					institucion	:	institucion.val(),
				},
				function( data ){
					
					try{
						$( "#dv-institucion-sede" ).html( data );
					}
					catch(e){
						console.log(e);
					}
				},
			);
		}
		catch(e){
			mostrarFases();
		}
	}
	
	estudiantes.change(function(){
		try{
			
			$.post(
				"index.php?r=instrumento-poblacion-estudiantes/estudiantes",
				{
					estudiante:	estudiantes.val(),
				},
				function( data ){
					
					try{
						$( "#dv-estudiante" ).html( data );
					}
					catch(e){
						console.log(e);
					}
					
					mostrarFases();
				},
			);
		}
		catch(e){
			mostrarFases();
		}
	});
	
	sedes.change(function(){
		
		$( "#dv-estudiante" ).html( '' );
		
		try{
			$.get(
				"index.php?r=instrumento-poblacion-estudiantes/estudiantes-por-sede",
				{
					sede:	sedes.val(),
				},
				function( data ){
					
					try{
						estudiantes.html('');
						for( var x in data ){
							estudiantes.append( "<option value='"+data[x].id+"'>"+data[x].identificacion+" - "+data[x].nombres+" "+data[x].apellidos+"</option>" );
						}
						
						estudiantes.trigger("chosen:updated");
						
						mostrarSede();
					}
					catch(e){
						console.log(e);
					}
					
					mostrarFases();
				},
				"json",
			);
		}
		catch(e){
			mostrarFases();
		}
	});
	
	institucion.change(function(){
		
		$( "#dv-estudiante" ).html( '' );
		
		try{
			$.get(
				"index.php?r=sedes/sedes",
				{
					idInstitucion:	institucion.val(),
				},
				function( data ){
					
					try{
						sedes.html('');
						for( var x in data ){
							sedes.append( "<option value='"+x+"'>"+data[x]+"</option>" );
						}
						
						sedes.trigger("chosen:updated");
					}
					catch(e){
						console.log(e);
					}
					
					mostrarFases();
				},
				"json",
			);
		}
		catch(e){
			mostrarFases();
		}
		
	});

	$( "#bt-guardar" ).click(function(){
		$.post(
			"index.php?r=instrumento-poblacion-estudiantes/guardar",
			$( "#w0" ).serialize(),
			function( data ){
				// $( "#dv-fases" ).html( data );
				
				if( data['error'] == 0 ){
					
					swal({
						text: "Registros guardados correctamente",
						icon: "success",
						button: "Cerrar",
					});
				}
				else{
					swal({
						text: "Hubo un error al guardar los datos",
						icon: "success",
						button: "Cerrar",
					});
				}
			},
			"json",
		);
	});
	
	function mostrarFases(){
		
		$( "#dv-fases" ).html( '' );
		
		if( institucion.val() && sedes.val() && estudiantes.val() ){
			
			$.post(
				"index.php?r=instrumento-poblacion-estudiantes/view-fases",
				{
					institucion	: institucion.val(),
					sede		: sedes.val(),
					estudiante	: estudiantes.val(),
				},
				function( data ){
					// console.log(data);
					$( "#dv-fases" ).html( data );
					
					$( ".panel-body" ).each(function(){
	
						var spanTotal 	= $( "[total]", this );
						var inputs		= $( "input:text", this );
						var _self = this;
						
						function calcularTotal(){
							
							var sum = 0;
							
							inputs.each(function(){
								sum += $( this ).val()*1;
							});
							
							spanTotal.html( sum );
						}
						
						inputs.change(function(){
							calcularTotal();
							// alert(11111)
						});
					});

				},
			);
		}
	}
});