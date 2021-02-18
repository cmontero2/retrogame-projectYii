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
    
    <?php /*DetailView::widget([
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
            'nacimiento:date',
            'estado',
            'poblacion',
            'CIF',
            'direccion',
            'telefono',
        ],
    ])*/ ?>

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="m120">Rol</th>
                <th scope="col">Nivel Foro</th>
                <th scope="col">Usuario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Fecha nacimiento</th>
                <th scope="col">Estado</th>
                <th scope="col">Población</th>
                <th scope="col">CIF</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
            </tr>
        </thead>
        <tbody>
            <td><?= $model->rol->nombre; ?></td>
            <td><?= $model->nivelForo->nombre ?></td>
            <td><?= $model->user ?></td>
            <td><?= $model->nombre ?></td>
            <td><?= $model->email ?></td>
            <td><?= \Yii::$app->formatter->asDate($model->nacimiento); ?></td>
            <td><?= $model->estado ?></td>
            <td><?= $model->poblacion ?></td>
            <td><?= $model->CIF ?></td>
            <td><?= $model->direccion ?></td>
            <td><?= $model->telefono ?></td>
        </tbody>
    </table>

</div>
