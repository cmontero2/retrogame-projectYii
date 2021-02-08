<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Roles;

/* @var $this yii\web\View */
/* @var $model app\models\Roles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="roles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->dropDownList(Roles::lookup(),['prompt'=>'Seleccione...', 'style'=>'width:15%']); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
