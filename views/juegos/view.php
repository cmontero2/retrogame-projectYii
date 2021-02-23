<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\Usuarios;
use app\models\Juegos;
use app\models\Categorias;

/* @var $this yii\web\View */
/* @var $model app\models\Juegos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Juegos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="juegos-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Visitas</th>
                <th scope="col">Empresa</th>
                <th scope="col">Nombre archivo</th>
                <th scope="col">Estado</th>
                <th scope="col">Iframe</th>
            </tr>
        </thead>
        <tbody>
            <!--Enlace que muestra la informacion de la tabla y lleva a la vista del dato mostrado-->
            <td><?= $model->nombre?></td>
            <td><?= $model->descripcion?></td>
            <td><?= $model->visitas?></td>
            <td><?php// Html::a($model->usuario->user,['usuarios/view','id'=>$model->empresa_id]) ?></td>
        
            <td><?= $model->nombre_archivo?></td>
            <td><?= $model->estado?></td>
            <td><?= $model->iframe_url?></td>
        </tbody>
    </table>

</div>
