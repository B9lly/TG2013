$(document).ready(function() {

	function visibility(element){
	    if( $(element).css('visibility') == 'hidden' )
	        $(element).css('visibility','visible');
	    else
	        $(element).css('visibility','hidden');
	};

	$('#mostrar_opc_sesion').click(function(){
	    visibility('#usr_opciones_sesion');
	});

	$('#mostrar_opc_sesion').focusout(function() {
	    $('#usr_opciones_sesion').css("visibility","hidden");
	});

	$('#seleccionar_modulo').click(function(){
	    visibility('#lista_modulos');
	});	

	$('#seleccionar_modulo').focusout(function() {
	    $('#lista_modulos').css("visibility","hidden");
	});

});