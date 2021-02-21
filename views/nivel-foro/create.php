<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NivelForo */

$this->title = 'Crear Nivel Foro';
//permite configurar los breadcrumbs en la vista 
$this->params['breadcrumbs'][] = ['label' => 'Nivel Foros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nivel-foro-create">
    <!--Muestra la vista de formCreate-->
    <?= $this->render('formCreate', [
        'model' => $model,
    ]) ?>

</div>
