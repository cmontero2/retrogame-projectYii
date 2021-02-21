<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosJuego */

$this->title = 'Crear Usuario Juego';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Juegos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-juego-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
