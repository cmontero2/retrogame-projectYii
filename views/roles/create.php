<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Roles */

$this->title = 'Crear Roles';
//permite configurar los breadcrumbs en la vista 
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-create">
    <!--Muestra la vista de formCreate-->
    <?= $this->render('formCreate', [
        'model' => $model,
    ]) ?>

</div>
