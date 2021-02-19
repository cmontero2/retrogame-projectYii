<?php
use app\models\NivelForo;
use app\models\Roles;
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\UsuariosJuego;
use app\models\Juegos;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

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
        <?php  
            echo "<pre>";
            $juegosByUser = UsuariosJuego::find()->where("usuario_id =".$model->id)->limit(3)->all();      
            
            echo "Últimos juegos jugados: <br>";
            foreach($juegosByUser as $juego){
                $juego_id = ArrayHelper::getColumn(Juegos::find()->where("id=".$juego->juego_id)->all(), 'id');
                $juegos = ArrayHelper::getColumn(Juegos::find()->where("id=".$juego->juego_id)->all(), 'nombre');
                $ids = "";
                $juegoNombre = "";
                foreach($juego_id as $id){
                    $ids = $id;
                }
                foreach($juegos as $juego){
                    $juegoNombre = $juego;
                }
                echo Html::a($juegoNombre,['juegos/view','id'=>$ids])."<br>";
                
            }
            
            
        ?>
</div>
