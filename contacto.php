<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?PHP
	if(isset($_POST["Submit"])){
		$nombre		= $_POST["nombre"];
		//$apellidos	= $_POST["apellidos"];
		$telefono	= $_POST["telefono"];
		$mail		= $_POST["mail"];
		$mensaje	= $_POST["mensaje"];
		
		$error			= false;
		$e_nombre	= false;
		$e_telefono	= false;
		$e_mail		= false;
		$e_mensaje= false;
		
		if(strlen($nombre)<2)		{$error = true; $e_nombre = true;}
		if(strlen($telefono)<7)		{$error = true; $e_telefono = true;}
		if(strlen($mensaje)<1)		{$error = true; $e_mensaje = true;}
		if(!is_valid_email($mail))	{$error = true; $e_mail = true;}
		
		if(!$error){
			$header = 'From: ' . $mail . " \r\n";
			$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
			$header .= "Mime-Version: 1.0 \r\n";
			$header .= "Content-Type: text/plain";

			$salida = "Este mensaje fue enviado por " . $nombre . " \r\n";
			$salida .= "Su e-mail es: " . $mail . " \r\n";
			$salida .= "Teléfono: " . $telefono . " \r\n";
			$salida .= "Mensaje: " . $mensaje . " \r\n";
			$salida .= "Enviado el " . date('d/m/Y', time());

			$para = 'info@makeartstudio.cl, cursosmakeart@gmail.com';
			$asunto = 'Contacto desde Makeartstudio';
			
			mail($para, $asunto, $salida, $header);
		}else{
			// Mensaje de error !!!!! :(
		}
	}
	
	function is_valid_email($email){
		if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))	return true; 
		else																						return false;
	}
	
	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: Make art studio :: Make art ::</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/font.css" rel="stylesheet" type="text/css" />
<link href="css/base.css" rel="stylesheet" type="text/css" />
<link href="css/contacto.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>

<body>
<div id="contenedor-global"> 
	<div id="cabecera">
		<div id="logo"><img src="img/logo_makeart.png" alt="logo makeartstudio" /></div>
			<div id="menu">  
					<ul class="menuh">
						<li></li>
						<li><a href="index.html">Quiénes somos</a>|</li>
						<li><a href="make_art.html">Make art</a>|</li>
						<li><a href="make_up.html">Make up</a>|</li>
						<li><a href="make_hair.html">Make hair</a>|</li>
						<li><a href="galeria.html">Galería</a>|</li>
						<li><a href="acreditacion.html">Acreditación</a>|</li>
						<li><a href="profesores.html">Profesores</a>|</li>
						<li><a href="#"><font color="#b4b4b4">Contacto</font></a>|</li>
						<li><a href="http://www.facebook.com/maquiarte?ref=ts" target="_blank">Facebook</a>|</li>
						<li><a href="http://www.twitter.com/makeartstudio" target="_blank">Twitter</a></li>
					</ul>
		</div>
	</div><br /><br />
	<div id="contenido">
		<div id="make-art-galeria"><img src="img/banner_contacto.jpg" alt="make art studio" /></div>
		<div id="make-art-columnas">
			<div id="iz">
				<p>:: CONTACTO ::<br/>
				  <br/>
				Make art studio<br/>
				Avenida Andres Bello 1575. Providencia<br/>
				Metro P. de Valdivia y M. Montt <a href="http://www.mapcity.cl/#t=1:a=AVDA_ANDRES_BELLO__1575.PROVIDENCIA" target="_blank"> (mapa)</a></p>
				<p>
				. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . <br/>
				Teléfonos<br/>
				56 2 264 95 78<br/>
				Horario <br/>
			  Lunes a viernes 9.30 - 19.00 </p>
				<p>  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . <br/>
				  Email<br/>
				  info@makeartstudio.cl<br/>
				  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . <br/>
				  Cont&aacute;ctanos para trabajar con nosotros<br/>
				  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . <br/>
	            </p>
			</div>
			<div id="de">
				:: FORMULARIO DE CONTACTO ::<br/><br/>
				<form id="contacto" name="contacto" method="post" action="contacto.php">
				<?PHP
					if((isset($_POST["Submit"]))&&($error)){
						if($e_nombre){
				?>
					<div class="entrada_nombre error">Nombre y apellidos:<input class="error" name="nombre" type="text" id="nombre" value="<?PHP echo $nombre;?>" /></div>
				<?PHP
					}else{
				?>
					<div class="entrada_nombre">Nombre y apellidos:<input name="nombre" type="text" id="nombre" value="<?PHP echo $nombre;?>" /></div>
				<?PHP
					}
					if($e_telefono){
				?>
					<div class="entrada_apellidos error">Teléfono:<input class="error" name="telefono" type="text" id="telefono" value="<?PHP echo $telefono;?>" /></div>
				<?PHP
					}else{
				?>
					<div class="entrada_apellidos">Teléfono:<input name="telefono" type="text" id="telefono" value="<?PHP echo $telefono;?>" /></div>
				<?PHP
					}
					if($e_mail){
				?>
					<div class="entrada_mail error">Email:<input class="error" name="mail" type="text" id="mail" value="<?PHP echo $mail;?>" /></div>
				<?PHP
					}else{
				?>
					<div class="entrada_mail">Email:<input name="mail" type="text" id="mail" value="<?PHP echo $mail;?>" /></div>
				<?PHP
					}
					if($e_mensaje){
				?>
					<div class="mensaje error"><textarea class="error" name="mensaje" id="mensaje" rows="4"><?PHP echo $mensaje;?> </textarea></div>
				<?PHP
					}else{
				?>
					<div class="mensaje"><textarea name="mensaje" id="mensaje" rows="4"><?PHP echo $mensaje;?> </textarea></div>
				<?PHP
					}
				?>
					<div class="boton"><input type="submit" name="Submit" value="Enviar" /></div>
				<?PHP
					}else{
				?>
					<div class="entrada_nombre">Nombre y apellidos:<input name="nombre" type="text" id="nombre" value="obligatorio *"/></div>
					<div class="entrada_apellidos">Teléfono:<input name="telefono" type="text" id="telefono" value="obligatorio *"/></div>
					<div class="entrada_mail">Email:<input name="mail" type="text" id="mail" value="obligatorio *"/></div>
					<div class="mensaje"><textarea name="mensaje" id="mensaje" rows="4">obligatorio *</textarea></div>
					<div class="boton"><input type="submit" name="Submit" value="Enviar" /></div>
					<script>
					$("input[type=text]").click(function(){
					  this.select();
					});
					$("textarea").click(function(){
					  this.select();
					});
					</script>
				<?php
					}
				?>
				</form>
			</div>
		</div>
	</div>
	<br/>
	<div id="contenedor-pie">
		<div id="pie">Av. Andrés Bello 1575. Providencia. #56 2 264 95 78. Copyright Make art studio 2011. Todos los derechos reservados.</div>&nbsp;
	</div><br/>
	<div id="marginador">&nbsp;</div><br/>
	
</div>
</body>
</html>
