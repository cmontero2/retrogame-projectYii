<?php

//use Yii;
use app\models\Roles;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Usuarios;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        if(Yii::$app->user->identity){
            if(Yii::$app->user->identity->username == 'admin'){ 
                echo Html::a('Crear Usuarios', ['create'], ['class' => 'btn btn-success']); 
            }
        }
        
        
    ?>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            ['attribute'=>'rol_id',
                'filter'=>Roles::lookup(),
                'value'=>function($data) {
                return $data->rol->nombre;
                }
            ],
            'nivel_foro_id',
            'user',
            'nombre',
            //'contraseña',
            //'email:email',
            //'nacimiento',
            //'estado',
            //'poblacion',
            //'CIF',
            //'direccion',
            //'telefono',
            //'token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
