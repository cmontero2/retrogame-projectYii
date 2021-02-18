<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NivelForo */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Nivel Foros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nivel-foro-view">

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
                <th scope="col">Puntos</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            <td><?= $model->nombre ?></td>
            <td><?= $model->puntos ?></td>
        </tbody>
    </table>

</div>
