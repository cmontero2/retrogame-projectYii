<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Usuarios;
use app\models\Juegos;
use app\components\THtml;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosJuego */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-juego-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-3">    
        <?= $form->field($model, 'juego_id')->dropDownList(Juegos::lookup(),['prompt'=>'Seleccione...', 'style'=>'width:50%']);?>
    </div>
    <div class="col-md-3">
        <?= THtml::autocomplete($model,'usuario_id',['/usuarios/lookup'],'usuario');?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'fecha_id')->widget(\yii\jui\DatePicker::classname(), [
            'dateFormat' => 'yyyy-MM-dd',   
        ]) ?>
    </div>
    <div class="form-group col-md-12">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
