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
    <div class="col-md-3">
        <!-- Muestra los diferentes nombres de nivel de foro existentes en un dropdown-->
        <?= $form->field($model, 'nombre')->dropDownList(NivelForo::lookup(),['prompt'=>'Seleccione...', 'style'=>'width:50%']); ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'puntos')->textInput(['style'=>'width:50%']) ?>
    </div>
    
    <div class="col-md-12 form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
