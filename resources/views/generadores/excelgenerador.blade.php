<?php
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename= librogeneradores.xls");
?>

<?php
$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");


$consulta = mysqli_query($conexion, "SELECT * FROM manifiesto INNER JOIN manifiestodet ON manifiesto.id_manifiesto = manifiestodet.id_manifies
    WHERE nom_comp = '$generador' AND fecha_alta_manif >= '$fechainicio' and fecha_alta_manif <= '$fechafinal' ORDER BY id_manifiesto");
mysqli_set_charset($conexion, "utf8");
?>

<table border=1 bgcolor="white" align="center">
    <tr>
        <th colspan=16 class="titulos"><b>LIBRO POR GENERADOR: <?php echo $generador; ?></b></th>
    </tr>
    <tr>
        <th class="titulos"><b class="titulos2">GENERADOR</b></th>
        <th class="titulos"><b class="titulos2">NUM. MANIFIESTO</b></th>
        <th class="titulos"><b class="titulos2">FECHA ALTA</b></th>
        <th class="titulos"><b class="titulos2">EMPRESA TRANSPORTE</b></th>
        <th class="titulos"><b class="titulos2">NUM. PATENTE</b></th>
        <th class="titulos"><b class="titulos2">CHOFER</b></th>
        <th class="titulos"><b class="titulos2">OPERADORA</b></th>
        <th class="titulos"><b class="titulos2">ESTADO PEDIDO</b></th>
        <th class="titulos"><b class="titulos2">TIPO CTE</b></th>
        <th class="titulos"><b class="titulos2">UM</b></th>
        <th class="titulos"><b class="titulos2">CANTIDAD</b></th>
        <th class="titulos"><b class="titulos2">MANIFIESTO SALIDA</b></th>
        <th class="titulos"><b class="titulos2">CERTIF. DISP. FINAL</b></th>
        <th class="titulos"><b class="titulos2">RPG</b></th>
        <th class="titulos"><b class="titulos2">NUMERO</b></th>
        <th class="titulos"><b class="titulos2">ESTADO</b></th>
    </tr>

    <?php
    while ($fila = mysqli_fetch_array($consulta)) { ?>
        <tr>
            <td class="titulos3"><?php echo $fila['nom_comp']; ?></td>
            <td class="titulos3"><?php echo $fila['id_manifiesto']; ?></td>
            <td class="titulos3"><?php echo date("d-m-Y", strtotime($fila['fecha_alta_manif'])); ?></td>
            <td class="titulos3"><?php echo $fila['id_transp']; ?></td>
            <td class="titulos3"><?php echo $fila['id_patente']; ?></td>
            <td class="titulos3"><?php echo $fila['chofer']; ?></td>
            <td class="titulos3"><?php echo $fila['gener_nom']; ?></td>
            <td class="titulos3"><?php echo utf8_decode($fila['estado_det_manif']); ?></td>
            <td class="titulos3"><?php echo $fila['id_corrientes']; ?></td>
            <td class="titulos3"><?php echo $fila['um']; ?></td>
            <td class="titulos3"><?php echo $fila['cantidad']; ?></td>
            <td class="titulos3"><?php echo $fila['id_man_tra_nac']; ?></td>
            <td class="titulos3"><?php echo $fila['nro_cert_disp_final']; ?></td>
            <td class="titulos3"><?php echo $fila['rpg']; ?></td>
            <td class="titulos3"><?php echo $fila['nro_cert_rpg']; ?></td>
            <td class="titulos3"><?php echo $fila['estadoo']; ?></td>
        </tr>
    <?php } ?>

</table>