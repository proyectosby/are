$(document).ready(function(){
   
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div>'+wrapper.html()+'<a href="javascript:void(0);" class="remove_button" title="Eliminar"><img src="../web/images/borrar.png" height="30" width="30" /></a></div>'; //New input field html 
    
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
    
    var fieldHTML1 = '<div>'+wrapper1.html()+'<a href="javascript:void(0);" class="remove_button1" title="Eliminar"><img src="../web/images/borrar.png" height="30" width="30" /></a></div>'; //New input field html 
    
    $(addButton1).click(function(){ //Once add button is clicked
        
            $(wrapper1).append(fieldHTML1); // Add field html
        
    });
    $(wrapper1).on('click', '.remove_button1', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
    });
	
	
	addButton2 = $('.add_button2'); //Add button selector
    wrapper2 = $('.field_wrapper2'); //Input field wrapper
    
     var fieldHTML2 = '<div>'+wrapper2.html()+'<a href="javascript:void(0);" class="remove_button2" title="Eliminar"><img src="../web/images/borrar.png" height="30" width="30" /></a></div>'; //New input field html 
    
    $(addButton2).click(function(){ //Once add button is clicked
        
            $(wrapper2).append(fieldHTML2); // Add field html
        
    });
    $(wrapper2).on('click', '.remove_button2', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
    });
	
	
	addButton3 = $('.add_button3'); //Add button selector
    wrapper3 = $('.field_wrapper3'); //Input field wrapper
    
    var fieldHTML3 = '<div>'+wrapper3.html()+'<a href="javascript:void(0);" class="remove_button3" title="Eliminar"><img src="../web/images/borrar.png" height="30" width="30" /></a></div>'; //New input field html 
    
    $(addButton3).click(function(){ //Once add button is clicked
            $(wrapper3).append(fieldHTML3); // Add field html
        
    });
    $(wrapper3).on('click', '.remove_button3', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
    });
	
	
	addButton4 = $('.add_button4'); //Add button selector
    wrapper4 = $('.field_wrapper4'); //Input field wrapper
    
    var fieldHTML4 = '<div>'+wrapper4.html()+'<a href="javascript:void(0);" class="remove_button4" title="Eliminar"><img src="../web/images/borrar.png" height="30" width="30" /></a></div>'; //New input field html 
    
    $(addButton4).click(function(){ //Once add button is clicked
            $(wrapper4).append(fieldHTML4); // Add field html
        
    });
    $(wrapper4).on('click', '.remove_button4', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
    });
	
	addButton5 = $('.add_button5'); //Add button selector
    wrapper5 = $('.field_wrapper5'); //Input field wrapper
    
    var fieldHTML5 = '<div>'+wrapper5.html()+'<a href="javascript:void(0);" class="remove_button5" title="Eliminar"><img src="../web/images/borrar.png" height="30" width="30" /></a></div>'; //New input field html 
    
    $(addButton5).click(function(){ //Once add button is clicked
            $(wrapper5).append(fieldHTML5); // Add field html
        
    });
    $(wrapper5).on('click', '.remove_button5', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
    });
	
	
	
	
	