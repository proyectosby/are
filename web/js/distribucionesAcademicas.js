/**********
Versión: 001
Fecha: Fecha en formato (15-03-2018)
Desarrollador: Viviana Rodas
Descripción: js Distribuciones academicas
---------------------------------------
*/
$( document ).ready(function() {
    
	listarDistribuciones();
	
	
});

/**
 * Funcion de listar las distribucines academicas.
 * 
 * param Parámetro: No recibe parametros
 * return Tipo de retorno: Retorna la lista de distribuciones
 * author : Viviana Rodas
 * exception : No tiene excepciones.
 */



function listarDistribuciones(){
	//alert("entrooo");
	$.get( "index.php?r=distribuciones-academicas/listar&idMunicipio=1006", 
				function( data )
				{
					//alert(data);
					
				},
		"json");

}

