<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Usuarios;
use app\models\Secciones;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entradas-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4">
        <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'texto')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'fecha')->widget(DateControl::classname(),['pluginOptions' => ['autoclose'=>true]]);  ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'usuario')->dropDownList(Usuarios::lookup(),['prompt'=>'Seleccione...']);  ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'seccion')->dropDownList(Secciones::lookup(),['prompt'=>'Seleccione...']);  ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
