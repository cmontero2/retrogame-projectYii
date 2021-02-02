<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Secciones */

$this->title = 'Update Secciones: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Secciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="secciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
