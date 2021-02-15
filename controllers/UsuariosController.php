<?php

namespace app\controllers;

use Yii;
use app\models\Usuarios;
use app\models\UsuariosModelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller
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
                    
                    ['allow' => true,
                     'actions' => ['delete', 'update', 'create'],
                     'matchCallback' => function ($rule, $action) {
                                           return !Yii::$app->user->isGuest;
                                        }
 
                    ],
                    [
                        
                        //permite aprobar entradas solo a administrador            
                        'allow' => true,
                        'actions' => ['aprobarusuarios'],
                        'matchCallback' => function ($rule, $action) {
                            return  Yii::$app->user->identity->usuario == "admin"; 
                        }
                    ],            
 
                ],
            ],
        ];
    }

    /**
     * Lists all Usuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Usuarios();
        $searchModel = new UsuariosModelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Usuarios model.
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
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuarios();
        $model->token = bin2hex(random_bytes(5));
        $model->estado = 'P';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuarios model.
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
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuarios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Aprueba usuarios
     */
    public function actionAprobarusuarios(){
        //guardo los post de los check si existen y si no, será 0
        if(isset($_POST['idselec'])){
            $idselec = $_POST['idselec'];
        } else {
            $idselec = 0;
        }

        //si existen checkboxes activos
        if ($idselec != 0) {
            $idselec = (array)Yii::$app->request->post('idselec');

            foreach (Usuarios::findAll($idselec) as $usuario) {
                $usuario->estado = 'P';
                if (!$usuario->save()) {
                    throw new NotFoundHttpException(Yii::t('app', 'Error al guardar'));
                }
            }
            $this->redirect(['index']);
        } else {
            $searchModel = new UsuariosModelSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, false, 1);
            return $this->render('administrar', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }
}
