$(document).ready(function(){
   
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    // var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="../web/images/borrar.png" height="30" width="30" /></a></div>'; //New input field html 
    var fieldHTML = '<div><div class="form-group field-gestioncurricularactividadesplaneadas-titulo required"><label class="control-label" for="gestioncurricularactividadesplaneadas-titulo">Titulo</label><input type="text" id="gestioncurricularactividadesplaneadas-titulo" class="form-control" name="gestioncurricularactividadesplaneadas-descripcion[]" aria-required="true"><div class="help-block"></div></div><div class="form-group field-gestioncurricularactividadesplaneadas-descripcion required"><label class="control-label" for="gestioncurricularactividadesplaneadas-descripcion">Descripcion</label><textarea id="gestioncurricularactividadesplaneadas-descripcion" class="form-control" name="gestioncurricularactividadesplaneadas-descripcion[]" aria-required="true"></textarea><div class="help-block"></div></div>	<a href="javascript:void(0);" class="remove_button" title="Eliminar"><img src="../web/images/borrar.png" height="30" width="30" /></a></div>'; //New input field html 
    
    $(addButton).click(function(){ //Once add button is clicked
        
            $(wrapper).append(fieldHTML); // Add field html
        
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
    });
});


	addButton1 = $('.add_button1'); //Add button selector
    wrapper1 = $('.field_wrapper1'); //Input field wrapper
    // var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="../web/images/borrar.png" height="30" width="30" /></a></div>'; //New input field html 
    var fieldHTML1 = '<div><div class="form-group field-gestioncurricularresultadosesperados-titulo required"><label class="control-label" for="gestioncurricularresultadosesperados-titulo">Titulo</label><input type="text" id="gestioncurricularresultadosesperados-titulo" class="form-control" name="gestioncurricularresultadosesperados-titulo[]" aria-required="true"><div class="help-block"></div></div><div class="form-group field-gestioncurricularresultadosesperados-descripcion required"><label class="control-label" for="gestioncurricularresultadosesperados-descripcion">Descripcion</label><textarea id="gestioncurricularresultadosesperados-descripcion" class="form-control" name="gestioncurricularresultadosesperados-titulo[]" aria-required="true"></textarea><div class="help-block"></div></div>	<a href="javascript:void(0);" class="remove_button1" title="Eliminar"><img src="../web/images/borrar.png" height="30" width="30" /></a></div>'; //New input field html 
    
    $(addButton1).click(function(){ //Once add button is clicked
        
            $(wrapper1).append(fieldHTML1); // Add field html
        
    });
    $(wrapper1).on('click', '.remove_button1', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
    });
	
	
	addButton2 = $('.add_button2'); //Add button selector
    wrapper2 = $('.field_wrapper2'); //Input field wrapper
    // var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="../web/images/borrar.png" height="30" width="30" /></a></div>'; //New input field html 
    var fieldHTML2 = '<div><div class="form-group field-gestioncurricularproductosesperados-titulo required"><label class="control-label" for="gestioncurricularproductosesperados-titulo">Titulo</label><input type="text" id="gestioncurricularproductosesperados-titulo" class="form-control" name="gestioncurricularresultadosesperados-titulo[]" aria-required="true"><div class="help-block"></div></div><div class="form-group field-gestioncurricularproductosesperados-descripcion required"><label class="control-label" for="gestioncurricularproductosesperados-descripcion">Descripcion</label><textarea id="gestioncurricularproductosesperados-descripcion" class="form-control" name="gestioncurricularresultadosesperados-titulo[]" aria-required="true"></textarea><div class="help-block"></div></div>	<a href="javascript:void(0);" class="remove_button2" title="Eliminar"><img src="../web/images/borrar.png" height="30" width="30" /></a></div>'; //New input field html 
    
    $(addButton2).click(function(){ //Once add button is clicked
        
            $(wrapper2).append(fieldHTML2); // Add field html
        
    });
    $(wrapper2).on('click', '.remove_button2', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
    });
	
	
	
	
	
	
	
	
	
	