<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JuegosCategoria */

$this->title = 'Create Juegos Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Juegos Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="juegos-categoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
