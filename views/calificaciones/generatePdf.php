<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            @page {
                margin: 15px;
            }
            html{

                padding: 10px;
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }
        </style>
    </head>
    <body>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title panel-title-lender">Institucion Educatica: <?= $institucion ?></h3>
                <!--<h3 class="panel-title panel-title-lender">Sede:</h3>-->
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th colspan = 3 >Estudiante: <span><?= $estudiante ?></span></th>
                        <th>Grupo: <span><?= $paralelo ?></span></th>
                    </tr>
                    <tr>
                        <th colspan = 3 >Dir. Grupo: <span><?= $docente ?></span></th>
                        <th>Fecha</th>
                    </tr>
                    <tr>
                        <th colspan = 3 >Calificación</th>
                        <th>Val- Desempeño</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($asignaturas AS $key => $materia): ?>
                        <?php $nombreM = \app\models\Asignaturas::findOne($materia->id_asignatura); ?>
                        <tr>
                            <td>
                                <?= $nombreM->descripcion ?>
                                <br>
                                Doncente de asignatura:

                            </td>
                            <td>FA: 2 -- IHS: 4 -- 3.0 - Basico</td>
                        </tr>
                        <tr>
                            <th colspan = 3>Saber Hacer</th>
                            <td>2.8 - Bajo</td>
                        </tr>
                        <tr>
                            <td colspan = 4>+ <?= $materia->observacion_hacer ?></td>
                        </tr>
                        <tr>
                            <th colspan = 3>Saber Ser</th>
                            <td>2.8 - Bajo</td>
                        </tr>
                        <tr>
                            <td colspan = 4>+ <?= $materia->observacion_saber ?></td>
                        </tr>
                        <tr>
                            <th colspan = 3>Saber Conocer</th>
                            <td>2.8 - Bajo</td>
                        </tr>
                        <tr>
                            <td colspan = 4>+ <?= $materia->observacion_conocer ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>