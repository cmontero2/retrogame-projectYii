<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NivelForo */

$this->title = 'Crear Nivel Foro';
$this->params['breadcrumbs'][] = ['label' => 'Nivel Foros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nivel-foro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
