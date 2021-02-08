<?php

use app\models\NivelForo;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Roles;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-3">
        <?php    
            //$options=ArrayHelper::map(Roles::find()->asArray()->all(),'id','nombre');
            echo $form->field($model, 'nivel_foro_id')->dropDownList(NivelForo::lookup(),['prompt'=>'Seleccione...', 'style'=>'width:50%']);
        ?>
    </div>
    <div class="col-md-3">
        <?php    
            //$options=ArrayHelper::map(Roles::find()->asArray()->all(),'id','nombre');
            echo $form->field($model, 'rol_id')->dropDownList(Roles::lookup(),['prompt'=>'Seleccione...', 'style'=>'width:50%']);
        ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'user')->textInput(['style'=>'width:50%','maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'nombre')->textInput(['style'=>'width:50%', 'maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'password')->passwordInput(['style'=>'width:50%']) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'email')->textInput(['style'=>'width:50%', 'maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'poblacion')->textInput(['style'=>'width:50%', 'maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'CIF')->textInput(['style'=>'width:50%','maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'direccion')->textInput(['style'=>'width:50%','maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'telefono')->textInput(['style'=>'width:50%']) ?>
    </div>
    <div class="col-md-3">
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
