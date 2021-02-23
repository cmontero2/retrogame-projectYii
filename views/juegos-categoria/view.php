<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\Categorias;
use app\models\Juegos;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $model app\models\JuegosCategoria */

$this->title = "Juegos Categoría";
$this->params['breadcrumbs'][] = ['label' => 'Juegos Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="juegos-categoria-view">

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
                <th scope="col">Categoría</th>
                <th scope="col">Juego</th>
                <th scope="col">Usuario</th>
            </tr>
        </thead>
        <tbody>
            <!--Enlace que muestra la informacion de la tabla y lleva a la vista del dato mostrado-->
            <td><?= Html::a($model->categoria->nombre,['categorias/view','id'=>$model->categoria_id]) ?></td>
            <td><?= Html::a($model->juego->nombre,['juegos/view','id'=>$model->juego_id]) ?></td>
            <td><?= Html::a($model->usuario->user,['usuarios/view','id'=>$model->usuario_id]) ?></td>
        </tbody>
    </table>

</div>
