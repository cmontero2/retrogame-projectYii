<?php

namespace app\controllers;

use Yii;
use app\models\Juegos;
use app\models\JuegosModelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * JuegosController implements the CRUD actions for Juegos model.
 */
class JuegosController extends Controller
{
    /**
     * {@inheritdoc}
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

            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','delete','update'],
                'rules' => [
                    
                    [
                        'allow' => true,
                        'actions' => ['delete', 'update', 'create'],
                        'matchCallback' => function ($rule, $action) {
                                            return !Yii::$app->user->isGuest;
                                            }
 
                    ],
                    [
                                   
                        'allow' => true,
                        'actions' => ['aprobarjuegos'],
                        'matchCallback' => function ($rule, $action) {
                            return  Yii::$app->user->identity->usuario == "admin"; 
                        }
                    ],            
 
                ],
            ],
        ];
    }

    /**
     * Lists all Juegos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JuegosModelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Juegos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Juegos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Juegos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Juegos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Juegos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Juegos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Juegos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Juegos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLookup($term) {
        $results = [];
        foreach (Juegos::find()->andwhere("(nombre like :q )", [':q' => '%' . $term . '%'])->asArray()->all() as $model) {
             $results[] = [
                'id' => $model['id'],
                'label' => $model['nombre'],
             ];
        return \yii\helpers\Json::encode($results);
     }
    }

    public function actionAceptarjuegos() {

        if(isset($_POST['ids'])) {
            $ids = $_POST['ids'];

            foreach(Juego::findAll($ids) as $juego) {
                $juego->estado = 'A';

                if(!$juego->save()) {
                    throw new NotFoundHttpException(Yii::t('app', 'Error al guardar'));
                }
            }

            $this->redirect(['index']);
        } else {
            $searchModel = new JuegosModelSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, false, 1);
            return $this->render('administrar', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }
}
