<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Roles */

$this->title = 'Actualizar Rol: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="roles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('formCreate', [
        'model' => $model,
    ]) ?>

</div>
