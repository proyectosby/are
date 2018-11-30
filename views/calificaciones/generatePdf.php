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

            .info_calificacion tr,td {
                text-align: left;
                padding: 10px;
                border-bottom: 1px solid #7a7a7a;
                border-top: 1px solid #7a7a7a;
            }

            .calificacion tr,
            .calificacion td{
                text-align: left;
                padding: 8px;
                border: 1.5px solid black;
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
                <table class="table table-striped info_calificacion">
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
                                Doncente de asignatura: <?= $docente ?>

                            </td>
                            <td>FA: 2 -- IHS: 4 -- 3.0 - Basico</td>
                        </tr>
                        <tr>
                            <td colspan = 3>Saber Hacer</td>
                            <td>2.8 - Bajo</td>
                        </tr>
                        <tr>
                            <td colspan = 4>+ <?= $materia->observacion_hacer ?></td>
                        </tr>
                        <tr>
                            <td colspan = 3>Saber Ser</td>
                            <td>2.8 - Bajo</td>
                        </tr>
                        <tr>
                            <td colspan = 4>+ <?= $materia->observacion_saber ?></td>
                        </tr>
                        <tr>
                            <td colspan = 3>Saber Conocer</td>
                            <td>2.8 - Bajo</td>
                        </tr>
                        <tr>
                            <td colspan = 4>+ <?= $materia->observacion_conocer ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>


                <table class="calificacion">
                    <tbody>
                    <tr>
                        <td rowspan="2">AREA / ASIGNATURA</td>
                        <td rowspan="2">IHS</td>
                        <td colspan = "2">P1</td>
                        <td colspan = "2">P2</td>
                        <td colspan = "2">P3</td>
                        <td rowspan="2">FA / RE</td>
                        <td rowspan="2">DEF</td>
                    </tr>
                    <tr>
                        <td>VAL</td>
                        <td>SUP</td>
                        <td>VAL</td>
                        <td>SUP</td>
                        <td>VAL</td>
                        <td>SUP</td>
                    </tr>

                    <?php foreach ($calificaciones AS $key => $calificacion): ?>
                        <tr>
                            <td><?= $calificacion['materia'] ?></td>
                            <td>0</td>
                            <?php if($calificacion['id_periodo'] == 1) : ?>
                                <td><?= substr( $calificacion['calificacion'] , 0, 4);?></td>
                            <?php endif; ?>
                            <?php if($calificacion['id_periodo'] == 2) : ?>
                                <td><?= substr( $calificacion['calificacion'] , 0, 4);?></td>
                            <?php endif; ?>
                            <?php if($calificacion['id_periodo'] == 3) : ?>
                                <td><?= substr( $calificacion['calificacion'] , 0, 4);?></td>
                            <?php endif; ?>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>