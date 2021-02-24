<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Secciones */

$this->title = 'Create Secciones';
$this->params['breadcrumbs'][] = ['label' => 'Secciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secciones-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
