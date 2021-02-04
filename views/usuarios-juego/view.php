<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Juegos;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosJuego */

$this->title = "Datos";
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Juegos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuarios-juego-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quiere borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute'=>'juego_id',
                'filter'=>Juegos::lookup(),
                'value'=>function($data) {
                return $data->juegos->nombre;
                }
            ],
            ['attribute'=>'usuario_id',
                'filter'=>Usuarios::lookup(),
                'value'=>function($data) {
                return $data->usuario->user;
                }
            ],
            'fecha_id',
        ],
    ]) ?>

</div>
