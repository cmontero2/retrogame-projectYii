<?php
    use yii\grid\GridView;
    use yii\helpers\Html;
    use yii\grid\CheckboxColumn;
    use yii\widgets\ActiveForm;

    $this->title = 'Aprobar usuarios';
    $this->params['breadcrumbs'][] = $this->title;
?>
    <div class="administrar">

    <h1><?= Html::encode($this->title) ?></h1>
        <!--lleva a la accion aprobarusuarios cuando se le da al boton de submit-->
        <?=Html::beginForm(['usuarios/aprobarusuarios'],'post');?>
        <!-- Boton de submit que lleva a la accion de aprobarusuarios-->
        <?=Html::submitButton('Aprobar', ['class' => 'btn btn-success']); ?>
        <!--Muestra un grid con un checkbox por registro que envia la id del usuario seleccionado-->
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'user',
                'nombre',                
                ['class' => CheckboxColumn::className(),'name'=>'idselec',
                'checkboxOptions' => function ($model, $key, $index, $column) {
                            return ['value' => $model->id];
                            }],
            ],
        ])
    ?>
        
    <?= Html::endForm();?>




</div>
