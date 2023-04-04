<?php
	require("admin/conex_bd.php");
 	session_name("bd_cudendum");
  	session_start();
if($conexion= conectar())
{
    mysqli_set_charset($conexion,'utf8');
	
	if(isset($_POST['dejarComentario']))
	{
		$_SESSION['error']="comentario";
		header("Location: index.php");
		exit;
	}

 if(isset($_SESSION['usuario']) && isset($_SESSION['clave']) && isset($_SESSION['sesion']))
   {
	   $consulta="SELECT *  FROM usuarios WHERE usuario='".$_SESSION['usuario']."' and password=md5('".$_SESSION['clave']."')";

	   if($resultado=mysqli_query($conexion,$consulta))
	   {
			if(mysqli_num_rows($resultado) > 0)
			{
					if($datos_usu = mysqli_fetch_assoc($resultado))
					{
						mysqli_free_result($resultado);

						$tiempoActual = time();
						$tiempoTranscurrido = $tiempoActual - $_SESSION['sesion'];
						if($tiempoTranscurrido > 60*5)
						{
							$_SESSION['error']="tiempo";
							unset($_SESSION['usuario']);
							unset($_SESSION['clave']);
							unset($_SESSION['sesion']);
							header("Location: index.php");
							exit;
						}else
						{
							$_SESSION['sesion']=time();

							if($datos_usu['tipo']=="normal")
							{
								require("vistas/vista_normal.php");
							}else
							{
								require("vistas/vista_admin.php");
							}
						}
						
					}
					else{
						die("No se ha podido extraer los datos con éxito");
					}
			}else
			{
				$_SESSION['error']="restringido";
				mysqli_free_result($resultado);
				header("Location: index.php");
			}
	   }else
	   {
		   $error="Error de conexion nº ".mysqli_errno($conexion)." : ".mysqli_error($conexion);
	   }
	
		
   }else
    {
		if(isset($_POST['btnRegistrarse']) || isset($_POST['btnAceptarRegistro']))
		{
			require("vistas/registro.php");
		}else
		{
			if(isset($_POST['btnEntrar']))
			{
				require("admin/login_usuario.php");
			}
			

	?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8"/>
			<link href="css/main.css" rel="stylesheet"/>
			<title>Cudendum</title>
		</head>
		<body>
			<header>
				<h1>Cudendum</h1>
				<div id="logo"></div>
			</header>
			<button onclick="loggin()" id="btn_loggin">Loggin</button>
			<?php
			
				if(isset($_SESSION['error']))
				{
					if($_SESSION['error']=="restringido")
					{
						echo "<span>¡Accediendo a una zona restringida!</span>";
						
					}
					if($_SESSION['error']=="malUsuario")
					{
						echo "<span>¡Usuario no encontrado en la base de datos!</span>";
						
					}
					if($_SESSION['error']=="tiempo")
					{
						echo "<span>¡Su sesión ha caducado!</span>";
						
					}
					if($_SESSION['error']=="comentario")
					{
						echo "<span>¡Debes de estar registrado para poder dejar un comentario!</span>";
						
					}
					unset($_SESSION['error']);
				}

			?>
			<form action="index.php" method="POST" class="oculto" id="formLoggin">
				<table>
					<tr>
						<td>
							<label>Nombre de Usario:</label>
						</td>
						<td>
							<input type="text" name="user"/><br/>
						</td>
						<td>
							<?php
								if(isset($_SESSION['error2'])&& $_SESSION['error2']=="usuarioVacio")
								{
									echo "<span>*Campo Vacío*</span>";
									unset($_SESSION['error2']);
								}
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label for="">Contraseña:</label>
						</td>
						<td>
							<input type="password" name="password"/><br/>
						</td>
						<td>
							<?php
									if(isset($_SESSION['error1'])&& $_SESSION['error1']=="claveVacia")
									{
										echo "<span>*Campo Vacío*</span>";
										unset($_SESSION['error1']);
									}
								?>
						</td>
					</tr>
				
				</table>
				<button type="submit" name="btnEntrar">Entrar</button><button type="submit" name="btnRegistrarse">Registrarse</button>
				
			</form>
			<h1>Noticias</h1>
			<?php
			  $consulta="SELECT * FROM noticias";
			   if($resultado = mysqli_query($conexion,$consulta))
			   {

				
				while($fila= mysqli_fetch_assoc($resultado))
				{
					echo "<h2><a href='./index.php?mostrarNoticia=".$fila['idNoticia']."' style='color:blue;'>".$fila['titulo']."</a></h2>";
					echo "<p><b>".$fila['copete']."</b></p>";
				
				
						
						if(isset($_GET['mostrarNoticia']))
						{
							if($_GET['mostrarNoticia']==$fila['idNoticia'])
							{	$consulta="SELECT * FROM usuarios where idUsuario='".$fila['idUsuario']."'";
								$resultado=mysqli_query($conexion,$consulta);
								$user=mysqli_fetch_assoc($resultado);
								$consulta="SELECT * FROM categorias where idCategoria='".$fila['idCategoria']."'";
								$newResultado=mysqli_query($conexion,$consulta);
								$categoria=mysqli_fetch_assoc($newResultado);
								$idNoticia= $fila['idNoticia'];
								echo "<div id='fondo_gris'></div><div id='fullScreen'><div id='aDesplegar'><fieldset id='contenedor-noticia'>";
								echo "<legend><b>Información de la noticia</b></legend>";
								echo "<p style='font-style:italic;'>Publicado por <b>".$user['usuario']."</b> en <span style='color:blue'>".$categoria['valor']."</span></p>";
								echo "<p><b>Cuerpo</b><br/>".$fila['cuerpo']."</p>";
								echo "<p><b>Fecha de Publicación</b><br/> ".$fila['fPublicacion']."</p>";
								echo "<p><b>Fecha de Creación</b><br/> ".$fila['fCreacion']."</p>";
								echo "<p><b>Última modificación</b><br/> ".$fila['fModificacion']."</p>";
								echo "</fieldset>";
								echo "<form action='index.php' method='POST'><textarea name='comentario' placeholder='Solo pueden dejar comentarios los usuarios registrados'></textarea><br/>";
								echo "<button type='submit' value='".$fila['idNoticia']."' name='dejarComentario'>Comentar</button>";
								echo "<button type='submit'name='volverDeComentarios'>Volver</button>";
								echo "</form>";
								echo "<button name='verMas' id='btn_comentarios' onclick='mostrarComentarios()'>Ver Comentarios</button>";
							
							
							
							}
							
						}
						if(isset($idNoticia))
						{
					$consulta="SELECT * FROM comentarios where idNoticia='".$idNoticia."' and estado='apto'";

					if($resultado = mysqli_query($conexion,$consulta))
					{
						echo "<fieldset id='comentarios' class='oculto'>";
						echo "<legend><b>Comentarios</b></legend>";
						while($comentarios=mysqli_fetch_assoc($resultado))
						{		
							$consulta="SELECT * FROM usuarios where idUsuario='".$comentarios['idUsuario']."'";
							$select = mysqli_query($conexion,$consulta);
							$fila = mysqli_fetch_assoc($select);
									echo "<p class='pTitle'><b>".$fila['usuario']."</b> dijo:</p>";
									echo "<p class='pNormal'>".$comentarios['comentario']."</p>";
									echo "<hr>";
						}
						echo "</fieldset>";
						echo "</div></div>";
						
				
					}
					else
					{
						$error="Error al realizar la consulta";
						mysqli_close($conexion);
						die($error);
					}	
						
				}
				
				
				}
		mysqli_free_result($resultado);
			   }else
			    {
				$error="Error al realizar la consulta";
				mysqli_close($conexion);
				die($error);
			    }	
				
			?>
			<script src="js/main.js"></script>
		</body>
	</html>
	<?php
		
	}
}

}else
{
					$error="No se pudo conectar con la base de datos Error número: ".mysqli_errno($conexion)." : ".mysqli_error($conexion);
					mysqli_close($conexion);
					die($error);
}

			?>
