<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de residuos</title>

    <link rel="shortcat icon" href="{{asset('img/logo.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <style>
        td {
            font-size: 12px;
            padding: 3px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .titulos {
            text-align: center;
        }

        th {
            font-size: 12px;
            padding: 3px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>

</head>

<body>

    <table class="table">
        <thead class="border-1">
            <tr>
                <th scope="col" colspan="5">1.DATOS IDENTIFICATORIOS</th>
            </tr>
        </thead>
        <tbody class="table-group-divider border-1">
            <tr class="border-1">
                <td scope="row"></td>
                <td class="border-1 titulos">DENOMINACIÓN</td>
                <td class="border-1 titulos">C.U.I.T</td>
                <td class="border-1 titulos">RPGyOSP N°</td>
                <td class="border-1 titulos">VIGENCIA</td>
            </tr>
            <tr class="border-1">
                <td class="border-1">GENERADOR</td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
            </tr>
            <tr class="border-1">
                <td class="border-1">TRANSPORTISTAS</td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
            </tr>
            <tr class="border-1">
                <td class="border-1">OPERADOR</td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
            </tr>
        </tbody>

        <thead class="border-1">
            <tr>
                <th scope="col" colspan="5">2.TRANSPORTISTA</th>
            </tr>
        </thead>

        <tbody class="table-group-divider border-1">
            <tr class="border-1">
                <td class="border-1 titulos">VEHÍCULO</td>
                <td class="border-1 titulos">TIPO</td>
                <td class="border-1 titulos">DOMINIO</td>
                <td class="border-1 titulos">N° REG. TRANSP. CARGAS PEL</td>
                <td class="border-1 titulos">VIGENCIA</td>
            </tr>
            <tr class="border-1">
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
            </tr>
            <tr class="border-1">
                <td class="border-1" colspan="2">CONDUCTOR: </td>
                <td class="border-1" colspan="2">LIC. MERCANCIAS PELIG. CNRT N°: </td>
                <td class="border-1">VIGENCIA: </td>
            </tr>
        </tbody>

        <thead class="border-1">
            <tr>
                <th scope="col" colspan="5">3.INFORMACIÓN DE RESIDUOS</th>
            </tr>
        </thead>

        <tbody class="table-group-divider border-1">
            <tr class="border-1">
                <td class="border-1 titulos">CONTENEDORES</td>
                <td class="border-1 titulos">DESCRIPCIÓN</td>
                <td class="border-1 titulos">U.M.</td>
                <td class="border-1 titulos">ESTADO FÍSICO</td>
                <td class="border-1 titulos">CORRIENTE</td>
            </tr>
            <tr class="border-1">
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
            </tr>
            <tr class="border-1">
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
            </tr>
            <tr class="border-1">
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
            </tr>
            <tr class="border-1">
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
            </tr>
        </tbody>

        <thead class="border-1">
            <tr>
                <th scope="col" colspan="5">4.INSTRUCCIONES DE MANIPULACIÓN PARA LOS TRANSPORTISTAS</th>
            </tr>
        </thead>


        <tbody class="table-group-divider border-1">
            <tr class="border-1">
                <td colspan="2" class="border-1">COMPONENTES Y CARACTERÍSTICAS PELIGROSAS - TOXICIDAD</td>
                <td colspan="3" class="border-1">SISTEMA DE IFENTIFICACIÓN DE PELIGROSIDAD</td>
            </tr>
            <tr class="border-1">
                <td class="border-1 titulos">INHALACIÓN</td>
                <td class="border-1 titulos">DÉRMICA</td>
                <td class="border-1 titulos">ORAL</td>
                <td class="border-1">INFLAMABILIDAD: </td>
                <td class="border-1">REACTIVIDAD: </td>
            </tr>
            <tr class="border-1">
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1">TOXICIDAD: </td>
                <td class="border-1">INSTRUCCIONES: </td>
            </tr>
        </tbody>


        <thead class="border-1">
            <tr>
                <th scope="col" colspan="5">5.INSTRUCTIVOS</th>
            </tr>
        </thead>
    </table>

</body>

</html>