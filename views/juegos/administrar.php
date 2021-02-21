<?php

    use yii\grid\GridView;
    use yii\helpers\Html;
    use yii\grid\CheckboxColumn;
    use yii\widgets\ActiveForm;

    $this->title = 'Aprobar juegos';
    $this->params['breadcrumbs'][] = $this->title;

?>

    <div class="administrar">

        <h1><?= Html::encode($this->title) ?></h1>
        <?=Html::beginForm(['juegos/aprobarjuegos'],'post');?>
        <?=Html::submitButton('Aprobar', ['class' => 'btn btn-success']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'nombre',
                'descripcion',
                'empresa_id',
                'iframe_url',                
                ['class' => CheckboxColumn::className(),'name'=>'ids',
                'checkboxOptions' => function ($model, $key, $index, $column) {
                            return ['value' => $model->id];
                            }],
            ],
        ])
    ?>
        
    <?= Html::endForm();?>

    </div>