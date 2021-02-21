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
        <?=Html::beginForm(['usuarios/aprobarusuarios'],'post');?>
        <?=Html::submitButton('Aprobar', ['class' => 'btn btn-success']); ?>
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
