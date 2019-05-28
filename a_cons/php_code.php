<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'tropicalbar');

	// initialize variables
	$nombre = "";
    $apellido = "";
    $cedula = "";
    $email = "";
    $interes = "";
    $id = 0;
    $edit_state = false;
	$update = false;
// salva con el botton 
	if (isset($_POST['enviar'])) {
	
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $email = $_POST['email'];
        $interes = $_POST['interes'];

		$query = "INSERT INTO info (nombre, apellido, cedula, email, interes) VALUES ('$nombre', '$apellido', '$cedula', '$email', '$interes')"; 
        mysqli_query($db, $query);
        $_SESSION['msg'] = "Informacion enviada";
		header('../php/Formulario.php'); //redirecciona a la pagin de inicio
    }
    if(isset($_POST['update'])){
       $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
        $cedula = mysqli_real_escape_string($db, $_POST['cedula']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $interes = mysqli_real_escape_string($db, $_POST['interes']);
        $id= mysqli_real_escape_string($db, $_POST['id']);
   
        mysqli_query($db, "UPDATE info SET nombre='$nombre', apellido='$apellido', cedula='$cedula', email='$email', interes='$interes' WHERE id=$id");
        $_SESSION['msg'] = "Informacion actualizada";
        header('../php/Formulario.php');
    }

   

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        echo'paso por aqui';
        mysqli_query($db, "DELETE FROM info WHERE  id=$id");
        $_SESSION['msg'] = "Informacion Borrada";
        header('../php/Formulario.php');
    
    }

$results =mysqli_query($db,"SELECT * FROM info");

// ...
?>