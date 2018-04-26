$( document ).ready(function() {
    
	
	$( "#datosGenerales-tab" ).trigger( "click" );
	
	// $("#formaciones-tab").click(function(){ 
			 // $("#formaciones").load("../web/index.php?r=personas-formaciones"); 
			 
			
		// });
		
		llenarPerfilesSelected();
	
});

/**
* Funcion que pone el select de perfiles en selectes los perfiles que trae
*/
function llenarPerfilesSelected(){
	
	var a = $("#hidSelected").val();
		
	if (a != ""){
		
		var ui = {
			    item: {tallas: a}
			};

			var tallasAux = ui.item.tallas.split(',');

			if (tallasAux.length >= 1) { 

				for (var i = 0; i < tallasAux.length; i++) { 

					// $('#perfiles-id').append('<option value="'+i+'">'+tallasAux[i]+'</option>' );
					// $( "#perfiles-id" ).val(tallasAux[i]);
					$("#perfiles-id option[value='" + tallasAux[i] + "']").prop("selected", true);
				} 

			} 
	}
		
	
}
