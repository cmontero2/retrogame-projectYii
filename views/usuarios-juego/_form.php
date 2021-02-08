<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Usuarios;
use app\models\Juegos;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosJuego */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-juego-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-3">
        <?php    
            $options=ArrayHelper::map(Juegos::find()->asArray()->all(),'id','nombre');
            echo $form->field($model, 'juego_id')->dropDownList($options,['prompt'=>'Seleccione...', 'style'=>'width:50%']);
        ?>
    </div>
    <div class="col-md-3">
        <?php    
            $options=ArrayHelper::map(Usuarios::find()->asArray()->all(),'id','user');
            echo $form->field($model, 'usuario_id')->dropDownList($options,['prompt'=>'Seleccione...', 'style'=>'width:50%']);
        ?>
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
