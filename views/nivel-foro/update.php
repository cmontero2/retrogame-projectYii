<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NivelForo */

$this->title = 'Actualizar Nivel Foro: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Nivel Foros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nivel-foro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('formCreate', [
        'model' => $model,
    ]) ?>

</div>
