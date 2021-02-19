<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\Usuarios;
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

    <?php
        echo "<pre>";
        $rolesByUser = Usuarios::find()->where("nivel_foro_id =".$model->id)->limit(10)->all();
        echo "Algunos usuarios con este nivel: <br>";
            
            foreach($rolesByUser as $rol){                
                
                $usuario_id = ArrayHelper::getColumn(Usuarios::find()->where("id=".$rol->id)->all(), 'id');                
                $nombres = ArrayHelper::getColumn(Usuarios::find()->where("id=".$rol->id)->all(), 'user');
                
                $ids = "";
                $usuarioNombre = "";
                foreach($usuario_id as $id){
                   $ids = $id;
                }
                
                foreach($nombres as $nombre){
                    $usuarioNombre = $nombre;
                }
                echo Html::a($usuarioNombre,['usuarios/view','id'=>$ids])."<br>";
                
                
            }
        
    ?>

</div>
