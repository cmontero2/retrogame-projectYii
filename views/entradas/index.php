<?php

use app\models\Secciones;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntradasModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Entradas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entradas-index">

    <?php
        if(Yii::$app->user->identity){
            if(Yii::$app->user->identity->username == 'admin'){ 
                echo Html::a('Crear Entradas', ['create'], ['class' => 'btn btn-success']);
                echo Html::a('Aprobar Entradas', ['aprobarentradas'], ['class' => 'btn btn-primary', 'style'=>'margin-left: 20px']); 
            }
        }
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'titulo',
            'texto:ntext',
            'fecha:date',
            [
                'attribute' => 'seccion_id',
                'filter' => Secciones::lookup(),
                'value' => function($data) {
                    return $data->seccion->nombre;
                }
            ],
            //'estado',
            //'usuario_id',
            //'seccion_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
