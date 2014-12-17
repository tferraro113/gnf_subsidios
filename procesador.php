<?php 
include('connect.php');
//header('Content-Type: charset : utf-8')

 
$nombre = $_POST['name'].' '.$_POST['sname'];
$fecha = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
$current_date =  date('Y-m-d G:i:s');

//die($current_date);

$nro= 5;


$pdo_query = $pdo_obj_2->prepare('SELECT usuario FROM usuario_municipio WHERE municipio = :municipio_id LIMIT 1');


$pdo_query->bindParam(':municipio_id', $_POST['region_id'], PDO::PARAM_INT);

$pdo_query->execute();

$result = $pdo_query->fetch();

$usuario_gestiona =  $result['usuario'];

//QUERY PARA INGRESAR DATOS


$pdo_obj->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$pdo = $pdo_obj->prepare('INSERT INTO contactos ( nombre, apellido, usuario_gestiona , sexo, fecha_nacimiento, tipo_documento, numero, telefono , mail, municipio_id, localidad_id, calle, numero_calle, complemento, entre_calles, instalacion_coccion, instalacion_aguaCaliente, instalacion_calefaccion, created ,posee_gas ,created_by, consulta) VALUES ( :nombre , :apellido, :usuario_gestiona ,:sexo, :fecha_nacimiento , :tipo_documento, :numero, :telefono, :mail, :municipio_id , :localidad_id , :calle, :numero_calle , :complemento , :entre_calles , :instalacion_coccion , :instalacion_aguaCaliente, :instalacion_calefaccion , :created , :posee_gas,:created_by ,:consulta)');


$pdo->bindParam(':nombre', $nombre , PDO::PARAM_STR);

$pdo->bindParam(':apellido', $_POST['lastname'], PDO::PARAM_STR);

$pdo->bindParam(':sexo', $_POST['gender'], PDO::PARAM_INT);
$pdo->bindParam(':fecha_nacimiento', $fecha , PDO::PARAM_STR);
$pdo->bindParam(':tipo_documento', $_POST['tipo_documento'], PDO::PARAM_INT);
$pdo->bindParam(':numero', $_POST['nrodoc'], PDO::PARAM_INT);
$pdo->bindParam(':telefono', $_POST['telephone'], PDO::PARAM_STR);

$pdo->bindParam(':mail', $_POST['email'], PDO::PARAM_STR);
$pdo->bindParam(':municipio_id', $_POST['region_id'], PDO::PARAM_INT);
$pdo->bindParam(':localidad_id', $_POST['city_id'], PDO::PARAM_INT);
$pdo->bindParam(':calle', $_POST['calle'], PDO::PARAM_STR);
$pdo->bindParam(':numero_calle',  $_POST['nrocalle'], PDO::PARAM_INT);
$pdo->bindParam(':complemento', $_POST['complemento'], PDO::PARAM_STR);

$pdo->bindParam(':entre_calles', $_POST['ecalles'], PDO::PARAM_STR);



$pdo->bindParam(':instalacion_coccion', $_POST['coccion'], PDO::PARAM_STR);

$pdo->bindParam(':instalacion_aguaCaliente', $_POST['acaliente'], PDO::PARAM_STR);

$pdo->bindParam(':instalacion_calefaccion', $_POST['calefaccion'], PDO::PARAM_STR);

$pdo->bindParam(':created', $current_date , PDO::PARAM_STR);

$pdo->bindParam(':consulta', $_POST['consulta'] , PDO::PARAM_STR);

$pdo->bindParam(':created_by', $nro , PDO::PARAM_INT);

$pdo->bindParam(':usuario_gestiona', $usuario_gestiona , PDO::PARAM_INT);

$pdo->bindParam(':posee_gas', $_POST['posee_gas'], PDO::PARAM_INT);


$pdo->execute();
//$result_columns = mysqli_query($con,"SHOW COLUMNS FROM `form`");


header("Location:enviado.php");

// Aqui va la url del archivo de respuesta que indica al usuario que el formulario fué enviado
//$_SESSION['error'] .= "Gracias !!! El e-mail ha sido enviado. <br/>";
//header("Location: contacto.php");
?>
