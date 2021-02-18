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

    <?php /* DetailView::widget([
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
    ])*/ ?>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Juego</th>
                <th scope="col">Usuario</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>
            <td><?= $model->juegos->nombre ?></td>
            <td><?= $model->usuario->user ?></td>
            <td><?= \Yii::$app->formatter->asDate($model->fecha_id); ?></td>
        </tbody>
    </table>

</div>
