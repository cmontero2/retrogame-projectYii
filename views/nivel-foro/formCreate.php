<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\NivelForo;

/* @var $this yii\web\View */
/* @var $model app\models\NivelForo */
/* @var $form yii\widgets\ActiveForm */
?>
<!--Vista que se utiliza para la creación de niveles de foro. 
Se creó una diferente al form porque el nombre no podía seleccionarse 
con un dropdown y necesitaba un textinput-->
<div class="nivel-foro-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-3">
        <?= $form->field($model, 'nombre')->textInput(['style'=>'width:50%'])?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'puntos')->textInput(['style'=>'width:50%']) ?>
    </div>
    
    <div class="col-md-12 form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>