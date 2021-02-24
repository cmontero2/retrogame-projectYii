<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Juegos;

/* @var $this yii\web\View */
/* @var $model app\models\Secciones */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Secciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="secciones-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Juego</th>
            </tr>
        </thead>
        <tbody>
            <td><?= $model->id ?></td>
            <td><?= $model->nombre ?></td>
            <td><?= $model->juego_id ?></td>
        </tbody>
    </table>

</div>
