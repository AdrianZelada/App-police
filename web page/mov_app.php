<?php
date_default_timezone_set('America/Los_Angeles');
include("DB/mysql.class.php");
require 'PHPMailer/PHPMailerAutoload.php';
$db = new MySQL(true, "policia", "localhost", "root", "");

var_dump ($_GET);
ob_start();
var_dump($_GET);
$contents = ob_get_contents();
ob_end_clean();
error_log($contents);

$no_vehiculo='"'.$_GET['datos']['no_vehiculo'].'"';
$zona='"'.$_GET['datos']['zona'].'"';
$carretera='"'.$_GET['datos']['carretera'].'"';
$km='"'.$_GET['datos']['km'].'"';
$denominacion='"'.$_GET['datos']['denominacion'].'"';
$sentido='"'.$_GET['datos']['sentido'].'"';
$luminosidad='"'.$_GET['datos']['luminosidad'].'"';
$tipo_accidente='"'.$_GET['datos']['tipo_accidente'].'"';
$tipo_accidente2='"'.$_GET['datos']['tipo_accidente2'].'"';
$nombre_peaton='"'.$_GET['datos']['nombre_peaton'].'"';
$apellido_peaton='"'.$_GET['datos']['apellido_peaton'].'"';
$direccion_peaton='"'.$_GET['datos']['direccion_peaton'].'"';
$sexo_peaton='"'.$_GET['datos']['sexo_peaton'].'"';
$responsable_peaton='"'.$_GET['datos']['responsable_peaton'].'"';
$matricula='"'.$_GET['datos']['matricula'].'"';
$marca='"'.$_GET['datos']['marca'].'"';
$modelo='"'.$_GET['datos']['modelo'].'"';
$no_ocupantes='"'.$_GET['datos']['no_ocupantes'].'"';
$soat='"'.$_GET['datos']['soat'].'"';
$compania_aseguradora='"'.$_GET['datos']['compania_aseguradora'].'"';
$no_poliza='"'.$_GET['datos']['no_poliza'].'"';
$nombre_conductor='"'.$_GET['datos']['nombre_conductor'].'"';
$apellido_conductor='"'.$_GET['datos']['apellido_conductor'].'"';
$clase_permiso='"'.$_GET['datos']['clase_permiso'].'"';
$sexo_conductor='"'.$_GET['datos']['sexo_conductor'].'"';
$responsable_conductor='"'.$_GET['datos']['responsable_conductor'].'"';

$insert_s=$no_vehiculo.', '.$zona.', '.$carretera.', '.$km.', '.$denominacion.', '.$sentido.', '.$luminosidad.', '.$tipo_accidente.', '.$tipo_accidente2.', '.$nombre_peaton.', '.$apellido_peaton.', '.$direccion_peaton.', '.$sexo_peaton.', '.$responsable_peaton.', '.$matricula.', '.$marca.', '.$modelo.', '.$no_ocupantes.', '.$soat.', '.$compania_aseguradora.', '.$no_poliza.', '.$nombre_conductor.', '.$apellido_conductor.', '.$sexo_conductor.', '.$clase_permiso.', '.$responsable_conductor;
$sql = "INSERT INTO formulario (no_vehiculo, zona,carretera,km,denominacion,sentido,luminosidad,tipo_accidente,tipo_accidente2,nombre_peaton,apellido_peaton,direccion_peaton,sexo_peaton,responsable_peaton,matricula,marca,modelo,no_ocupantes,soat,compania_aseguradora,no_poliza,nombre_conductor,apellido_conductor,sexo_conductor,clase_permiso,responsable_conductor) VALUES (".$insert_s.")";
if (! $db->Query($sql)) $db->Kill();
$sendhtml=$_GET['ht'];
$sendto=$_GET['email'];
$codigo=$_GET['codigo'];

define('GUSER', 'youemail@gmail.com');
define('GPWD', 'youpassword');
$to='ronnieitor@gmail.com';
$from='ronnieitor@gmail.com';
$recipient = array ($to);
global $error;
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = GUSER;
$mail->Password = GPWD;
$mail->SetFrom($from, "Ronnie Renso");
$mail->Subject = 'Nuevo Registro Enviado con codigo '. $codigo;
$mail->msgHTML($sendhtml);
$mail->AddAddress($sendto);
if(!$mail->Send()) {
    $error = 'Mail error: '.$mail->ErrorInfo;
    error_log($error);
    return false;
} else {
    $error = 'Message sent!';
    error_log($error);
    return true;
}

?>
