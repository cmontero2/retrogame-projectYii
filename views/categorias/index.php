<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriasModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        if(Yii::$app->user->identity){
            if(Yii::$app->user->identity->username == 'admin'){   
                echo Html::a('Crear Categorias', ['create'], ['class' => 'btn btn-success']); 
            }
        }
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'id',
            'nombre',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn'], //ocultar
        ],
    ]); ?>


</div>
