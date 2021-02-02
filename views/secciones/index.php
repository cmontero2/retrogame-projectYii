<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SeccionesModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Secciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'juego_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
