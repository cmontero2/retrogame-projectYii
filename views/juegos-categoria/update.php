<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JuegosCategoria */

$this->title = 'Update Juegos Categoria: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Juegos Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="juegos-categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
