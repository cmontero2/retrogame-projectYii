<?php

//use Yii;

use app\models\NivelForo;
use app\models\Roles;
use yii\helpers\Html;
use yii\grid\GridView;
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
                echo Html::a('Aprobar usuarios', ['aprobarusuarios'], ['class' => 'btn btn-primary', 'style'=>'margin-left: 20px']); 
            }
        }
        
        
    ?>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            ['attribute'=>'rol_id',
                'filter'=>Roles::lookup(),
                'value'=>function($data) {
                return $data->rol->nombre;
                }
            ],
            ['attribute'=>'nivel_foro_id',
                'filter'=>NivelForo::lookup(),
                'value'=>function($data) {
                return $data->nivelForo->nombre;
                }
            ],
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
