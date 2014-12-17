// JavaScript Document

$(function(){

	$('.expand-row').click(function(){
		id = $(this).attr('id');
		if($('#exp-'+id).is(':visible'))
		{
			$('#exp-'+id).hide();
			$(this).html('<i class="icon-plus"></i>');
		} else {
			
			$(this).html('<i class="icon-minus"></i>');
			$('#exp-'+id).show(); $('#exp-'+id+' .ve ').hide();
		}	
	})
	
		if($.cookie("sximo-sidebar") == '')
		{
			$("body").addClass("sidebar-narrow");	
		}
		if($.cookie("sximo-sidebar") =='sidebar-wide'){
			$("body").addClass("sidebar-wide");
		} else {
			$("body").addClass("sidebar-narrow");
		}
		$(window).resize(function() {
			if($("body").hasClass("sidebar-narrow") && $(window).width() < 768){
				var w = $("body");
				w.removeClass('sidebar-narrow');	
				w.addClass('sidebar-wide');
          	} 
         
        });   
		
		
      /*Return to top*/
      var offset = 220;
      var duration = 500;
      var button = $('<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>');
      button.appendTo("body");
      
      jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
      });
    
      jQuery('.back-to-top').click(function(event) {
          event.preventDefault();
          jQuery('html, body').animate({scrollTop: 0}, duration);
          return false;
      });

  $.fn.datetimepicker.dates['es'] = {
	        days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
	        daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
	        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
	        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
	        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
	        today: "Hoy"
	};

  	$('.switch').bootstrapSwitch();
	$('.date').datepicker({format:'yyyy-mm-dd',autoClose:true,startView:2})
	
	$('.datetime').datetimepicker({format: 'yyyy-mm-dd hh:ii:ss',startView:4}); 
	
	/* Tooltip */
	$('.tips').tooltip();
	$('.sidebar-toggle').click(function () {
		if($(window).width() > 963)
		{
			var w = $("body");
			var s = $("body").attr('class');
	
			active = (s =='sidebar-wide' ? 'sidebar-narrow' : 'sidebar-wide') 
			if(active == 'sidebar-wide')
			{
				w.removeClass();	
				w.addClass(active);
				$.cookie("sximo-sidebar",active, {expires: 365, path: '/'});
			} else {
				w.removeClass();	
				w.addClass(active);	
				$.cookie("sximo-sidebar",active, {expires: 365, path: '/'});
			}
		} else {
		
			var w = $("body");
			if( w.hasClass('collapsed'))
			{
				w.removeClass('collapsed');	
			} else {
				w.addClass('collapsed');		
			}
		}
	});

	
	$('.editor').summernote();	 
	$(".select2").select2({ width:"98%"});
	$("#municipio_id").on("select2-selecting", function(e) { 

                $region =  e.val;

                if($( "#localidad_id" ).length ){

	                var select = document.getElementById('localidad_id');
	                select.options.length = 0; // clear out existing items

	                $route = '../localidadesxid/'+ $region;

	                $.get( $route , function( data ) {
	                  $( "#localidad_id" ).html( data );
	     
	                });
            	}


	})


	$('#municipio').change(function() {

				$region =  $('#municipio').val();

                if($( "#localidad" ).length ){

	                var select = document.getElementById('localidad');
	                select.options.length = 0; // clear out existing items


	                $url = $('#localidades_url').attr('data-url')+'/' + $region;

	                //$route = 'localidadesxid/'+ $region;

	                $.get( $url , function( data ) {
	                  $( "#localidad" ).html( data );
	     
	                });
            	}


	});


	$(".select-liquid").select2({
		minimumResultsForSearch: "-1",
		
		
	});
	
	$('.navigation li.disabled a, .navbar-nav > .disabled > a').click(function(e){
		e.preventDefault();
	});
	$('.sidebar-wide li:not(.disabled) .expand, .sidebar-narrow .navigation > li ul .expand').collapsible({
		defaultOpen: 'second-level,third-level',
		cssOpen: 'level-opened',
		cssClose: 'level-closed',
		speed: 150
	});	

	$('.panel-trigger').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
	});

	$('.dropdown, .btn-group').on('show.bs.dropdown', function(e){
		$(this).find('.dropdown-menu').first().stop(true, true).fadeIn(100);
	});
	$('.dropdown, .btn-group').on('hide.bs.dropdown', function(e){
		$(this).find('.dropdown-menu').first().stop(true, true).fadeOut(100);
	});
	$('.popup').click(function (e) {
		e.stopPropagation();
	});


     window.prettyPrint && prettyPrint();
})



	
function SximoConfirmDelete( url )
{
	if(confirm('Are u sure deleting this record ? '))
	{
		window.location.href = url;	
	}
	return false;
}


function SximoDelete(  )
{
	
	var total = $('input[class="ids"]:checkbox:checked').length;
	if(total <=0)
	{	
	} else {
		if(confirm('are u sure removing selected rows ?'))
		{
				$('#SximoTable').submit();// do the rest here	
		}
	}
	
}	

