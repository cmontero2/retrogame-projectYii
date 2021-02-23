<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Entradas;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComentariosModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comentarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentarios-index">

    <?php
        if(Yii::$app->user->identity){
            if(Yii::$app->user->identity->username == 'admin'){ 
                echo Html::a('Crear Comentarios', ['create'], ['class' => 'btn btn-success']); 
            }
        }
    ?>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'texto',
            'fecha',
            [
                'attribute' => 'entrada_id',
                
                'value' => function($data) {
                    return $data->entrada->titulo;
                }
            ],

            [
                'attribute' => 'usuario_id',
                'filter' => Usuarios::lookup(),
                'value' => function($data) {
                    return $data->usuario->user;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
