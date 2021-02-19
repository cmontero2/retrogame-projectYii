<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Usuarios;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Roles */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="roles-view">

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
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            <td><?= $model->nombre ?></td>
        </tbody>
    </table>
    <?php
        $rolesByUser = Usuarios::find()->where("rol_id =".$model->id)->limit(10)->all();
        echo "Algunos usuarios con este rol: <br>";
        
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
