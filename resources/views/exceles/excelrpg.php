<?php
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename= librorpg.xls");
?>

<?php
include 'conexion.php';
$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$operador = $_REQUEST['operador'];
$fechainicio = $_REQUEST['fechainicio'];
$fechafinal = $_REQUEST['fechafinal'];

$consulta = mysqli_query($conexion, "SELECT * FROM manifiesto INNER JOIN manifiestodet ON manifiesto.id_manifiesto = manifiestodet.id_manifies
    WHERE rpg != '' and gener_nom = '$operador' AND fecha_alta_manif >= '$fechainicio' and fecha_alta_manif <= '$fechafinal' ORDER BY id_manifies");
mysqli_set_charset($conexion, "utf8");

mysqli_set_charset($conexion, "utf8");
?>
<table border=1 bgcolor="white" align="center">
    <tr>
        <th colspan=10 class="titulos"><b>CERTIFICADOS DE RPG DE: <?php echo $operador; ?></b></th>
    </tr>
    <tr>
        <th class="titulos"><b class="titulos2">RPG</b></th>
        <th class="titulos"><b class="titulos2">NUM. CERT. RPG</b></th>
        <th class="titulos"><b class="titulos2">GENERADOR</b></th>
        <th class="titulos"><b class="titulos2">CERTIF. DISP. FINAL</b></th>
        <th class="titulos"><b class="titulos2">MANIFIESTO SALIDA</b></th>
        <th class="titulos"><b class="titulos2">NUM. MANIFIESTO</b></th>
        <th class="titulos"><b class="titulos2">FECHA ALTA</b></th>
        <th class="titulos"><b class="titulos2">TIPO CORRIENTE</b></th>
        <th class="titulos"><b class="titulos2">TRANSPORTISTA</b></th>
        <th class="titulos"><b class="titulos2">ESTADO</b></th>
    </tr>

    <?php
    while ($fila = mysqli_fetch_array($consulta)) { ?>
        <tr>
            <td class="titulos3"><?php echo $fila['rpg']; ?></td>
            <td class="titulos3"><?php echo $fila['nro_cert_rpg']; ?></td>
            <td class="titulos3"><?php echo $fila['nom_comp']; ?></td>
            <td class="titulos3"><?php echo $fila['nro_cert_disp_final']; ?></td>
            <td class="titulos3"><?php echo $fila['id_man_tra_nac']; ?></td>
            <td class="titulos3"><?php echo $fila['id_manifies']; ?></td>
            <td class="titulos3"><?php echo date("d-m-Y", strtotime($fila['fecha_alta_manif'])); ?></td>
            <td class="titulos3"><?php echo $fila['id_corrientes']; ?></td>
            <td class="titulos3"><?php echo $fila['id_transpo']; ?></td>
            <td class="titulos3"><?php echo $fila['estadoo']; ?></td>
        </tr>
    <?php } ?>

</table>