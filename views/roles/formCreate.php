<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Roles;

/* @var $this yii\web\View */
/* @var $model app\models\Roles */
/* @var $form yii\widgets\ActiveForm */
?>
<!--Vista que se utiliza para la creación de roles. 
Se creó una diferente al form porque el nombre no podía seleccionarse 
con un dropdown y necesitaba un textinput-->
<div class="roles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['style'=>'width:30%','maxlength' => true]); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>