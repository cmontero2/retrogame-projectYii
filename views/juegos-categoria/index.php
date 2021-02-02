<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JuegosCategoriaModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Juegos Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="juegos-categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        if(Yii::$app->user->identity){
            if(Yii::$app->user->identity->username == 'admin'){ 
                echo Html::a('Crear Juegos Categoria', ['create'], ['class' => 'btn btn-success']);
            }
        }
    ?>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'categoria_id',
            'juego_id',
            'usuario_id',           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
