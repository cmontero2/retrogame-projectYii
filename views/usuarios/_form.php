<?php

use app\models\NivelForo;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Roles;
use app\components\THtml;
use kartik\password\PasswordInput;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-4">
        <?= $form->field($model, 'user')->textInput(['style'=>'width:50%','maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'nombre')->textInput(['style'=>'width:50%', 'maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'password')->widget(PasswordInput::classname()); ?>         
        
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'email')->textInput(['style'=>'width:50%', 'maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'poblacion')->textInput(['style'=>'width:50%', 'maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'CIF')->textInput(['style'=>'width:50%','maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'direccion')->textInput(['style'=>'width:50%','maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'telefono')->textInput(['style'=>'width:50%']) ?>
    </div>
    
    <div class="col-md-2">
        <?= THtml::autocomplete($model,'nivel_foro_id',['/nivel-foro/lookup'], 'nivel_foro_id');?>
        <?php
        /*    
            //$options=ArrayHelper::map(Roles::find()->asArray()->all(),'id','nombre');
            echo $form->field($model, 'nivel_foro_id')->dropDownList(NivelForo::lookup(),['prompt'=>'Seleccione...', 'style'=>'width:50%']);
        */
        ?>
    </div>
    <div class="col-md-4">
        <div class="col-md-7">
            <?= THtml::autocomplete($model,'rol_id',['/roles/lookup'], 'rol_id');?>    
        </div>
    </div>
    
    <div class="col-md-4">
        <?= $form->field($model, 'nacimiento')->widget(\yii\jui\DatePicker::classname(), [
            'dateFormat' => 'yyyy-MM-dd',  
        ]) ?>
    </div>
    
    <div class="col-md-12 form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php //var_dump($model->geterrors()); ?>
    <?php ActiveForm::end(); ?>

</div>
