<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Juegos;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosJuegoModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios Juegos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-juego-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        if(Yii::$app->user->identity){
            if(Yii::$app->user->identity->username == 'admin'){ 
                echo Html::a('Crear Usuarios Juego', ['create'], ['class' => 'btn btn-success']);
            }
        }
    ?>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute'=>'juego_id',
                'filter'=>Juegos::lookup(),
                'value'=>function($data) {
                return $data->juegos->nombre;
                }
            ],
            ['attribute'=>'usuario_id',
                'filter'=>Usuarios::lookup(),
                'value'=>function($data) {
                return $data->usuario->user;
                }
            ],
            'fecha_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
