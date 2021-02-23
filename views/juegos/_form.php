<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Juegos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="juegos-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4">
        <?= $form->field($model, 'nombre')->textInput(['style'=>'width:50%', 'maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'visitas')->textInput(['style'=>'width:20%']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'empresa_id')->textInput(['style'=>'width:20%']) ?>
    </div>
    
    <div class="col-md-4">
        <?= $form->field($model, 'nombre_archivo')->textInput(['style'=>'width:50%', 'maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'estado')->textInput(['style'=>'width:20%', 'maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
