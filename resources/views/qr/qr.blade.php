<?php
//Agregamos la libreria para genera códigos QR

$QR_BASEDIR = dirname(__FILE__) . DIRECTORY_SEPARATOR;

// Required libs

include $QR_BASEDIR . "qrconst.php";
include $QR_BASEDIR . "qrconfig.php";
include $QR_BASEDIR . "qrtools.php";
include $QR_BASEDIR . "qrspec.php";
include $QR_BASEDIR . "qrimage.php";
include $QR_BASEDIR . "qrinput.php";
include $QR_BASEDIR . "qrbitstream.php";
include $QR_BASEDIR . "qrsplit.php";
include $QR_BASEDIR . "qrrscode.php";
include $QR_BASEDIR . "qrmask.php";
include $QR_BASEDIR . "qrencode.php";

//Declaramos una carpeta temporal para guardar la imagenes generadas

//conexion bdd

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");
mysqli_set_charset($conexion, "utf8");
$consulta = mysqli_query($conexion, "SELECT * FROM manifiesto");

while ($row = mysqli_fetch_array($consulta)) {
    $transporte = utf8_decode($row['id_transp']);
    $nombre = utf8_decode($row['nom_comp']);
    $operador = utf8_decode($row['gener_nom']);
    $manifiesto = utf8_decode($row['id_manifiesto']);
    $patente = $row['id_patente'];
    $chofer = $row['chofer'];
}

$consulta2 = mysqli_query($conexion, "SELECT * FROM transportes WHERE id_transp = '$transporte'");
while ($fila = mysqli_fetch_array($consulta2)) {
    $habilitacion = $fila['trans_nro_hab_pro'];
}

$generador = mysqli_query($conexion, "SELECT * FROM generador WHERE nom_comp = '$nombre'");
while ($filita = mysqli_fetch_array($generador)) {
    $nombregene = utf8_decode($filita['nom_comp']);
    $cuit = utf8_decode($filita['cuit']);
}

$transportista = mysqli_query($conexion, "SELECT * FROM transportes WHERE id_transp = '$transporte'");

while ($fililla = mysqli_fetch_array($transportista)) {
    $transpor = utf8_decode($fililla['id_transp']);
    $cuittransporte = utf8_decode($fililla['cuit_trans']);
}

$geneprincipal = mysqli_query($conexion, "SELECT * FROM generadorprincipal WHERE gener_nom = '$operador'");

while ($fil = mysqli_fetch_array($geneprincipal)) {
    $oper = utf8_decode($fil['gener_nom']);
    $cuitt = utf8_decode($fil['gener_cuit']);
}

$vehiculo = mysqli_query($conexion, "SELECT * FROM camiones WHERE id_patente = '$patente'");
while ($raw = mysqli_fetch_array($vehiculo)) {
    $cam5 = utf8_decode($raw['pat_cpel_vto']);
}

$choferes = mysqli_query($conexion, "SELECT * FROM choferes WHERE chofer = '$chofer'");
while ($ral = mysqli_fetch_array($choferes)) {
    $cho2 = utf8_decode($ral['nro_carnet']);
    $cho3 = utf8_decode($ral['carga_pelig_vto']);
}

//Declaramos la ruta y nombre del archivo a generar
$filename = 'storage/qr/' . $manifiesto . '_manifiesto.png';

//Parametros de Condiguración

$tamaño = 2; //Tamaño de Pixel
$level = 'M'; //Precisión Baja
$framSize = 2; //Tamaño en blanco
$contenido = 'Manifiesto N°: ' . $manifiesto . ' / Generador: ' . $nombregene . ' / Cuit: ' . $cuit . ' / Transportista: ' . $transpor . ' / Cuit: '
    . $cuittransporte . ' / Operador: ' . $oper . ' / Cuit: ' . $cuitt . '  / Registro de chofer: ' . $cho2 . ' / VTO del carnet: ' . $cho3 . ' / 
	Patente: ' . $patente . ' / VTO de cargas peligrosas: ' . $cam5; //Texto

//Enviamos los parametros a la Función para generar código QR 
QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
