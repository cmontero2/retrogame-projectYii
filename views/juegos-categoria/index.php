<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Categorias;
use app\models\Juegos;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JuegosCategoriaModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Juegos Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="juegos-categoria-index">

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
            [
                'attribute'=>'categoria_id',
                'filter'=>Categorias::lookup(),
                'value'=>function($data) {
                return $data->categoria->nombre;
                }
            ],

            [
                'attribute'=>'juego_id',
                'filter'=>Juegos::lookup(),
                'value'=>function($data) {
                return $data->juego->nombre;
                }
            ],

            [
                'attribute'=>'usuario_id',
                'filter'=>Usuarios::lookup(),
                'value'=>function($data) {
                return $data->usuario->user;
                }
            ],
            //'id',
            //'categoria_id',
            //'juego_id',
            //'usuario_id',           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
