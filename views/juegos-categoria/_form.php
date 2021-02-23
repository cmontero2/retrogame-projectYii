<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Juegos;
use app\models\Categorias;
use app\models\Usuarios;
use yii\helpers\ArrayHelper; 

/* @var $this yii\web\View */
/* @var $model app\models\JuegosCategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="juegos-categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4">
        <?php 
            $options=ArrayHelper::map(Categorias::find()->asArray()->all(),'id','nombre');
            echo $form->field($model, 'categoria_id')->dropDownList($options,['prompt'=>'Seleccione...']);

        ?>
    </div>

    <div class="col-md-4">
        <?php 
            $options=ArrayHelper::map(Juegos::find()->asArray()->all(),'id','nombre');
            echo $form->field($model, 'juego_id')->dropDownList($options,['prompt'=>'Seleccione...']);

        ?>
    </div>

    <div class="col-md-4">
        <?php 
            $options=ArrayHelper::map(Usuarios::find()->asArray()->all(),'id','nombre');
            echo $form->field($model, 'usuario_id')->dropDownList($options,['prompt'=>'Seleccione...']);

        ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
