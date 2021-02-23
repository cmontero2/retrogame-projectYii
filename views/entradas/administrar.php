<?php
    use yii\grid\GridView;
    use yii\helpers\Html;
    use yii\grid\CheckboxColumn;
    use yii\widgets\ActiveForm;

    $this->title = 'Aprobar entradas';
    $this->params['breadcrumbs'][] = $this->title;
?>
    <div class="administrar">

    <h1><?= Html::encode($this->title) ?></h1>

        <?=Html::beginForm(['entradas/aprobarentradas'],'post');?>

        <?=Html::submitButton('Aprobar', ['class' => 'btn btn-success']); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'titulo',
                'texto',                
                ['class' => CheckboxColumn::className(),'name'=>'idsel',
                'checkboxOptions' => function ($model, $key, $index, $column) {
                            return ['value' => $model->id];
                            }],
            ],
        ])
    ?>
        
    <?= Html::endForm();?>

</div>