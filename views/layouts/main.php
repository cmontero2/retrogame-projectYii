<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        //'brandLabel' => "Retrogame",//Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Secciones', 'url' => ['/secciones'],'visible'=> !Yii::$app->user->isGuest],            
            ['label' => 'Entradas', 'url' => ['/entradas'],'visible'=> !Yii::$app->user->isGuest],
            ['label' => 'Comentarios', 'url' => ['/comentarios'],'visible'=> !Yii::$app->user->isGuest],
            ['label' => 'Categorias', 'url' => ['/categorias'],'visible'=> !Yii::$app->user->isGuest],
            ['label' => 'Juegos', 'url' => ['/juegos'],'visible'=> !Yii::$app->user->isGuest],
            ['label' => 'JuegosCategoria', 'url' => ['/juegos-categoria'],'visible'=> !Yii::$app->user->isGuest],
            ['label' => 'NivelForo', 'url' => ['/nivel-foro'],'visible'=> !Yii::$app->user->isGuest],
            ['label' => 'Roles', 'url' => ['/roles'],'visible'=> !Yii::$app->user->isGuest],            
            ['label' => 'UsuariosJuego', 'url' => ['/usuarios-juego'],'visible'=> !Yii::$app->user->isGuest],
            ['label' => 'Usuarios', 'url' => ['/usuarios'],'visible'=> !Yii::$app->user->isGuest],

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
