$( document ).ready(function() {

	/* cambia visibilidad de una div */
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

	/*$('#seleccionar_modulo').focusout(function() {
	    $('#lista_modulos').css("visibility","hidden");
	});*/
        
        $('#lista_modulos').mouseleave( function(){ 
            $(this).css("visibility","hidden"); 
        });

	/* fijar menu en parte superior de la ventana */
	function sticky_relocate() {
	    var window_top = $(window).scrollTop();
	    var div_top = $('#sticky-anchor').offset().top;
	    if (window_top > div_top) {
	        $('nav').addClass('sticky');
	    } else {
	        $('nav').removeClass('sticky');
	    }
	}

	$(window).scroll(function(){
		sticky_relocate()
	});
	    
});