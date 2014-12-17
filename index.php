<?php

	header('Content-Type: text/html , charset : utf-8');
	include('connect.php');
	?>
<!DOCTYPE html>
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Tienda Natural Servicios · Instalacion</title>
		<meta name="description" content="Tienda Natural Servicios">
		<meta name="keywords" content="Tienda Natural Servicios, E-commerce">
		<meta name="robots" content="INDEX,FOLLOW">
		<link rel="icon" href="http://www.gnfshop.com.ar/skin/frontend/default/default/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="http://www.gnfshop.com.ar/skin/frontend/default/default/favicon.ico" type="image/x-icon">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--[if lt IE 7]>
		<script type="text/javascript">
			//<![CDATA[
				var BLANK_URL = 'http://www.gnfshop.com.ar/js/blank.html';
				var BLANK_IMG = 'http://www.gnfshop.com.ar/js/spacer.gif';
			//]]>
		</script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="files/custom-col-system.css" media="all">
		<link rel="stylesheet" type="text/css" href="files/bootstrap.css" media="all">
		<link rel="stylesheet" type="text/css" href="files/bootstrap-responsive.css" media="all">
		<link rel="stylesheet" type="text/css" href="files/superfish.css" media="all">
		<link rel="stylesheet" type="text/css" href="files/jquery.fancybox.css" media="all">
		<link rel="stylesheet" type="text/css" href="files/styles.css" media="all">
		<link rel="stylesheet" type="text/css" href="files/print.css" media="print">
		<script type="text/javascript" src="files/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" async="" src="files/ga.js"></script>
		<script async="" src="files/gtm.js"></script>
		<script type="text/javascript" src="files/prototype.js"></script>
		<script type="text/javascript" src="files/validation.js"></script>
		<script type="text/javascript" src="files/builder.js"></script>
		<script type="text/javascript" src="files/effects.js"></script>
		<script type="text/javascript" src="files/dragdrop.js"></script>
		<script type="text/javascript" src="files/controls.js"></script>
		<script type="text/javascript" src="files/slider.js"></script>
		<script type="text/javascript" src="files/translate.js"></script>
		<script type="text/javascript" src="files/ccard.js"></script>
		<script type="text/javascript" src="files/js.js"></script>
		<script type="text/javascript" src="files/form.js"></script>
		<script type="text/javascript" src="files/cookies.js"></script>
		<script type="text/javascript" src="files/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="files/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="files/bootstrap.min.js"></script>
		<script type="text/javascript" src="files/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script type="text/javascript" src="files/hoverIntent.js"></script>
		<script type="text/javascript" src="files/superfish.js"></script>
		<script type="text/javascript" src="files/jquery.mousewheel-3.0.6.pack.js"></script>
		<script type="text/javascript" src="files/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="files/main.js"></script>
		<script type="text/javascript" src="files/jquery.cycle2.min.js"></script>
		<script type="text/javascript" src="Scripts/swfobject_modified.js"></script>
		<!--[if lt IE 9]>
		<script type="text/javascript" src="http://www.gnfshop.com.ar/skin/frontend/base/default/js/html5shim"></script>
		<![endif]-->
		<script type="text/javascript">
			//<![CDATA[
			Mage.Cookies.path     = '/';
			Mage.Cookies.domain   = '.www.gnfshop.com.ar';
			//]]>
		</script>
		<script type="text/javascript">
			//<![CDATA[
			optionalZipCountries = ["AR"];
			//]]>
		</script>
		<script type="text/javascript">//<![CDATA[
			var Translator = new Translate({"HTML tags are not allowed":"No est\u00e1n permitidas las etiquetas HTML","Please select an option.":"Seleccione una opci\u00f3n.","This is a required field.":"Este es un campo obligatorio.","Please enter a valid number in this field.":"Ingrese un n\u00famero v\u00e1lido en este campo.","The value is not within the specified range.":"El valor no est\u00e1 dentro del rango permitido.","Please use numbers only in this field. Please avoid spaces or other characters such as dots or commas.":"En este campo s\u00f3lo se pueden escribir n\u00fameros. Evite los espacios en blanco u otros caracteres, como los puntos o las comas, por ejemplo.","Please use letters only (a-z or A-Z) in this field.":"Por favor, use s\u00f3lo letras (a-z o A-Z) en este campo.","Please use only letters (a-z), numbers (0-9) or underscore(_) in this field, first character should be a letter.":"Utilice s\u00f3lo letras (a-z), n\u00fameros (0-9) o guiones bajos (_) en este campo. El primer caracter debe ser una letra.","Please use only letters (a-z or A-Z) or numbers (0-9) only in this field. No spaces or other characters are allowed.":"Por favor, utilice solo letras (a-z o A-Z) o n\u00fameros (0-9) solo en este campo. No est\u00e1n permitidos los espacios u otros caracteres.","Please use only letters (a-z or A-Z) or numbers (0-9) or spaces and # only in this field.":"Por favor, utilice solo letras (a-z o A-Z) o n\u00fameros (0-9) o espacios y # solo en este campo.","Please enter a valid phone number. For example (123) 456-7890 or 123-456-7890.":"Ingrese un n\u00famero de tel\u00e9fono v\u00e1lido. Por ejemplo: (123) 456-7890 o 123-456-7890.","Please enter a valid fax number. For example (123) 456-7890 or 123-456-7890.":"Por favor, introduzca un n\u00famero de fax v\u00e1lido. Por ejemplo (123) 456-7890 o 123-456-7890.","Please enter a valid date.":"Ingrese una fecha v\u00e1lida.","Please enter a valid email address. For example johndoe@domain.com.":"Ingrese una direcci\u00f3n de correo electr\u00f3nico v\u00e1lida. Por ejemplo: juanperez@dominio.com.","Please use only visible characters and spaces.":"Por favor, utilice solo caracteres visibles y espacios.","Please enter 6 or more characters. Leading or trailing spaces will be ignored.":"Introduzca 6 o m\u00e1s caracteres. Se ignorar\u00e1n los espacios antes o despu\u00e9s.","Please enter 7 or more characters. Password should contain both numeric and alphabetic characters.":"Por favor, introduzca 7 o m\u00e1s caracteres. La contrase\u00f1a tiene que contener tanto caracteres num\u00e9ricos como alfab\u00e9ticos.","Please make sure your passwords match.":"Aseg\u00farese de que sus contrase\u00f1as coincidan.","Please enter a valid URL. Protocol is required (http:\/\/, https:\/\/ or ftp:\/\/)":"Por favor, introduzca una URL v\u00e1lida. Es necesario el protocolo (http:\/\/, https:\/\/ or ftp:\/\/)","Please enter a valid URL. For example http:\/\/www.example.com or www.example.com":"Por favor, introduzca una URL v\u00e1lida. Por ejemplo, http:\/\/www.example.com o www.example.com","Please enter a valid URL Key. For example \"example-page\", \"example-page.html\" or \"anotherlevel\/example-page\".":"Por favor, introduzca una Clave de URL v\u00e1lida. Por ejemplo  \"pagina-ejemplo\", \"pagina-ejemplo.html\" o \"otronivel\/pagina-ejemplo\"","Please enter a valid XML-identifier. For example something_1, block5, id-4.":"Por favor, introduzca un identificador-XML v\u00e1lido. Por ejemplo, algo_1, bloque5, id-4.","Please enter a valid social security number. For example 123-45-6789.":"Ingrese un n\u00famero de seguro social v\u00e1lido. Por ejemplo: 123-45-6789.","Please enter a valid zip code. For example 90602 or 90602-1234.":"Ingrese un c\u00f3digo postal v\u00e1lido. Por ejemplo: 90602 o 90602-1234.","Please enter a valid zip code.":"Ingrese un c\u00f3digo postal v\u00e1lido.","Please use this date format: dd\/mm\/yyyy. For example 17\/03\/2006 for the 17th of March, 2006.":"Utilice este formato de fecha: dd\/mm\/aaaa. Por ejemplo, 17\/03\/2006 para el 17 de marzo de 2006.","Please enter a valid $ amount. For example $100.00.":"Ingrese un monto v\u00e1lido en $. Por ejemplo: $100.00.","Please select one of the above options.":"Por favor, complet&aacute; los campos obilgatorios.","Please select one of the options.":"Seleccione una de las opciones.","Please select State\/Province.":"Por favor, selecciona Municipio.","Please enter a number greater than 0 in this field.":"Ingrese un n\u00famero mayor que 0 en este campo.","Please enter a number 0 or greater in this field.":"Por favor, introduzca un n\u00famero 0 o superior en este campo.","Please enter a valid credit card number.":"Ingrese un n\u00famero de tarjeta de cr\u00e9dito v\u00e1lido.","Credit card number does not match credit card type.":"El n\u00famero de tarjeta de cr\u00e9dito no se ajusta al tipo de tarjeta de cr\u00e9dito.","Card type does not match credit card number.":"El tipo de tarjeta no se ajusta al n\u00famero de tarjeta de cr\u00e9dito.","Incorrect credit card expiration date.":"Fecha de caducidad de la tarjeta de cr\u00e9dito incorrecta","Please enter a valid credit card verification number.":"Introduzca un n\u00famero correcto de verificaci\u00f3n de tarjeta de cr\u00e9dito.","Please use only letters (a-z or A-Z), numbers (0-9) or underscore(_) in this field, first character should be a letter.":"Por favor, utilice solamente letras (a-z o A-Z), n\u00fameros (0-9) o guion bajo (_) en este campo, el primer car\u00e1cter debe ser una letra.","Please input a valid CSS-length. For example 100px or 77pt or 20em or .5ex or 50%.":"Por favor, introduzca una longitud v\u00e1lida de CSS. Por ejemplo, 100px o 77pt o 20em o .5ex o 50%","Text length does not satisfy specified text range.":"La longitud del texto no satisface el rango de texto se\u00f1alado","Please enter a number lower than 100.":"Por favor, introduzca un n\u00famero menor que 100.","Please select a file":"Por favor seleccione un archivo","Please enter issue number or start date for switch\/solo card type.":"Por favor, introduzca un n\u00famero de emisi\u00f3n o fecha de inicio para el tipo de tarjeta switch\/solo.","Please wait, loading...":"Espera, por favor. Cargando....","This date is a required value.":"La fecha es un valor obligatorio.","Please enter a valid day (1-%d).":"Por favor, introduzca un d\u00eda v\u00e1lido (1-%d).","Please enter a valid month (1-12).":"Por favor, introduzca un mes v\u00e1lido (1-12).","Please enter a valid year (1900-%d).":"Por favor, introduzca un a\u00f1o v\u00e1lido (1900-%d).","Please enter a valid full date":"Por favor, introduzca una fecha v\u00e1lida completa","Please enter a valid date between %s and %s":"Por favor, introduzca una fecha v\u00e1lida entre %s y %s","Please enter a valid date equal to or greater than %s":"Por favor, introduzca una fecha v\u00e1lida igual o superior a %s","Please enter a valid date less than or equal to %s":"Por favor, introduzca una fecha v\u00e1lida menor o igual a %s","Complete":"Completo","Add Products":"A\u00f1adir productos","Please choose to register or to checkout as a guest":"Por favor, seleccione la opci\u00f3n de registrarse o la de tramitar el pedido como invitado","Your order cannot be completed at this time as there is no shipping methods available for it. Please make necessary changes in your shipping address.":"Su pedido no puede completarse en este momento ya que no hay m\u00e9todos de env\u00edo disponibles. Realice los cambios necesarios en su direcci\u00f3n de env\u00edo.","Please specify payment method.":"Especifique el Forma de Pago.","Your order cannot be completed at this time as there is no payment methods available for it.":"Su pedido no se ha podido completar porque no hay ning\u00fan Forma de Pago disponible."});
			//]]>
		</script>
		<style type="text/css" id="inlinestyle">a.tt:hover span.top {background: url(chrome-extension://ejpogldabjhjhglnfojmnekmcjonllia/images/bubble.gif) no-repeat top;padding: 30px 8px 0;display: block;}
			a.tt:hover span.middle {background: url(chrome-extension://ejpogldabjhjhglnfojmnekmcjonllia/images/bubble_filler.gif) repeat bottom;padding: 0 8px;display: block;}
			a.tt:hover span.bottom {background: url(chrome-extension://ejpogldabjhjhglnfojmnekmcjonllia/images/bubble.gif) no-repeat bottom;color: #548912;padding: 3px 8px 10px;display: block;}
		</style>
	</head>
	<body>
		<script>dataLayer=[];</script>
		<!-- Google Tag Manager -->
		<noscript>&lt;iframe src="//www.googletagmanager.com/ns.html?id=GTM-3NL8"
			height="0" width="0" style="display:none;visibility:hidden"&gt;&lt;/iframe&gt;
		</noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-3NL8');
		</script>
		<!-- End Google Tag Manager -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-41243988-1']);
			_gaq.push(['_trackPageview']);
			
			(function() {
			  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();			
		</script>
		<div id="site">
			<noscript>
				&lt;div class="global-site-notice noscript"&gt;
				&lt;div class="notice-inner"&gt;
				&lt;p&gt;
				&lt;strong&gt;Puede que JavaScript est&eacute; deshabilitado en tu navegador.&lt;/strong&gt;&lt;br /&gt;
				Tiene que activar el JavaScript del navegador para utilizar las funciones de este sitio web.                &lt;/p&gt;
				&lt;/div&gt;
				&lt;/div&gt;
			</noscript>
			<div id="franja_top">
				<div class="container clearfix">
					<p>&nbsp;</p>
					<ul id="top_links">
						<li>&nbsp;</li>
					</ul>
				</div>
			</div>
			<div id="header">
				<div class="row">
					<div class="col-12">
						<div class="clearfix">
							<h1 id="logo" class="pull-left"><a href="http://www.gnfshop.com.ar/" title="Tienda Natural Servicios"><img src="files/logo.png" alt="Tienda Natural Servicios"></a></h1>
							<img style="padding-left: 20px; padding-top: 10px;display:none;" src="files/banner_superior_gnf.png" alt="Banner Superior">            
						</div>
						<!--<div class="quick-access clearfix"></div>-->
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-12">
					<!--â€“ CONTACT FORM â€“-->
					<div id="messages_product_view"></div>
					<?php
						$STH = $pdo_obj -> prepare( "select * from banners WHERE activo = 2 AND posicion_banner = 1" );
						
						$STH -> execute();
						
						$banner  = $STH -> fetch(PDO::FETCH_ASSOC);
						
						
						if( $banner['tipo'] == 1   ){
						$banner_file = $banner['codigo'];
						?>
					<img style="padding-left: 20px; padding-top: 10px;margin-bottom:20px;" width="100%" height="auto"  src="adm/public/media/files/<?= $banner_file ?>" alt="Banner Superior">            
					<?
						}elseif($banner['tipo'] == 2  )  {
							 $banner_file = 'adm/public/media/files/'.$banner['codigo'];
							?>
					<img id="imageID" src="files/bannerJPG_01.jpg" alt="" style="display: none;" width="100%" height="auto" />
					<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="auto">
						<param name="movie" value="<?= $banner_file ?>" />
						<param name="quality" value="high" />
						<param name="wmode" value="opaque" />
						<param name="swfversion" value="6.0.65.0" />
						<!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you donâ€™t want users to see the prompt. -->
						<param name="expressinstall" value="Scripts/expressInstall.swf" />
						<!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
						<!--[if !IE]>-->
						<object type="application/x-shockwave-flash" data="<?= $banner_file ?>" width="100%" height="auto">
							<!--<![endif]-->
							<param name="quality" value="high" />
							<param name="wmode" value="opaque" />
							<param name="swfversion" value="6.0.65.0" />
							<param name="expressinstall" value="Scripts/expressInstall.swf" />
							<!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
							<div>
								<h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
								<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
							</div>
							<!--[if !IE]>-->
						</object>
						<!--<![endif]-->
					</object>
					<script type="text/javascript">
						<!--
							swfobject.registerObject("FlashID");
							//-->
					</script>
					<?
						}  
						
						?>   
					<div class="page-title">
						<h1>Instalaciones Internas</h1>
					</div>
					<p style="font-weight:bolder;"> Completá el formulario con tus datos personales, sin ningún compromiso, y nos comunicaremos a la brevedad para que empieces a disfrutar del gas natural en tu hogar.</p>
					<form action="procesador.php" id="contactForm" method="post">
						<div class="category-title">
							<h2 class="legend">Datos Personales <span style="font-size:12px;margin-left:10px;">* Campos Requeridos</span></h2>
						</div>
						
						<div class="row">
							<div class="col-4">
								<label for="name" class="required"><em>*</em>Nombre</label>
								<input name="name" id="name" title="Nombre" value="" class="input-text required-entry" type="text">
							</div>
							<div class="col-4">
								<label for="sname" class="required">Segundo Nombre</label>
								<input name="sname" id="nsame" title="Nombre" value="" class="input-text" type="text">
							</div>
							<div class="col-4">
								<label for="lastname" class="required"><em>*</em>Apellido</label>
								<input name="lastname" id="lastname" title="Apellido" value="" class="input-text required-entry" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-4">
								<label for="gender" class="required"><em>*</em>Sexo</label>
								<select id="gender" name="gender" title="G&eacute;nero" class="validate-select">
									<option value=""></option>
									<option value="1">Masculino</option>
									<option value="2">Femenino</option>
								</select>
							</div>
							<div class="col-4">
								<label class="">Fecha de nacimiento</label>
								<div class="col-4">
									<select id="day" name="day" title="Day" class="input-text input-block-level">
										<option>D&iacute;a</option>
										<?php
											for ($i = 1; $i <= 31; $i++) {
												($i < 10) ? $day=0 . $i : $day=$i;
												echo '<option value="'. $day .'">'. $day .'</option>';
											}
											?>
									</select>
								</div>
								<div class="col-4">
									<select id="month" name="month" title="Month" class="input-text input-block-level">
										<option>Mes</option>
										<option value="01">Enero</option>
										<option value="02">Febrero</option>
										<option value="03">Marzo</option>
										<option value="04">Abril</option>
										<option value="05">Mayo</option>
										<option value="06">Junio</option>
										<option value="07">Julio</option>
										<option value="08">Agosto</option>
										<option value="09">Septiembre</option>
										<option value="10">Octubre</option>
										<option value="11">Noviembre</option>
										<option value="12">Diciembre</option>
									</select>
								</div>
								<div class="col-4">
									<select id="year" name="year" title="Year" class="input-text" autocomplete="off">
										<option>A&ntilde;o</option>
										<?php
											for ($i = 1934; $i <= 2014; $i++) {
												echo '<option value="'. $i .'">'. $i .'</option>';
											}
											?>
									</select>
									<input type="hidden" id="" name="">							
									<div class="validation-advice" style="display: none;"></div>
								</div>
							</div>
							<div class="col-4">
								<label for="tipo_documento" class="required"><em></em>Tipo Documento</label>
								<select id="tipo_documento" name="tipo_documento" title="G&eacute;nero" class="">
									<option value=""></option>
									<option value="1">DNI</option>
									<option value="2">CI</option>
									<option value="3">Libreta Civica</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-4">
								<label for="nrodoc" class="required"><em>*</em>Documento Nro</label>
								<input name="nrodoc" id="nrodoc" title="Apellido" value="" class="input-text" type="text">
							</div>
							<div class="col-4">
								<label for="telephone" class="required"><em>*</em>Tel&eacute;fono</label>
								<input name="telephone" id="telephone" title="Tel&eacute;fono" value="" class="required-entry input-text" type="text">
							</div>
							<div class="col-4">
								<label for="email" class="required"><em>*</em>Correo electr&oacute;nico</label>
								<input name="email" id="email" title="Correo electr&oacute;nico" value="" class="input-text required-entry validate-email" type="text">
							</div>
						</div>
						
						<br />
						
						<div class="category-title">
							<h2 class="legend">Direcci&oacute;n donde desea instalar el gas natural<span style="font-size:12px;margin-left:10px;">* Campos Requeridos</span></h2>
						</div>
						<select id="country" name="country" style="display:none">
							<option value="AR" selected="selected">Argentina</option>
						</select>
						
						<div class="row">
							<div class="col-4">
								<label for="region_id" class="required"><em>*</em>Municipio</label>
								<select id="region_id" name="region_id" title="Municipio" class="validate-select required-entry" onchange="document.getElementById(&#39;region&#39;).value = this.options[this.selectedIndex].text;">
									<?php
										$i = 0;
										foreach ($pdo_obj->query('SELECT * FROM municipios') as $row) {
											$i++;
											if($i == 1){
												$municipio_id = $row['id'] ;
											}
										?>
									<option value="<?= $row['id'] ?>"><?php echo $row['nombre']; ?></option>
									<?
										}
										
										?>
									<input type="text" id="region" name="region" title="Municipio" class="input-text required-entry" style="display: none;">
								</select>
							</div>
							<div class="col-4">
								<label for="city_id" class="required"><em>*</em>Localidad</label>
								<select id="city_id" name="city_id" title="Localidad" class="validate-select" onchange="document.getElementById(&#39;city&#39;).value = this.options[this.selectedIndex].text;">
									<?php
										foreach ($pdo_obj->query("SELECT * FROM localidades WHERE municipio_id = $municipio_id ") as $row) {
										 ?>
									<option value="<?= $row['id'] ?>"><?php echo $row['nombre']; ?></option>
									<?
										}
										
										?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-3">
								<label for="calle" class="required"><em>*</em>Calle</label>
								<input name="calle" id="calle" title="Apellido" value="" class="input-text required-entry" type="text">
							</div>
							<div class="col-3">
								<label for="nrocalle" class="required"><em>*</em>Nro</label>
								<input name="nrocalle" id="nrocalle" title="Apellido" value="" class="input-text validate-number required-entry" type="text">
							</div>
							<div class="col-3">
								<label for="complemento" class="required">Piso, Dpto., Frente, otras)</label>
								<input name="complemento" id="complemento" title="Apellido" value="" class="input-text" type="text">
							</div>
							<div class="col-3">
								<label for="ecalles" class="required"><em>*</em>Entre Calles</label>
								<input name="ecalles" id="ecalles" title="Apellido" value="" class="input-text required-entry" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-3">
								<label for="posee_gas" class="required"><em style="color:#000;">*</em> &iquest;Posee red de gas natural en la vereda de su domicilio?</label>
								<select id="posee_gas" name="posee_gas">
									<option value="1">Si</option>
									<option value="2">No</option>
									<option value="3" selected>No Sabe</option>
								</select>
							</div>
						</div>
						
						<br />
						
						<div class="category-title">
							<h2 class="legend">Instalaci&oacute;n Interna</h2>
						</div>
						<h5>Cantidad de aparatos que desea conectar</h5>
						
						<div class="row">
							<div class="col-4">
								<label for="coccion" class="required">Cocci&oacute;n</label>
								<input name="coccion" id="coccion" title="" value="" class="input-text validate-number" type="text">
							</div>
							<div class="col-4">
								<label for="acaliente" class="required">Agua Caliente</label>
								<input name="acaliente" id="acaliente" title="" value="" class="input-text validate-number" type="text">
							</div>
							<div class="col-4">
								<label for="calefaccion" class="required">Calefacci&oacute;n</label>
								<input name="calefaccion" id="calefaccion" title="" value="" class="input-text validate-number" type="text">
							</div>
						</div>
						
						<br />
						
						<div class="category-title">
							<h2 class="legend">Información Adicional</h2>
						</div>
						
						<div class="row">
							<div class="col-12">
								<label for="consulta" class="required">Dejanos tu consulta</label>
								<textarea name="consulta" id="consulta" cols="30" rows="4"></textarea>
								<label for="posee_gas" class="required"></label>
								<checkbox id="posee_gas" name="posee_gas">
								<input class="validate-one-required"  type="checkbox" name="autorizo" value="1"> <em> *</em> Autorizo el uso de mis datos para que me contacten y acepto los <a href="http://www.gnfshop.com.ar/terminos-y-condiciones"> T&eacute;rminos y Condiciones</a><br>
								Productos y Servicios comercializados por Natural Servicios, S.A 
							</div>
						</div>
						
						<br />
						
						<div class="buttons-set">
							<input type="text" name="hideit" id="hideit" value="" style="display:none !important;">
							<button type="submit" title="Enviar" class="button"><span><span>Enviar</span></span></button>
						</div>
						
						<br />
					</form>
					<script type="text/javascript">
						//<![CDATA[
							//var customer_dob = new Varien.DOB('.customer-dob', 'true', '');
							//new RegionUpdater('country', 'region', 'region_id', {"config":{"show_all_regions":true,"regions_required":["AR"]},"AR":{"3":{"code":"campana","name":"CAMPANA"},"31":{"code":"capital_federal","name":"CAPITAL FEDERAL"},"4":{"code":"capitan_sarmiento","name":"CAPITAN SARMIENTO"},"2":{"code":"carmen_de_areco","name":"CARMEN DE ARECO"},"7":{"code":"escobar","name":"ESCOBAR"},"5":{"code":"exaltacion_de_la_cruz","name":"EXALTACION DE LA CRUZ"},"8":{"code":"general_las_heras","name":"GENERAL LAS HERAS"},"9":{"code":"general_rodriguez","name":"GENERAL RODRIGUEZ"},"10":{"code":"hurlingham","name":"HURLINGHAM"},"11":{"code":"ituzaingo","name":"ITUZAINGO"},"12":{"code":"jose_c_paz","name":"JOSE C. PAZ"},"13":{"code":"la_matanza","name":"LA MATANZA"},"14":{"code":"lujan","name":"LUJAN"},"15":{"code":"malvinas_argentinas","name":"MALVINAS ARGENTINAS"},"19":{"code":"marcos_paz","name":"MARCOS PAZ"},"6":{"code":"mercedes","name":"MERCEDES"},"16":{"code":"merlo","name":"MERLO"},"20":{"code":"moreno","name":"MORENO"},"18":{"code":"moron","name":"MORON"},"21":{"code":"pilar","name":"PILAR"},"22":{"code":"s_antonio_de_areco","name":"S ANTONIO DE ARECO"},"24":{"code":"s_andres_de_giles","name":"S. ANDRES DE GILES"},"23":{"code":"san_fernando","name":"SAN FERNANDO"},"25":{"code":"san_isidro","name":"SAN ISIDRO"},"26":{"code":"san_martin","name":"SAN MARTIN"},"17":{"code":"san_miguel","name":"SAN MIGUEL"},"28":{"code":"tigre","name":"TIGRE"},"27":{"code":"tres_de_febrero","name":"TRES DE FEBRERO"},"29":{"code":"vicente_lopez","name":"VICENTE LOPEZ"},"30":{"code":"zarate","name":"ZARATE"}}}, undefined, 'zip');
							//new CityUpdater('region_id', 'city', 'city_id', {"27":{"11 DE SETIEMBRE":{"code":"11 DE SETIEMBRE","name":"11 DE SETIEMBRE"},"CASEROS":{"code":"CASEROS","name":"CASEROS"},"CHURRUCA":{"code":"CHURRUCA","name":"CHURRUCA"},"CIUDADELA":{"code":"CIUDADELA","name":"CIUDADELA"},"EL LIBERTADOR":{"code":"EL LIBERTADOR","name":"EL LIBERTADOR"},"JOSE INGENIEROS":{"code":"JOSE INGENIEROS","name":"JOSE INGENIEROS"},"LOMA HERMOSA":{"code":"LOMA HERMOSA","name":"LOMA HERMOSA"},"LOMAS DEL PALOMAR":{"code":"LOMAS DEL PALOMAR","name":"LOMAS DEL PALOMAR"},"MARTIN CORONADO":{"code":"MARTIN CORONADO","name":"MARTIN CORONADO"},"PABLO PODESTA":{"code":"PABLO PODESTA","name":"PABLO PODESTA"},"REMEDIOS DE ESCALADA":{"code":"REMEDIOS DE ESCALADA","name":"REMEDIOS DE ESCALADA"},"SAENZ PE\u00d1A":{"code":"SAENZ PE\u00d1A","name":"SAENZ PE\u00d1A"},"SANTOS LUGARES":{"code":"SANTOS LUGARES","name":"SANTOS LUGARES"},"VILLA BOSCH":{"code":"VILLA BOSCH","name":"VILLA BOSCH"},"VILLA RAFFO":{"code":"VILLA RAFFO","name":"VILLA RAFFO"}},"13":{"20 DE JUNIO":{"code":"20 DE JUNIO","name":"20 DE JUNIO"},"ALDO BONZI":{"code":"ALDO BONZI","name":"ALDO BONZI"},"CIUDAD EVITA":{"code":"CIUDAD EVITA","name":"CIUDAD EVITA"},"GONZALEZ CATAN":{"code":"GONZALEZ CATAN","name":"GONZALEZ CATAN"},"GREGORIO DE LAFERRERE":{"code":"GREGORIO DE LAFERRERE","name":"GREGORIO DE LAFERRERE"},"ISIDRO CASANOVA":{"code":"ISIDRO CASANOVA","name":"ISIDRO CASANOVA"},"LA TABLADA":{"code":"LA TABLADA","name":"LA TABLADA"},"LOMAS DEL MIRADOR":{"code":"LOMAS DEL MIRADOR","name":"LOMAS DEL MIRADOR"},"RAFAEL CASTILLO":{"code":"RAFAEL CASTILLO","name":"RAFAEL CASTILLO"},"RAMOS MEJIA":{"code":"RAMOS MEJIA","name":"RAMOS MEJIA"},"SAN JUSTO":{"code":"SAN JUSTO","name":"SAN JUSTO"},"TAPIALES":{"code":"TAPIALES","name":"TAPIALES"},"VILLA CELINA":{"code":"VILLA CELINA","name":"VILLA CELINA"},"VILLA LUZURIAGA":{"code":"VILLA LUZURIAGA","name":"VILLA LUZURIAGA"},"VILLA MADERO":{"code":"VILLA MADERO","name":"VILLA MADERO"},"VIRREY DEL PINO":{"code":"VIRREY DEL PINO","name":"VIRREY DEL PINO"}},"25":{"ACASSUSO":{"code":"ACASSUSO","name":"ACASSUSO"},"BECCAR":{"code":"BECCAR","name":"BECCAR"},"BOULOGNE":{"code":"BOULOGNE","name":"BOULOGNE"},"MARTINEZ":{"code":"MARTINEZ","name":"MARTINEZ"},"SAN ISIDRO":{"code":"SAN ISIDRO","name":"SAN ISIDRO"},"VILLA ADELINA":{"code":"VILLA ADELINA","name":"VILLA ADELINA"}},"31":{"Agronomia":{"code":"Agronomia","name":"Agronomia"},"Almagro":{"code":"Almagro","name":"Almagro"},"Balvanera":{"code":"Balvanera","name":"Balvanera"},"Barracas":{"code":"Barracas","name":"Barracas"},"Belgrano":{"code":"Belgrano","name":"Belgrano"},"Boedo":{"code":"Boedo","name":"Boedo"},"Caballito":{"code":"Caballito","name":"Caballito"},"Chacarita":{"code":"Chacarita","name":"Chacarita"},"Coghlan":{"code":"Coghlan","name":"Coghlan"},"Colegiales":{"code":"Colegiales","name":"Colegiales"},"Constituci\u00f3n":{"code":"Constituci\u00f3n","name":"Constituci\u00f3n"},"Flores":{"code":"Flores","name":"Flores"},"Floresta":{"code":"Floresta","name":"Floresta"},"La Boca":{"code":"La Boca","name":"La Boca"},"La Paternal":{"code":"La Paternal","name":"La Paternal"},"Liniers":{"code":"Liniers","name":"Liniers"},"Mataderos":{"code":"Mataderos","name":"Mataderos"},"Monte Castro":{"code":"Monte Castro","name":"Monte Castro"},"Montserrat":{"code":"Montserrat","name":"Montserrat"},"Nueva Pompeya":{"code":"Nueva Pompeya","name":"Nueva Pompeya"},"Nu\u00f1ez":{"code":"Nu\u00f1ez","name":"Nu\u00f1ez"},"Palermo":{"code":"Palermo","name":"Palermo"},"Parque Avellaneda":{"code":"Parque Avellaneda","name":"Parque Avellaneda"},"Parque Chacabuco":{"code":"Parque Chacabuco","name":"Parque Chacabuco"},"Parque Chas":{"code":"Parque Chas","name":"Parque Chas"},"Parque Patricios":{"code":"Parque Patricios","name":"Parque Patricios"},"Puerto Madero":{"code":"Puerto Madero","name":"Puerto Madero"},"Recoleta":{"code":"Recoleta","name":"Recoleta"},"Retiro":{"code":"Retiro","name":"Retiro"},"Saavedra":{"code":"Saavedra","name":"Saavedra"},"San Crist\u00f3bal":{"code":"San Crist\u00f3bal","name":"San Crist\u00f3bal"},"San Nicol\u00e1s":{"code":"San Nicol\u00e1s","name":"San Nicol\u00e1s"},"San Telmo":{"code":"San Telmo","name":"San Telmo"},"V\u00e9lez Sarsfield":{"code":"V\u00e9lez Sarsfield","name":"V\u00e9lez Sarsfield"},"Versalles":{"code":"Versalles","name":"Versalles"},"Villa Crespo":{"code":"Villa Crespo","name":"Villa Crespo"},"Villa del Parque":{"code":"Villa del Parque","name":"Villa del Parque"},"Villa Devoto":{"code":"Villa Devoto","name":"Villa Devoto"},"Villa General Mitre":{"code":"Villa General Mitre","name":"Villa General Mitre"},"Villa Lugano":{"code":"Villa Lugano","name":"Villa Lugano"},"Villa Luro":{"code":"Villa Luro","name":"Villa Luro"},"Villa Ort\u00fazar":{"code":"Villa Ort\u00fazar","name":"Villa Ort\u00fazar"},"Villa Pueyrred\u00f3n":{"code":"Villa Pueyrred\u00f3n","name":"Villa Pueyrred\u00f3n"},"Villa Real":{"code":"Villa Real","name":"Villa Real"},"Villa Riachuelo":{"code":"Villa Riachuelo","name":"Villa Riachuelo"},"Villa Santa Rita":{"code":"Villa Santa Rita","name":"Villa Santa Rita"},"Villa Soldati":{"code":"Villa Soldati","name":"Villa Soldati"},"Villa Urquiza":{"code":"Villa Urquiza","name":"Villa Urquiza"}},"3":{"ALTOS LOS CARDALES":{"code":"ALTOS LOS CARDALES","name":"ALTOS LOS CARDALES"},"CAMPANA":{"code":"CAMPANA","name":"CAMPANA"}},"24":{"AZCUENAGA":{"code":"AZCUENAGA","name":"AZCUENAGA"},"RUIZ":{"code":"RUIZ","name":"RUIZ"},"SAN ANDRES DE GILES":{"code":"SAN ANDRES DE GILES","name":"SAN ANDRES DE GILES"},"SOLIS":{"code":"SOLIS","name":"SOLIS"},"VILLA PIL":{"code":"VILLA PIL","name":"VILLA PIL"}},"5":{"BARRIO COMARCA DEL SOL":{"code":"BARRIO COMARCA DEL SOL","name":"BARRIO COMARCA DEL SOL"},"BARRIO EL REMANSO":{"code":"BARRIO EL REMANSO","name":"BARRIO EL REMANSO"},"BARRIO EXALTACION DE LA CRUZ":{"code":"BARRIO EXALTACION DE LA CRUZ","name":"BARRIO EXALTACION DE LA CRUZ"},"BARRIO JULARO":{"code":"BARRIO JULARO","name":"BARRIO JULARO"},"BARRIO LOS PINOS":{"code":"BARRIO LOS PINOS","name":"BARRIO LOS PINOS"},"BARRIO SAKURA":{"code":"BARRIO SAKURA","name":"BARRIO SAKURA"},"CAPILLA DEL SE\u00d1OR":{"code":"CAPILLA DEL SE\u00d1OR","name":"CAPILLA DEL SE\u00d1OR"},"DIEGO GAYNOR":{"code":"DIEGO GAYNOR","name":"DIEGO GAYNOR"},"LOS CARDALES":{"code":"LOS CARDALES","name":"LOS CARDALES"},"PAVON":{"code":"PAVON","name":"PAVON"},"PDA.ROBLES\/VILLA M.CRUZ":{"code":"PDA.ROBLES\/VILLA M.CRUZ","name":"PDA.ROBLES\/VILLA M.CRUZ"}},"11":{"BARRIO PARQUE LELOIR":{"code":"BARRIO PARQUE LELOIR","name":"BARRIO PARQUE LELOIR"},"ITUZAINGO":{"code":"ITUZAINGO","name":"ITUZAINGO"},"VILLA G. UDAONDO":{"code":"VILLA G. UDAONDO","name":"VILLA G. UDAONDO"}},"16":{"BARRIO PARQUE SAN MARTIN":{"code":"BARRIO PARQUE SAN MARTIN","name":"BARRIO PARQUE SAN MARTIN"},"LIBERTAD":{"code":"LIBERTAD","name":"LIBERTAD"},"MARIANO ACOSTA":{"code":"MARIANO ACOSTA","name":"MARIANO ACOSTA"},"MERLO":{"code":"MERLO","name":"MERLO"},"PONTEVEDRA":{"code":"PONTEVEDRA","name":"PONTEVEDRA"},"SAN ANTONIO DE PADUA":{"code":"SAN ANTONIO DE PADUA","name":"SAN ANTONIO DE PADUA"}},"17":{"BELLA VISTA":{"code":"BELLA VISTA","name":"BELLA VISTA"},"CAMPO DE MAYO":{"code":"CAMPO DE MAYO","name":"CAMPO DE MAYO"},"MU\u00d1IZ":{"code":"MU\u00d1IZ","name":"MU\u00d1IZ"},"SAN MIGUEL":{"code":"SAN MIGUEL","name":"SAN MIGUEL"}},"28":{"BENAVIDEZ":{"code":"BENAVIDEZ","name":"BENAVIDEZ"},"DIQUE LUJAN":{"code":"DIQUE LUJAN","name":"DIQUE LUJAN"},"DON TORCUATO (ESTE)":{"code":"DON TORCUATO (ESTE)","name":"DON TORCUATO (ESTE)"},"DON TORCUATO (OESTE)":{"code":"DON TORCUATO (OESTE)","name":"DON TORCUATO (OESTE)"},"EL TALAR":{"code":"EL TALAR","name":"EL TALAR"},"GRAL. PACHECHO":{"code":"GRAL. PACHECHO","name":"GRAL. PACHECHO"},"LOS TRONCOS DEL TALAR":{"code":"LOS TRONCOS DEL TALAR","name":"LOS TRONCOS DEL TALAR"},"NORDELTA":{"code":"NORDELTA","name":"NORDELTA"},"RICARDO ROJAS":{"code":"RICARDO ROJAS","name":"RICARDO ROJAS"},"RINCON DE MILBERG":{"code":"RINCON DE MILBERG","name":"RINCON DE MILBERG"},"TIGRE":{"code":"TIGRE","name":"TIGRE"}},"26":{"BILLINGHURST":{"code":"BILLINGHURST","name":"BILLINGHURST"},"C. J. EL LIBERTADOR":{"code":"C. J. EL LIBERTADOR","name":"C. J. EL LIBERTADOR"},"CDAD. L. G. SAN MARTIN":{"code":"CDAD. L. G. SAN MARTIN","name":"CDAD. L. G. SAN MARTIN"},"GENERAL E. NECOCHEA":{"code":"GENERAL E. NECOCHEA","name":"GENERAL E. NECOCHEA"},"GENERAL JOSE ZAPIOLA":{"code":"GENERAL JOSE ZAPIOLA","name":"GENERAL JOSE ZAPIOLA"},"GRANADEROS DE SAN MARTIN":{"code":"GRANADEROS DE SAN MARTIN","name":"GRANADEROS DE SAN MARTIN"},"GREGORIA MATORRAS":{"code":"GREGORIA MATORRAS","name":"GREGORIA MATORRAS"},"JOSE LEON SUAREZ":{"code":"JOSE LEON SUAREZ","name":"JOSE LEON SUAREZ"},"JUAN G. LAS HERAS":{"code":"JUAN G. LAS HERAS","name":"JUAN G. LAS HERAS"},"PRESIDENTE ALCORTA":{"code":"PRESIDENTE ALCORTA","name":"PRESIDENTE ALCORTA"},"REMEDIOS DE ESCALADA":{"code":"REMEDIOS DE ESCALADA","name":"REMEDIOS DE ESCALADA"},"SAN ANDRES":{"code":"SAN ANDRES","name":"SAN ANDRES"},"VILLA AYACUCHO":{"code":"VILLA AYACUCHO","name":"VILLA AYACUCHO"},"VILLA BALLESTER":{"code":"VILLA BALLESTER","name":"VILLA BALLESTER"},"VILLA CHACABUCO":{"code":"VILLA CHACABUCO","name":"VILLA CHACABUCO"},"VILLA GODOY CRUZ":{"code":"VILLA GODOY CRUZ","name":"VILLA GODOY CRUZ"},"VILLA GRAL. GUIDO":{"code":"VILLA GRAL. GUIDO","name":"VILLA GRAL. GUIDO"},"VILLA GRAL. SUCRE":{"code":"VILLA GRAL. SUCRE","name":"VILLA GRAL. SUCRE"},"VILLA LIBERTAD":{"code":"VILLA LIBERTAD","name":"VILLA LIBERTAD"},"VILLA LYNCH":{"code":"VILLA LYNCH","name":"VILLA LYNCH"},"VILLA M. DE AGUADO":{"code":"VILLA M. DE AGUADO","name":"VILLA M. DE AGUADO"},"VILLA MAIPU":{"code":"VILLA MAIPU","name":"VILLA MAIPU"},"VILLA MONTEAGUDO":{"code":"VILLA MONTEAGUDO","name":"VILLA MONTEAGUDO"},"VILLA PUEYRREDON":{"code":"VILLA PUEYRREDON","name":"VILLA PUEYRREDON"},"VILLA SAN LORENZO":{"code":"VILLA SAN LORENZO","name":"VILLA SAN LORENZO"},"VILLA YAPEYU":{"code":"VILLA YAPEYU","name":"VILLA YAPEYU"}},"4":{"CAPITAN SARMIENTO":{"code":"CAPITAN SARMIENTO","name":"CAPITAN SARMIENTO"}},"29":{"CARAPACHAY":{"code":"CARAPACHAY","name":"CARAPACHAY"},"FLORIDA":{"code":"FLORIDA","name":"FLORIDA"},"LA LUCILA":{"code":"LA LUCILA","name":"LA LUCILA"},"MUNRO":{"code":"MUNRO","name":"MUNRO"},"OLIVOS":{"code":"OLIVOS","name":"OLIVOS"},"VICENTE LOPEZ":{"code":"VICENTE LOPEZ","name":"VICENTE LOPEZ"},"VILLA MARTELLI":{"code":"VILLA MARTELLI","name":"VILLA MARTELLI"}},"14":{"CARLOS KEEN":{"code":"CARLOS KEEN","name":"CARLOS KEEN"},"CORTINEZ":{"code":"CORTINEZ","name":"CORTINEZ"},"JOSE M. JAUREGUI":{"code":"JOSE M. JAUREGUI","name":"JOSE M. JAUREGUI"},"LUJAN":{"code":"LUJAN","name":"LUJAN"},"OLIVERA":{"code":"OLIVERA","name":"OLIVERA"},"OPEN DOOR":{"code":"OPEN DOOR","name":"OPEN DOOR"},"TORRES":{"code":"TORRES","name":"TORRES"}},"2":{"CARMEN DE ARECO":{"code":"CARMEN DE ARECO","name":"CARMEN DE ARECO"},"TRES SARGENTOS":{"code":"TRES SARGENTOS","name":"TRES SARGENTOS"}},"18":{"CASTELAR":{"code":"CASTELAR","name":"CASTELAR"},"EL PALOMAR":{"code":"EL PALOMAR","name":"EL PALOMAR"},"J. HAEDO":{"code":"J. HAEDO","name":"J. HAEDO"},"MORON":{"code":"MORON","name":"MORON"},"VILLA SARMIENTO":{"code":"VILLA SARMIENTO","name":"VILLA SARMIENTO"}},"20":{"CUARTEL V":{"code":"CUARTEL V","name":"CUARTEL V"},"FRANCISCO ALVAREZ":{"code":"FRANCISCO ALVAREZ","name":"FRANCISCO ALVAREZ"},"LA REJA":{"code":"LA REJA","name":"LA REJA"},"MORENO":{"code":"MORENO","name":"MORENO"},"PASO DEL REY":{"code":"PASO DEL REY","name":"PASO DEL REY"},"TRUJUI":{"code":"TRUJUI","name":"TRUJUI"}},"21":{"DEL VISO":{"code":"DEL VISO","name":"DEL VISO"},"LA LONJA":{"code":"LA LONJA","name":"LA LONJA"},"MANZANARES":{"code":"MANZANARES","name":"MANZANARES"},"PILAR":{"code":"PILAR","name":"PILAR"},"PRESIDENTE DERQUI":{"code":"PRESIDENTE DERQUI","name":"PRESIDENTE DERQUI"},"TORTUGUITAS":{"code":"TORTUGUITAS","name":"TORTUGUITAS"},"VILLA ASTOLFI":{"code":"VILLA ASTOLFI","name":"VILLA ASTOLFI"},"VILLA ROSA":{"code":"VILLA ROSA","name":"VILLA ROSA"},"ZELAYA":{"code":"ZELAYA","name":"ZELAYA"}},"12":{"DEL VISO":{"code":"DEL VISO","name":"DEL VISO"},"JOSE C. PAZ":{"code":"JOSE C. PAZ","name":"JOSE C. PAZ"},"TORTUGUITAS":{"code":"TORTUGUITAS","name":"TORTUGUITAS"}},"22":{"DUGGAN":{"code":"DUGGAN","name":"DUGGAN"},"SAN ANTONIO DE ARECO":{"code":"SAN ANTONIO DE ARECO","name":"SAN ANTONIO DE ARECO"},"VILLA LIA":{"code":"VILLA LIA","name":"VILLA LIA"}},"7":{"EL CAZADOR":{"code":"EL CAZADOR","name":"EL CAZADOR"},"ESCOBAR":{"code":"ESCOBAR","name":"ESCOBAR"},"GARIN":{"code":"GARIN","name":"GARIN"},"ING. MASCHWITZ":{"code":"ING. MASCHWITZ","name":"ING. MASCHWITZ"},"LOMA VERDE":{"code":"LOMA VERDE","name":"LOMA VERDE"},"MAQUINISTA F. SAVIO":{"code":"MAQUINISTA F. SAVIO","name":"MAQUINISTA F. SAVIO"},"MATHEU":{"code":"MATHEU","name":"MATHEU"}},"8":{"GENERAL LAS HERAS":{"code":"GENERAL LAS HERAS","name":"GENERAL LAS HERAS"},"VILLARS":{"code":"VILLARS","name":"VILLARS"}},"9":{"GENERAL RODRIGUEZ":{"code":"GENERAL RODRIGUEZ","name":"GENERAL RODRIGUEZ"}},"6":{"GOLDNEY":{"code":"GOLDNEY","name":"GOLDNEY"},"GOWLAND":{"code":"GOWLAND","name":"GOWLAND"},"MERCEDES":{"code":"MERCEDES","name":"MERCEDES"}},"15":{"GRAN BOURG":{"code":"GRAN BOURG","name":"GRAN BOURG"},"LOS POLVORINES":{"code":"LOS POLVORINES","name":"LOS POLVORINES"},"PABLO NOGUES":{"code":"PABLO NOGUES","name":"PABLO NOGUES"},"SOURDEAUX":{"code":"SOURDEAUX","name":"SOURDEAUX"},"TORTUGUITAS":{"code":"TORTUGUITAS","name":"TORTUGUITAS"},"VILLA DE MAYO":{"code":"VILLA DE MAYO","name":"VILLA DE MAYO"}},"10":{"HURLINGHAM":{"code":"HURLINGHAM","name":"HURLINGHAM"},"VILLA TESEI":{"code":"VILLA TESEI","name":"VILLA TESEI"}},"30":{"LIMA":{"code":"LIMA","name":"LIMA"},"ZARATE":{"code":"ZARATE","name":"ZARATE"}},"19":{"MARCOS PAZ":{"code":"MARCOS PAZ","name":"MARCOS PAZ"}},"23":{"SAN FERNANDO":{"code":"SAN FERNANDO","name":"SAN FERNANDO"},"VICTORIA":{"code":"VICTORIA","name":"VICTORIA"},"VIRREYES":{"code":"VIRREYES","name":"VIRREYES"}}});
							var contactForm = new VarienForm('contactForm', true);
						//]]>
					</script>
					<!--â€“ END OF CONTACT FORM â€“-->
				</div>
			</div>
			<div id="footer">
				<div class="content-footer" style="display:none;">
					<div class="container" style="visibility:hidden;">
						<div class="footer-cols-wrapper row">
							<div>
								<h4>CategorÃ­as</h4>
								<div class="footer-col-content">
									<ul>
										<li>
											<a href="http://www.gnfshop.com.ar/agua-caliente.html">
											Agua caliente        </a>
										</li>
										<li>
											<a href="http://www.gnfshop.com.ar/coccion.html">
											Cocci&oacute;n        </a>
										</li>
										<li>
											<a href="http://www.gnfshop.com.ar/calefaccion.html">
											Calefacci&oacute;n        </a>
										</li>
										<li>
											<a href="http://www.gnfshop.com.ar/termoexpress.html">
											TermoExpress        </a>
										</li>
										<li>
											<a href="http://www.gnfshop.com.ar/seguridad.html">
											Seguridad        </a>
										</li>
										<li>
											<a href="http://www.gnfshop.com.ar/otros-usos.html">
											Otros Usos        </a>
										</li>
										<li>
											<a href="http://www.gnfshop.com.ar/instalacion.html">
											Instalaci&oacute;n        </a>
										</li>
									</ul>
								</div>
							</div>
							<div class="span3">
								<h4>Contacto</h4>
								<div class="footer-col-content">
									<ul>
										<li>Tel: 0810 66 62887</li>
										<li>E-mail: <a href="mailto:info@gnfshop.com.ar">info@gnfshop.com.ar</a></li>
										<li><a href="http://www.gnfshop.com.ar/centros-de-atencion">Centros de Atenci&oacute;n</a></li>
									</ul>
								</div>
							</div>
							<div class="span3">
								<h4>Sobre Nosotros</h4>
								<div class="footer-col-content">
									<ul>
										<li><a href="http://www.gnfshop.com.ar/terminos-y-condiciones">T&eacute;rminos y condiciones</a></li>
										<li><a href="http://www.gnfshop.com.ar/preguntas-frecuentes">Preguntas frecuentes</a></li>
										<li><a href="http://www.gnfshop.com.ar/terminos-y-condiciones-promociones-vigentes">Promoci&oacute;n vigente</a></li>
									</ul>
								</div>
							</div>
							<div class="span2 offset1">
								<h4>Social Media</h4>
								<div class="footer-col-content">
									<ul class="socialmedia">
										<li><a id="twitter" onclick="FLOOD1(&#39;gnfsi026&#39;, &#39;cnv_s991&#39;);" href="https://www.facebook.com/GasNaturalFenosaArgentina" target="_blank">Facebook</a></li>
										<li><a id="facebook" onclick="FLOOD1(&#39;gnfsi026&#39;, &#39;cnv_s634&#39;);" href="https://twitter.com/GNF_Ar" target="_blank">Twitter</a></li>
										<li class="last" onclick="FLOOD1(&#39;gnfsi026&#39;, &#39;cnv_s573&#39;);"><a id="youtube" href="http://www.youtube.com/user/GasNaturalFenosaAr" target="_blank">Youtube</a></li>
									</ul>
								</div>
							</div>
						</div>
						<script id="DoubleClickFloodlightTag" type="text/javascript">// <![CDATA[
							function FLOOD1(type, cat) {
									var axel = Math.random()+"";
									var a = axel * 10000000000000000;
									var flDiv=document.body.appendChild(document.createElement("div"));
									flDiv.setAttribute("id","DCLK_FLDiv1");
									flDiv.style.position="absolute";
									flDiv.style.top="0";
									flDiv.style.left="0";
									flDiv.style.width="1px";
									flDiv.style.height="1px";
									flDiv.style.display="none";
									flDiv.innerHTML='<iframe id="DCLK_FLIframe1" src="http://12345678.fls.doubleclick.net/activityi;src=12345678;type=' + type + ';cat=' + cat + ';ord=' + a + '?" width="1" height="1" frameborder="0"><\/iframe>';
							}
							// ]]>
						</script>
						<script type="text/javascript">// <![CDATA[
							dataLayer=[];
							// ]]>
						</script>        
					</div>
				</div>
				<address>
					<div class="row">
						<div class="col-12">
							<a href="http://qr.afip.gob.ar/?qr=VQcqt7OCRu810I7dP4SQ3g,," target="_F960AFIPInfo" class="pull-left" style="display:block;width:40px;margin-right:15px;">
							<img src="files/DATAWEB.jpg" border="0">
							</a>
							<a href="http://www.jus.gov.ar/datos-personales.aspx/" target="_blank" style="height: 55px; width: auto; margin-right:15px;" class="pull-left">
							<img src="files/isologo_rnbd.png" alt="Registro Nacional de Bases de Datos">
							</a>
							<p>© Natural Servicios S.A. Derechos Reservados</p>
							<h5>Todo los productos y servicios que se exhiben y se comercializan en la tienda son de <strong>Natural Servicios S.A.</strong><br>Una empresa de Gas Natural Fenosa en la Argentina</h5>
							<!--<span id="designed_by">
								<a href="http://www.25watts.com.ar" title="25Watts Â· DiseÃ±o y Desarrollo web" target="_blank"></a>
								<span class="pull-right">DiseÃ±o y desarrollo</span>
								</span>-->
						</div>
					</div>
				</address>
			</div>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery(window).resize(function(){
					if(jQuery(window).width() <= 640) {
						jQuery("#FlashID").hide();
						jQuery("#imageID").show();
					} else if(jQuery(window).width() > 640) {
						jQuery("#FlashID").show();
						jQuery("#imageID").hide();
					}									
				});
			});
		</script>
	</body>
</html>