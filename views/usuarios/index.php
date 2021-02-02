<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Usuarios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'rol_id',
            'nivel_foro_id',
            'user',
            'nombre',
            //'contraseña',
            //'email:email',
            //'nacimiento',
            //'estado',
            //'poblacion',
            //'CIF',
            //'direccion',
            //'telefono',
            //'token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
