var consecutivo = 1;

function agregarCampos(){
	
	$.post( 
		"index.php?r=documentos/agregar-campos",
		{
			consecutivo : consecutivo++,
		},
		function( data ){
			console.log(data);
			
			$( "#dvTable" ).append( data );
			
			$( "#btnEliminar" ).css({display:""});
		},
		"text"
	);
}

function eliminarCampos(){
	
	var rows = $( "#dvTable div.row" );
	
	rows.eq( rows.length-1 ).remove();
	consecutivo--;
	
	if( consecutivo == 1 )
		$( "#btnEliminar" ).css({display:"none"});
}

$( document ).ready(function(){
	
	setTimeout( function(){
		if( $( "[name=guardado]" ).length > 0 ){
			swal({
				text: "Califiaciones guardadas exitosamente",
				icon: "success",
				button: "Cerrar",
			});
		}
	}, 1000 );
});