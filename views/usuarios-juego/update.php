<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosJuego */

$this->title = 'Actualizar Usuarios Juego ';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Juegos', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="usuarios-juego-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
