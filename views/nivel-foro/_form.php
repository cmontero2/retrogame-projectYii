<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\NivelForo;

/* @var $this yii\web\View */
/* @var $model app\models\NivelForo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nivel-foro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->dropDownList(NivelForo::lookup(),['prompt'=>'Seleccione...']); ?>

    <?= $form->field($model, 'puntos')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
