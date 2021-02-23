<?php

namespace app\controllers;

use Yii;
use app\models\Entradas;
use app\models\EntradasModelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EntradasController implements the CRUD actions for Entradas model.
 */
class EntradasController extends Controller
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
                        'actions' => ['aprobarentradas'],
                        'matchCallback' => function ($rule, $action) {
                            return  Yii::$app->user->identity->usuario == "admin"; 
                        }
                    ],            
 
                ],
            ],
        ];
    }

    /**
     * Lists all Entradas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntradasModelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Entradas model.
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
     * Creates a new Entradas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Entradas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Entradas model.
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
     * Deletes an existing Entradas model.
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
     * Finds the Entradas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Entradas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Entradas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAprobarentradas(){
        
        if(isset($_POST['idsel'])){
            $idsel = $_POST['idsel'];
        
              
            foreach (Entradas::findAll($idsel) as $entrada) {
                $entrada->estado = 'A';
                
                if (!$entrada->save()) {
                    throw new NotFoundHttpException(Yii::t('app', 'Error al guardar'));
                }
                
            }  
                     
            $this->redirect(['index']);
        } else {

            $searchModel = new EntradasModelSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, false, 1);
            return $this->render('administrar', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionLookup($term) {
        $results = [];
        foreach (Entradas::find()->andwhere("(titulo like :q )", [':q' => '%' . $term . '%'])->asArray()->all() as $model) {
             $results[] = [
                'id' => $model['id'],
                'label' => $model['titulo'],
             ];
        return \yii\helpers\Json::encode($results);
     }
    }
}
