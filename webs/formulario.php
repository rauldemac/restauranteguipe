<?PHP
if (!isset($_REQUEST['enviar'])){
	$mensaje="No se han enviado datos en el formulario";
}
else{
	$mensaje="";
	if ($mysqli=mysqli_connect("localhost","root")){
		if($mysqli->select_db("test")){
			$query='insert into registro values (NULL, "'.$_REQUEST['nombre'].'", "'.$_REQUEST['apellidos'].'", "'.$_REQUEST['password'].'", "'.$_REQUEST['email'].'", "'.$_REQUEST['gender'].'", "'.$_REQUEST['foto'].'", "'.$_REQUEST['residencia'].'", "'.$_REQUEST['dia'].'", "'.$_REQUEST['mes'].'", "'.$_REQUEST['año'].'", "'.@$_REQUEST['puesto'].'", "'.$_REQUEST['boletin1'].'", "'.$_REQUEST['boletin2'].'")';
			$resultado=$mysqli->query($query);
			if($resultado)
				$mensaje="Registro insertado con &eacute;xito";
			else 
				$mensaje="Imposible la inserci&oacute;n: ".$mysqli->error;	
		}
		else{
			$mensaje="Imposible seleccionar la BD";
		}
		$mysqli->close();
	}
	else{
		$mensaje="Imposible conectar con la BD";
	}
}
print"<HTML><HEAD></HEAD><BODY>";
print"<P>$mensaje<P>";
print"</BODY></HTML>";
?>