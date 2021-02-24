<?php

use app\models\Usuarios;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JuegosModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Juegos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="juegos-index">

    <?php
        if(Yii::$app->user->identity) {
            if(Yii::$app->user->identity->username == 'admin') {
                echo Html::a('Create Juegos', ['create'], ['class' => 'btn btn-success']);
                echo Html::a('Aceptar Juegos', ['aceptarjuegos'], ['class' => 'btn btn-primary', 'style'=>'margin-left: 20px']);
            }
        }
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'nombre',
            'descripcion',
            'visitas',
            [
                'attribute' => 'empresa_id',
                'filter' => Usuarios::lookup(),
                'value' => function($data) {
                    return $data->usuariosNombre;
                }
            ],
            'estado',
            //'nombre_archivo',
            //'empresa_id',
            //'id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
