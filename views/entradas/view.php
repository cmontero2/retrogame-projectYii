<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Secciones;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="entradas-view">

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
                <th scope="col">Titulo</th>
                <th scope="col">Texto</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Usuario</th>
                <th scope="col">Sección</th>
            </tr>
        </thead>
        <tbody>
            <td><?= $model->titulo ?></td>
            <td><?= $model->texto ?></td>
            <td><?= \Yii::$app->formatter->asDate($model->fecha) ?></td>
            <td><?= $model->estado ?></td>
            <td><?= $model->usuario->user ?></td>
            <td><?= $model->seccion->nombre ?></td>
        </tbody>
    </table>

</div>
