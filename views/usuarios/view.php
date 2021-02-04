<?php
use app\models\NivelForo;
use app\models\Roles;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = $model->user;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//var_dump($model);
//echo "rol ".$model->rol_id->nombre;
?>
<div class="usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que quieres borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute'=>'rol_id',
                'filter'=>Roles::lookup(),
                'value'=>function($data) {
                return $data->rol->nombre;
                }
            ],
            ['attribute'=>'nivel_foro_id',
                'filter'=>NivelForo::lookup(),
                'value'=>function($data) {
                return $data->nivelForo->nombre;
                }
            ],
            'user',
            'nombre',
            'email:email',
            'nacimiento',
            'estado',
            'poblacion',
            'CIF',
            'direccion',
            'telefono',
            'estado',
        ],
    ]) ?>

</div>
