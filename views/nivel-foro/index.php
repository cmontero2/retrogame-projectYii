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
        //si estamos logueados como admin, saldrá el boton de crear un nuevo registro
        if(Yii::$app->user->identity){
            if(Yii::$app->user->identity->username == 'admin'){ 
                echo Html::a('Crear Nivel Foro', ['create'], ['class' => 'btn btn-success']);
            }
        }
    ?>

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
