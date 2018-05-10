function seleccionarTabla( cmp )
{
	
	$.get( 'index.php?r=poblar-tabla/columnas-por-tabla&tabla='+$( cmp ).val(), function(data){
		
		$( "#pCsvExample").html("");
	  
		if( data.data )
		{
			$( data.data ).each(function(x){
				
				var coma = "";
				
				if( x > 0 )
					coma = ",";

				$( "#pCsvExample").html( $( "#pCsvExample").html() + coma + '"' + data.data[x] +'"' );
			});
			
			$( "#pCsvExample" ).html( $( "#pCsvExample" ).html() + "<br>" + $( "#pCsvExample" ).html()  + "<br>" + $( "#pCsvExample" ).html() + "<br>..." );
		}
	  
	}, "json" );
}