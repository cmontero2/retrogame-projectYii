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
        <!--Botones que llevan a la accion update o delete-->
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
        //muestra a usuarios con este nivel de foro
        echo "<pre>";
        //busca usuarios por la id del foro en la que estemos
        $rolesByUser = Usuarios::find()->where("nivel_foro_id =".$model->id)->limit(10)->all();
        echo "Algunos usuarios con este nivel: <br>";
            
            //recorre los usuarios filtrados
            foreach($rolesByUser as $rol){                
                //recoge la id del usuario para luego poder redirigir a su vista
                $usuario_id = ArrayHelper::getColumn(Usuarios::find()->where("id=".$rol->id)->all(), 'id'); 
                //recoge el nombre del usuario para no mostrar su id               
                $nombres = ArrayHelper::getColumn(Usuarios::find()->where("id=".$rol->id)->all(), 'user');
                
                $ids = "";
                $usuarioNombre = "";
                foreach($usuario_id as $id){
                   $ids = $id;
                }
                
                foreach($nombres as $nombre){
                    $usuarioNombre = $nombre;
                }
                //enlace a la vista del usuario mostrando su nombre
                echo Html::a($usuarioNombre,['usuarios/view','id'=>$ids])."<br>";
                
                
            }
        
    ?>

</div>
