<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NivelForo */

$this->title = 'Actualizar Nivel Foro: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Nivel Foros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="nivel-foro-update">

    <?= $this->render('formCreate', [
        'model' => $model,
    ]) ?>

</div>
