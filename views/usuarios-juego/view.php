<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
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

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Juego</th>
                <th scope="col">Usuario</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>
            <td><?= Html::a($model->juegos->nombre,['juegos/view','id'=>$model->juego_id]) ?></td>
            <td><?= Html::a($model->usuario->user,['usuarios/view','id'=>$model->usuario_id]) ?></td>
            <td><?= \Yii::$app->formatter->asDate($model->fecha_id); ?></td>
        </tbody>
    </table>

</div>
