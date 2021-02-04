<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Juegos;
use yii\helpers\ArrayHelper; 

/* @var $this yii\web\View */
/* @var $model app\models\JuegosCategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="juegos-categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoria_id')->textInput() ?>

    <?php 
        $options=ArrayHelper::map(Juegos::find()->asArray()->all(),'id','nombre');
        echo $form->field($model, 'juego_id')->dropDownList($options,['prompt'=>'Seleccione...']);

    ?>
    <?= $form->field($model, 'usuario_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
