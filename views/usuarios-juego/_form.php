<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Usuarios;
use app\models\Juegos;
use app\components\THtml;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosJuego */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-juego-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-3">
        <!--muestra la lista de juegos-->    
        <?= $form->field($model, 'juego_id')->dropDownList(Juegos::lookup(),['prompt'=>'Seleccione...', 'style'=>'width:50%']);?>
    </div>
    <div class="col-md-3">
        <!--Autocompletar del nombre del usuario-->
        <?= THtml::autocomplete($model,'usuario_id',['/usuarios/lookup'],'usuario');?>
    </div>
    <div class="col-md-3">
        <!--plugin que muestra un calendario donde seleccionar la fecha-->
        <?= $form->field($model, 'fecha_id')->widget(DateControl::classname(),['pluginOptions' => ['autoclose'=>true]]);?>
    </div>
    <div class="form-group col-md-12">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
