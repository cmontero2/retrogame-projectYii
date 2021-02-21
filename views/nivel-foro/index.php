<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NivelForoModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nivel Foro';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nivel-foro-index">
    <?php
        if(Yii::$app->user->identity){
            if(Yii::$app->user->identity->username == 'admin'){ 
                echo Html::a('Crear Nivel Foro', ['create'], ['class' => 'btn btn-success']);
            }
        }
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'nombre',
            'puntos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
