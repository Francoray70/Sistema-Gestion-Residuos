<?php
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename= librogeneradoresprincipales.xls");
?>

<?php
$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");

mysqli_set_charset($conexion, "utf8");
$consulta = mysqli_query($conexion, "SELECT * FROM manifiesto INNER JOIN manifiestodet ON manifiesto.id_manifiesto = manifiestodet.id_manifies 
    WHERE gener_nom = '$generador' AND fecha_alta_manif >= '$fechainicio' and estadoo != 'INICIADO' and fecha_alta_manif <= '$fechafinal' ORDER BY id_manifiesto");
?>

<table border=1 bgcolor="white" align="center">
    <tr>
        <th colspan=13 class="titulos"><b>LIBRO RUBRICADO DE: <?php echo $generador; ?></b></th>
    </tr>
    <tr>
        <th class="titulos"><b class="titulos2">NUM MANIFIESTO</b></th>
        <th class="titulos"><b class="titulos2">TRANSPORTISTA</b></th>
        <th class="titulos"><b class="titulos2">FECHA DE RECEPCION</b></th>
        <th class="titulos"><b class="titulos2">GENERADOR</b></th>
        <th class="titulos"><b class="titulos2">CORRIENTE</b></th>
        <th class="titulos"><b class="titulos2">VOLUMEN</b></th>
        <th class="titulos"><b class="titulos2">UM</b></th>
        <th class="titulos"><b class="titulos2">TIPO DE RECIPIENTE</b></th>
        <th class="titulos"><b class="titulos2">DOMINIO TPTE. LOCAL</b></th>
        <th class="titulos"><b class="titulos2">NUM MANIFIESTO SALIDA</b></th>
        <th class="titulos"><b class="titulos2">NUM CERTIF. DISP. FINAL</b></th>
        <th class="titulos"><b class="titulos2">ESTADO</b></th>
    </tr>

    <?php
    while ($fila = mysqli_fetch_array($consulta)) { ?>
        <tr>
            <td class="titulos3"><?php echo $fila['id_manifiesto']; ?></td>
            <td class="titulos3"><?php echo $fila['id_transpo']; ?></td>
            <td class="titulos3"><?php echo date("d-m-Y", strtotime($fila['fecha_alta_manif'])); ?></td>
            <td class="titulos3"><?php echo $fila['nom_comp']; ?></td>
            <td class="titulos3"><?php echo $fila['id_corrientes']; ?></td>
            <td class="titulos3"><?php echo $fila['cantidad']; ?></td>
            <td class="titulos3"><?php echo $fila['um']; ?></td>
            <td class="titulos3"><?php echo $fila['descr_ingreso']; ?></td>
            <td class="titulos3"><?php echo $fila['id_patente']; ?></td>
            <td class="titulos3"><?php echo $fila['id_man_tra_nac']; ?></td>
            <td class="titulos3"><?php echo $fila['nro_cert_disp_final']; ?></td>
            <td class="titulos3"><?php echo $fila['estadoo']; ?></td>
        </tr>
    <?php } ?>

</table>