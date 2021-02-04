<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosJuegoModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios Juegos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-juego-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Usuarios Juego', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'juego_id',
            'usuario_id',
            'fecha_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
