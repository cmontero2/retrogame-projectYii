<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Usuarios;
use app\models\Entradas;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comentarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4">
        <?= $form->field($model, 'texto')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
    <?= $form->field($model, 'fecha')->widget(DateControl::classname(),['pluginOptions' => ['autoclose'=>true]]);  ?>
    </div>

    <div class="col-md-4">
    <?= $form->field($model, 'entrada')->dropDownList(Entradas::lookup(),['prompt'=>'Seleccione...']);  ?>
    </div>

    <div class="col-md-4">
    <?= $form->field($model, 'usuario')->dropDownList(Usuarios::lookup(),['prompt'=>'Seleccione...']);  ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
