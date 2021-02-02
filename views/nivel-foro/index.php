<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NivelForoModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nivel Foros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nivel-foro-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nivel Foro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'puntos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
