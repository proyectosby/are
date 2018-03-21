<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Usuario</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
					['label' => 'Inicio', 'options' => ['class' => 'header']],
				    [
                                'label' => 'Instituciones',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    [
                                        'label' => 'Académico',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Institución educativa',
											'icon' => 'circle-o',
											'url' => '#',
											'items' => [
												['label' => 'Matricular Estudiante', 'icon' => 'circle-o', 'url' => ['estudiantes/index'],],
												['label' => 'Pruebas saber','icon' => 'circle-o','url' => '#',],
												['label' => 'Investigación','icon' => 'circle-o','url' => '#',],
												['label' => 'Rangos calificación','icon' => 'circle-o','url' => ['rangos-calificacion/index'],],
												['label' => 'Ponderación resultados','icon' => 'circle-o','url' => ['ponderacion-resultados/index'],],
												['label' => 'Estadisticas','icon' => 'circle-o','url' => '#',],
												['label' => 'Reportes','icon' => 'circle-o','url' => '#',],
											],						
											
											
											], // 
                                        ],//
                                    ],
									 [
                                        'label' => 'Servicios',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Transporte', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Alimentación', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Soporte y apoyo académco', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
									[
                                        'label' => 'Administrativo',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                         'items' => [
                                            ['label' => 'Institución educativa',
											'icon' => 'circle-o',
											'url' => '',
											'items' => [
												['label' => 'Instituciones','icon' => 'circle-o','url' => ['instituciones/index'],],
												['label' => 'Sedes','icon' => 'circle-o','url' => ['sedes/index'],],
												['label' => 'Aulas','icon' => 'circle-o','url' => ['aulas/index'],],
												['label' => 'Jornadas','icon' => 'circle-o','url' => ['jornadas/index'],],
												['label' => 'Sedes - Jornadas','icon' => 'circle-o','url' => ['sedes-jornadas/index'],],
												['label' => 'Sedes - Niveles','icon' => 'circle-o','url' => ['sedes-niveles/index'],],
												['label' => 'Periodos','icon' => 'circle-o','url' => ['periodos/index'],],
												['label' => 'Asignaturas','icon' => 'circle-o','url' =>  ['asignaturas/index'],],
												['label' => 'Áreas enseñanza','icon' => 'circle-o','url' => ['sedes-areas-ensenanza/index'],],
												['label' => 'Niveles','icon' => 'circle-o','url' => ['niveles/index'],],
												['label' => 'Bloques por sede','icon' => 'circle-o','url' => ['sedes-bloques/index'],],
												['label' => 'Grupos por nivel','icon' => 'circle-o','url' => ['paralelos/index'],],
												['label' => 'Distribución académica', 'icon' => '', 'url' => ['distribuciones-academicas/index'],],
												['label' => 'Asignatura niveles', 'icon' => '', 'url' => ['asignaturas-niveles-sedes/index'],],
										        ['label' => 'Director de grupo', 'icon' => '', 'url' => '#',],
												['label' => 'Docente de grupo', 'icon' => '', 'url' => '#',],
												
													
												
											],						
											
											
											], // 
                                        ],//
                                    ],
									[
                                        'label' => 'Participación en proyectos',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Por institución', 'icon' => 'circle-o', 'url' => '#'],
                                            ['label' => 'Por maestro o directivo', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Proyectos jornada compleentaria', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
							

                   [
						'label' => 'Personas',
						'icon' => 'circle-o',
						'url' => '#',
						'items' => [
							[
                                        'label' => 'Personas',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Datos generales', 'icon' => 'circle-o', 'url' => ['personas/index'],],
                                            ['label' => 'Formaciones', 'icon' => 'circle-o', 'url' => ['personas-formaciones/index'],],
                                            ['label' => 'Discapacidades', 'icon' => 'circle-o', 'url' => ['personas-discapacidades/index'],],
                                            ['label' => 'Escolaridades', 'icon' => 'circle-o', 'url' => ['personas-escolaridades/index'],],
                                            ['label' => 'Reconocimientos', 'icon' => 'circle-o', 'url' => ['reconocimientos/index'],],
                                        ],
                                    ],
							
							
							
							['label' => 'Docentes', 
							'icon' => 'circle-o',
							'url' => '#',
							 'items' => [
                                            ['label' => 'Docentes', 'icon' => 'circle-o', 'url' => ['docentes/index'],],
                                            ['label' => 'Docentes areas trabajo', 'icon' => 'circle-o', 'url' => ['docentes-x-areas-trabajos/index'],],
											['label' => 'Evaluación', 'icon' => 'circle-o', 'url' => ['evaluacion-docentes/index'],],
											['label' => 'Vinulación', 'icon' => 'circle-o', 'url' => ['vinculacion-docentes/index'],],
											['label' => 'Horario', 'icon' => 'circle-o', 'url' => '#',],
											['label' => 'Indicadores desempeño', 'icon' => 'circle-o', 'url' => ['indicador-desempeno/index'],],
											['label' => 'Plan de aula', 'icon' => 'circle-o', 'url' => ['plan-de-aula/index'],],
											['label' => 'Calificaciones', 'icon' => 'circle-o', 'url' => ['calificaciones/index'],],
											['label' => 'Asistencias', 'icon' => 'circle-o', 'url' => ['plan-de-aula/index'],],
                                            
                                            
                                            
                                        ],
							],
							
							
							['label' => 'Estudiantes',
							'icon' => 'circle-o',
							'url' => '#',
							 'items' => [
                                            ['label' => 'Estudiantes', 'icon' => 'circle-o', 'url' => ['representantes-legales/index'],],
											['label' => 'Horario', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
							
							],
						],
					],
					
					
					
                    // ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                        // 'label' => 'Some tools',
                        // 'icon' => 'share',
                        // 'url' => '#',
                        // 'items' => [
                            // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            // [
                                // 'label' => 'Level One',
                                // 'icon' => 'circle-o',
                                // 'url' => '#',
                                // 'items' => [
                                    // ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    // [
                                        // 'label' => 'Level Two',
                                        // 'icon' => 'circle-o',
                                        // 'url' => '#',
                                        // 'items' => [
                                            // ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            // ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        // ],
                                    // ],
                                // ],
                            // ],
                        // ],
                    // ],
                ],
            ]
        ) ?>

    </section>

</aside>
