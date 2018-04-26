function marcarFalta( cmp, obj ){
	console.log( cmp );
	if( $( cmp ).val() == 'asistió' ){
		$( cmp ).val( 'faltó' );
	}
	else{
		$( cmp ).val( 'asistió' );
	}
}