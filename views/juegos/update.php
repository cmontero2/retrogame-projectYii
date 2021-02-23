<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Juegos */

$this->title = 'Actualizar Juego: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Juegos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="juegos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
