<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Juegos;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SeccionesModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Secciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secciones-index">

    <?php
        if(Yii::$app->user->identity){
            if(Yii::$app->user->identity->username == 'admin'){ 
                echo Html::a('Crear Secciones', ['create'], ['class' => 'btn btn-success']); 
            }
        }
    ?>    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'nombre',
            [
            'attribute'=>'juego_id',
            'filter'=>Juegos::lookup(),
            'value'=>function($data) {
            //return $data->juego->nombre;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
