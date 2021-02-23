<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntradasModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Entradas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entradas-index">

    <h1><?= Html::encode($this->title) ?></h1>

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

            'id',
            'titulo',
            'texto:ntext',
            'fecha',
            'estado',
            //'usuario_id',
            //'seccion_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
