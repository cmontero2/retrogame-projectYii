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

    <?php
        //solo puede crear registros de juegos, el administrador
        if(Yii::$app->user->identity){
            if(Yii::$app->user->identity->username == 'admin'){ 
                echo Html::a('Crear Usuarios Juego', ['create'], ['class' => 'btn btn-success']);
            }
        }
    ?>
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //muestra el nombre del juego y no su id
            ['attribute'=>'juego_id',
                'filter'=>Juegos::lookup(),
                'value'=>function($data) {
                return $data->juegos->nombre;
                }
            ],
            //muestra el nombre de usuario y no su id
            ['attribute'=>'usuario_id',
                'filter'=>Usuarios::lookup(),
                'value'=>function($data) {
                return $data->usuario->user;
                }
            ],
            'fecha_id:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
