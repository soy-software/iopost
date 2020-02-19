<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


    <style>
        table {
            border-collapse: collapse;
            width: 100%
        }

        table, th, td {
            border: 1px solid black;
            text-align: center;
        }
        .noBorder {
            border:none !important;
        }
        div.page{
            page-break-after: always;
            page-break-inside: avoid;
        }

    </style>
</head>
<body>
    <table style="border-collapse: collapse; border: none;">
        <tr>
            <td class="noBorder">
                <img src="{!! public_path('img/utc.png') !!}" alt="" width="120px;" style="text-align: right;">
            </td>
            <td class="noBorder">
                <h4 style="text-align: center;">
                    UNIVERSIDAD TÉCNICA DE COTOPAXI <br>
                    POSGRADO
                </h4>
            </td>
            <td class="noBorder">

                <img src="{!! public_path('img/posgrado.jpeg') !!}" alt="" width="120px;" style="text-align: right;">
            </td>
        </tr>
    </table>
    <hr>
</body>
</html>

