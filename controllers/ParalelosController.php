<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use app\models\Jornadas;
use app\models\Niveles;
use app\models\Paralelos;
use app\models\Sedes;
use app\models\SedesJornadas;
use app\models\SedesNiveles;
use app\models\Estados;



/**
 * ParalelosController implements the CRUD actions for Paralelos model.
 */
class ParalelosController extends Controller
{
			
	
	
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
	 /**
     * Muestra los paralelos 
     * @return mixed
     */	
	public function actionListarInstituciones( $idInstitucion = 0, $idSedes = 0 )
    {
        return $this->render('listarInstituciones',[
			'idSedes' 		=> $idSedes,
			'idInstitucion' => $idInstitucion,
		] );
    }
	
    /**
     * Lists all Paralelos models.
     * @return mixed
     */
    public function actionIndex($idInstitucion = 0, $idSedes = 0)
    {
		// Si existe id sedes e institución se muestra la listas de todas las jornadas correspondientes
		if( $idInstitucion != 0 && $idSedes != 0 )
		{	
			$estados = new Estados();
			$estados = $estados->find()->all();
			$estados = ArrayHelper::map( $estados, 'id', 'descripcion' );
	
	
	
			$idParalelos[]=0;
			$connection = Yii::$app->getDb();
			$command = $connection->createCommand("
			SELECT p.id
			FROM public.sedes_jornadas as sj, public.jornadas as j, public.sedes as s,public.paralelos as p, public.niveles as n, public.sedes_niveles as sn
			where sj.id_jornadas = j.id
			and sj.id_sedes = s.id
			and s.id  = $idSedes
			and sj.id = p.id_sedes_jornadas
			and s.id  = sn.id_sedes
			and sn.id = p.id_sedes_niveles
			and n.id  = sn.id_niveles");
			$result = $command->queryAll();
			
			
			foreach( $result as $j)
			{
				$idParalelos[] = $j['id'];

			}

			$dataProvider = new ActiveDataProvider([
				'query' => Paralelos::find()->where('id IN ('.implode(',',$idParalelos).')')->andwhere('estado=1'),
			]);

			return $this->render('index', [
				'dataProvider' 	=> $dataProvider,
				'idSedes' 		=> $idSedes,
				'idInstitucion' => $idInstitucion,
				'estados'		=> $estados,
			]);
		}
		else
		{
			// Si el id de institucion o de sedes es 0 se llama a la vista listarInstituciones
			 return $this->render('listarInstituciones',[
				'idSedes' 		=> $idSedes,
				'idInstitucion' => $idInstitucion,
			] );
		}
    }

    /**
     * Displays a single Paralelos model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
		$estados = new Estados();
		$estados = $estados->find()->all();
		$estados = ArrayHelper::map( $estados, 'id', 'descripcion' );
	
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("
		SELECT j.descripcion
		FROM public.paralelos as p, public.sedes_jornadas as sj, public.jornadas as j
		where p.id_sedes_jornadas = sj.id
		and sj.id_jornadas = j.id
		and p.id=$id");
		$result = $command->queryAll();
		$jornadas = $result[0]['descripcion'];
		
		$command = $connection->createCommand("
		SELECT n.descripcion
		FROM public.paralelos as p, public.sedes_niveles as sn, public.niveles as n
		where p.id_sedes_niveles = sn.id
		and sn.id_niveles = n.id
		and p.id=$id");
		$result = $command->queryAll();
		$niveles = $result[0]['descripcion'];
		

        return $this->render('view', [
            'model' => $this->findModel($id),
			'jornadas' => $jornadas,
			'niveles' => $niveles,
			'estados' => $estados,

        ]);
    }

    /**
     * Creates a new Paralelos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idSedes, $idInstitucion)
    {
		
		
		$estados = new Estados();
		$estados = $estados->find()->where('id=1')->all();
		$estados = ArrayHelper::map($estados,'id','descripcion');
		
			//Busco todas las jornadas disponibles
		$SedesJornadas 	= new SedesJornadas();
		$SedesJornadas	= $SedesJornadas->find()->all();
		$SedesJornadas	= ArrayHelper::map( $SedesJornadas, 'id', 'id_jornadas' );
		
		//listo solo la sede que ya ha sido seleccionada desde la vista listarInstituciones
		$SedesNiveles 	= new SedesNiveles();
		$SedesNiveles	= $SedesNiveles->find()->all();
		$SedesNiveles	= ArrayHelper::map( $SedesNiveles, 'id', 'id_niveles' );
		
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("
			SELECT sj.id, j.descripcion
			FROM public.sedes_jornadas as sj, public.jornadas as j, public.sedes as s
			where sj.id_jornadas = j.id
			and sj.id_sedes = s.id
			and s.id = $idSedes
		");
		$result = $command->queryAll();
			foreach ($result as $r)
		{
			$jornadas[$r['id']]=$r['descripcion'];
		}
		
		$command = $connection->createCommand("
			SELECT sn.id, n.descripcion
			FROM public.sedes_niveles as sn, public.niveles as n, public.sedes as s
			where sn.id_niveles = n.id
			and sn.id_sedes = s.id
			and s.id = $idSedes");
		$result = $command->queryAll();
				
		
		foreach ($result as $r)
		{
			$niveles[$r['id']]=$r['descripcion'];
		}
			
        $model = new Paralelos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
			'jornadas'=> $jornadas,
			'niveles'=>$niveles,
			'estados'=>$estados,
        ]);
    }

    /**
     * Updates an existing Paralelos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		
		
		$estados = new Estados();
		$estados = $estados->find()->all();
		$estados = ArrayHelper::map( $estados, 'id', 'descripcion' );
		
		$SedeJornadas 		 	= new SedesJornadas();
		$SedeJornadas		 	= $SedeJornadas->find()->all();
		$SedeJornadas	 	 	= ArrayHelper::map( $SedeJornadas, 'id','id_jornadas');
		
		$SedesNiveles 		 	= new SedesNiveles();
		$SedesNiveles		 	= $SedesNiveles->find()->all();
		$SedesNiveles	 	 	= ArrayHelper::map( $SedesNiveles, 'id','id_niveles');
		
		$connection = Yii::$app->getDb();
		
		$command = $connection->createCommand
		("
			SELECT sj.id_sedes
			FROM public.paralelos as p, public.sedes_jornadas as sj
			WHERE p.id_sedes_jornadas = sj.id
			and p.id=$id
		");		
		$result = $command->queryAll();
		
		$idSedes = $result[0]['id_sedes'];
		
		$command = $connection->createCommand("
			SELECT sj.id, j.descripcion
			FROM public.sedes_jornadas as sj, public.jornadas as j, public.sedes as s
			where sj.id_jornadas = j.id
			and sj.id_sedes = s.id
			and s.id = $idSedes
		");
		$result = $command->queryAll();
			foreach ($result as $r)
		{
			$jornadas[$r['id']]=$r['descripcion'];
		}
		
		$command = $connection->createCommand("
			SELECT sn.id, n.descripcion
			FROM public.sedes_niveles as sn, public.niveles as n, public.sedes as s
			where sn.id_niveles = n.id
			and sn.id_sedes = s.id
			and s.id = $idSedes");
		$result = $command->queryAll();
				
		
		foreach ($result as $r)
		{
			$niveles[$r['id']]=$r['descripcion'];
		}
			
	    $model = $this->findModel($id);
				
				
			
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
		

        return $this->render('update', [
            'model' => $model,
			'jornadas'=> $jornadas,
			'niveles'=> $niveles,
			'estados'=> $estados,
        ]);
    }

    /**
     * Deletes an existing Paralelos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
		
		$idInstitucion = 0;
		
		$model = Paralelos::findOne($id);
		$model->estado = 2;
		$idInstitucion = $model->id;
		$model->update(false);

		// $this->findModel($id)->estado=2;
		return $this->redirect(['index', 'idInstitucion' => $idInstitucion ]);
        
		
        
        // $this->findModel($id)->delete();
		// return $this->redirect(['index']);
		
		
    }

    /**
     * Finds the Paralelos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Paralelos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paralelos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
