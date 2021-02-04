<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Roles;
use app\models\Usuarios;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        if(Yii::$app->user->identity){
            if(Yii::$app->user->identity->username == 'admin'){ 
                echo Html::a('Crear Usuarios', ['create'], ['class' => 'btn btn-success']); 
            }
        }
        
        
    ?>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'rol_id',
            'nivel_foro_id',
            'user',
            'nombre',
            //'contraseña',
            //'email:email',
            //'nacimiento',
            //'estado',
            //'poblacion',
            //'CIF',
            //'direccion',
            //'telefono',
            //'token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
