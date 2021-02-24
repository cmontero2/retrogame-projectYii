<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Entradas;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comentarios-view">

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
                <th scope="col">Texto</th>
                <th scope="col">Fecha</th>
                <th scope="col">Entrada</th>
                <th scope="col">Usuario</th>
            </tr>
        </thead>
        <tbody>
            <td><?= $model->texto ?></td>
            <td><?= \Yii::$app->formatter->asDate($model->fecha) ?></td>
            <td><?= $model->entrada->titulo ?></td>
            <td><?= $model->usuario->user ?></td>
        </tbody>
    </table>

</div>
