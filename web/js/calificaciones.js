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
	});