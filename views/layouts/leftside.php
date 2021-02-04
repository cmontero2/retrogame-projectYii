<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
<?= Html::img('@web/img/profileuser.jpg', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
            </div>
            <div class="pull-left info">
                <p>Administrador</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Menu', 'options' => ['class' => 'header']],
                        ['label' => 'Inicio', 'icon' => 'fa fa-dashboard', 
                            'url' => ['/'], 'active' => $this->context->route == 'site/index'
                        ],
                        [
                            'label' => 'Foro',
                            'icon' => 'fa fa-database',
                            'url' => '/',
                            'items' => [
                                [
                                    'label' => 'Secciones',
                                    'icon' => 'fa fa-database',
                                    'url' => 'secciones',
				    'active' => $this->context->route == ''
                                ],
                                [
                                    'label' => 'Entradas',
                                    'icon' => 'fa fa-database',
                                    'url' => 'entradas',
				    'active' => $this->context->route == ''
                                ],
                                [
                                    'label' => 'Comentarios',
                                    'icon' => 'fa fa-database',
                                    'url' => 'comentarios',
				    'active' => $this->context->route == ''
                                ],
                                [
                                    'label' => 'Nivel foro',
                                    'icon' => 'fa fa-database',
                                    'url' => 'nivel-foro',
				    'active' => $this->context->route == ''
                                ]
                            ]
                        ],
                        [
                            'label' => 'Usuarios',
                            'icon' => 'fa fa-users',
                            'url' => '/',
                            'items' => [
                                [
                                    'label' => 'Usuarios',
                                    'icon' => 'fa fa-users',
                                    'url' => 'usuarios',
				    'active' => $this->context->route == ''
                                ],
                                [
                                    'label' => 'Roles',
                                    'icon' => 'fa fa-users',
                                    'url' => 'roles',
				    'active' => $this->context->route == ''
                                ],
                                [
                                    'label' => 'Usuario y juego',
                                    'icon' => 'fa fa-users',
                                    'url' => 'usuarios-juego',
				    'active' => $this->context->route == ''
                                ]
                            ]
                        ],
                        [
                            'label' => 'Juegos',
                            'icon' => 'fa fa-gamepad',
                            'url' => '/',
                            'items' => [
                                [
                                    'label' => 'Juegos',
                                    'icon' => 'fa fa-gamepad',
                                    'url' => 'juegos',
				    'active' => $this->context->route == ''
                                ],
                                [
                                    'label' => 'Categoria',
                                    'icon' => 'fa fa-gamepad',
                                    'url' => 'categorias',
				    'active' => $this->context->route == ''
                                ],
                                [
                                    'label' => 'Categorias de juegos',
                                    'icon' => 'fa fa-gamepad',
                                    'url' => 'juegos-categoria',
				    'active' => $this->context->route == ''
                                ]
                            ]
                        ],
                        ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                        ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                    ],
                ]
        )
        ?>
        
    </section>
    <!-- /.sidebar -->
</aside>
