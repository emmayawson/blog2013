<link rel="stylesheet" type="text/css" href="css/registro.css" />
<?php
// Información sobre cómo validar un formulario en PHP en cuanto a temas de seguridad.
// MUY RECOMENDABLE: http://www.w3schools.com/php/php_form_validation.asp

// Expresiones regulares: http://webcheatsheet.com/php/regular_expressions.php

// VALIDACIÓN DE LOS DATOS DEL FORMULARIO AQUI.
//OR !empty($_POST)
if($_SERVER['REQUEST_METHOD'] == 'POST'){ //comprobar si estamos recibiendo datos por POST
    
    //sanitize inputs
    function depurar($data)
    {
      $data = trim($data); //elimina espacios en principio y al final
      $data = stripslashes($data); //elimina las barras de escape
      $data = htmlspecialchars($data); //convierte los charaters HTML en chars especiales
      return $data;
    }

    
    //validaciones
    $errores = array();
    //primero lo depuramos y luego lo validaremos
    //$_POST['nickname']  = depurar($_POST['nickname']);
    
    foreach ($_POST as $clave=>$value)
    {	
	if($value == ''){
	   $errores[] =  'El campo ' . $clave . ' esta vacio!';
	}else{
	     $_POST[$clave] = depurar($value);
	}
    }
    
   //comenzamos a validar
    //validar el nickname
    if(!preg_match('/^[a-zA-Z0-9_\-]{4,20}$/i', $_POST['nickname'])){
	$errores[] = 'El nick debe tener minimo de  4  y  max. 20 characteres!';
    }
    
    //validar email 
    if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $_POST['email'])){
	$errores[] = 'El email no es valido!';
    }
    
    
    //validar la fetcha dd/mm/yyyy
    if(!preg_match('/^[a-zA-Z0-9_\-]{4,100}$/i', $_POST['surname'])){
	$errores[] = 'El nombre debe tener minimo de  4  y  max. 100 characteres!';
    }
    
    //validar contraseña
      if(!preg_match('/^[a-z][\d]*{6,20}$/', $_POST['password'])){
	$errores[] = 'La  contraseña no cumple los requisitos!';
    }
    
     // <editor-fold defaultstate="collapsed" desc="DIV Errores.">
        // Mostramos a continuación el contenedor errores y cubrimos su contenido con el array de errores.
        echo '<div class="errores"><ul>';
        for ($i = 0; $i < count($errores); $i++)
                echo "<li>{$errores[$i]}</li>";
        echo '</ul></div>';
        // </editor-fold>
}



?>
<form class="formulario" action="" method="post" autocomplete="off">
	<ul>
		<li>
			<h2>Registration Form</h2>
		</li>
		<li>
			<label for="nickname">Nickname:</label>
			<input type="text" name="nickname" id="nickname" placeholder="nickname" required autofocus size="10" maxlength="20" value="<?php if(!empty($_POST['nickname'])){echo$_POST['nickname']; }?>"/>
		</li>
		<li>
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" placeholder="Your name"  size="10" maxlength="20" value="<?php if(!empty($_POST['name'])){echo$_POST['name']; }?>"/>
		</li>
		<li>
			<label for="surname">Surname:</label>
			<input type="text" name="surname" id="surname" placeholder="Your surname here"  size="20" maxlength="100" value="<?php if(!empty($_POST['surname'])){echo$_POST['surname']; }?>"/>
		</li>
		<li>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password"  size="10" maxlength="130" value="<?php if(!empty($_POST['password'])){echo$_POST['password']; }?>"/>
		</li>
		<li>
			<label for="email">E-mail address:</label>
			<input type="email" name="email" id="email" placeholder="test@info.local"  size="20" maxlength="50" value="<?php if(!empty($_POST['email'])){echo$_POST['email']; }?>"/>
		</li>
		<li>
			<label for="birthday">Birthday:</label>
			<input type="date" name="birthday" id="birthday" />
		</li>
		<!--- ESTA SECCIÓN SE UTILIZARÁ PARA VALIDAR EN CLASE DE DWEC --->





		<!--- ESTA SECCIÓN SE UTILIZARÁ PARA VALIDAR EN CLASE DE DWEC --->
		<li>
			<input type="reset" class="controles" value="Reset" />
			<input type="submit" class="controles" value="Sign Up" />
		</li>
	</ul>
</form>