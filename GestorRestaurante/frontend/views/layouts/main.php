<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

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
<body class="hold-transition layout-fixed layout-navbar-fixed layout-footer-fixed">
<?php $this->beginBody() ?>

<div class="wrapper_login">
    <!-- Navbar -->

    <?php if(\Yii::$app->user->can('AcederInterfaceGerente')) {?>
    <nav class="main-header navbar navbar-expand navbar-yellow navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?=Url::toRoute(['perfil/myperfil', 'id' => Yii::$app->user->identity])?>" role="button">
                    <i class="fas fa-user-edit"></i>
                    Perfil
                </a>
            </li>   <li class="nav-item">
                <a class="nav-link" href="<?= Url::toRoute('site/logout')?>" data-method="POST" role="button">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                </a>
            </li>
        </ul>
    </nav>
    <?php }?>

    <?php if(\Yii::$app->user->can('AcederInterfaceCliente')) {?>
    <nav class="main-header navbar navbar-expand navbar-red navbar-light">


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" role="button">
                    <i class="fas fa-user-edit"></i>
                    Perfil
                </a>
            </li>   <li class="nav-item">
                <a class="nav-link" href="<?= Url::toRoute('site/logout')?>" data-method="POST" role="button">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <?php }?>


    <?php if(\Yii::$app->user->can('AcederInterfaceCozinheiro')) {?>
    <nav class="main-header navbar navbar-expand navbar-success navbar-light">


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" role="button">
                    <i class="fas fa-user-edit"></i>
                    Perfil
                </a>
            </li>   <li class="nav-item">
                <a class="nav-link" href="<?= Url::toRoute('site/logout')?>" data-method="POST" role="button">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                </a>
            </li>
        </ul>
    </nav>
        <!-- /.navbar -->
    <?php }?>

        <?php if(\Yii::$app->user->can('AcederInterfaceEmpregadoMesa')) {?>
        <nav class="main-header navbar navbar-expand navbar-indigo navbar-light">


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" role="button">
                    <i class="fas fa-user-edit"></i>
                    Perfil
                </a>
            </li>   <li class="nav-item">
                <a class="nav-link" href="<?= Url::toRoute('site/logout')?>" data-method="POST" role="button">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                </a>
            </li>
        </ul>
    </nav>
        <?php }?>

    <?php if(\Yii::$app->user->can('AcederInterfaceAtendedorPedidos')) {?>
        <nav class="main-header navbar navbar-expand navbar-primary navbar-light">


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">
                        <i class="fas fa-user-edit"></i>
                        Perfil
                    </a>
                </li>   <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute('site/logout')?>" data-method="POST" role="button">
                        <i class="fas fa-sign-out-alt"></i>
                        Sair
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
    <?php }?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?=Url::toRoute('site/main')?>" class="brand-link">
            <?= Html::img('img/logo.png' , ['alt' => 'Gestor Restaurante logo', 'class' => 'brand-image img-circle elevation-3' , 'style' =>'opacity: .8']);?>
            <span class="brand-text font-weight-light">Gestor Restaurante</span>
        </a>

        <?php if(\Yii::$app->user->can('AcederInterfaceGerente')) {?>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="box-body box-profile user-painel mt-3">
                <h3 class="profile-username text-center">
                    <?= Html::img('img/perfil.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-gerente img-responsive img-circle']); ?>
                </h3>
                <div class="info center">
                    <a href="#" class="d-block text-center">Alexander Pierce</a>
                    <div style="text-align: center;">
                        <span class="center badge badge-warning"><h8>Cargooooo</h8></span>
                    </div>
                </div>
            </div>
            <div class="user-panel mt-3 d-flex"></div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <!-- HOME -->
                    <li class="nav-item">
                        <a href="<?= Url::toRoute(['site/main']) ?>" class="nav-link active">
                            <i class="fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <!-- UTILIZADORES -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users"></i>
                            <p>
                                Utilizadores
                            </p>
                        </a>
                    </li>
                    <!-- CARGOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-tag"></i>
                            <p>
                                Cargos
                            </p>
                        </a>
                    </li>
                    <!-- CATEGORIA DE PRODUTOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-tags"></i>
                            <p>
                                Categorias Produtos
                            </p>
                        </a>
                    </li>
                    <!-- PRODUTOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-utensils"></i>
                            <p>
                                Produtos
                            </p>
                        </a>
                    </li>
                    <!-- PEDIDOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-truck"></i>
                            <p>
                                Pedidos
                            </p>
                        </a>
                    </li>
                    <!-- FALTAS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-alt-slash"></i>
                            <p>
                                Faltas
                            </p>
                        </a>
                    </li>
                    <!-- HORARIO -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-calendar-alt"></i>
                            <p>
                                Horario
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->

        </div>
        <!-- /.sidebar -->
    </aside>
        <?php }?>

        <?php if(\Yii::$app->user->can('AcederInterfaceCliente')) {?>
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="box-body box-profile user-painel mt-3">
            <h3 class="profile-username text-center">
                <?= Html::img('img/perfil.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cliente img-responsive img-circle']); ?>
            </h3>
            <div class="info center">
                <a href="#" class="d-block text-center">Alexander Pierce</a>
                <div style="text-align: center;">
                    <span class="center badge badge-danger"><h8>Cargooooo</h8></span>
                </div>
            </div>
        </div>
        <div class="user-panel mt-3 d-flex"></div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <!-- HOME -->
                <li class="nav-item">
                    <a href="<?= Url::toRoute(['site/main']) ?>" class="nav-link active">
                        <i class="fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <!-- UTILIZADORES -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            Utilizadores
                        </p>
                    </a>
                </li>
                <!-- CARGOS -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-tag"></i>
                        <p>
                            Cargos
                        </p>
                    </a>
                </li>
                <!-- CATEGORIA DE PRODUTOS -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-tags"></i>
                        <p>
                            Categorias Produtos
                        </p>
                    </a>
                </li>
                <!-- PRODUTOS -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-utensils"></i>
                        <p>
                            Produtos
                        </p>
                    </a>
                </li>
                <!-- PEDIDOS -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-truck"></i>
                        <p>
                            Pedidos
                        </p>
                    </a>
                </li>
                <!-- FALTAS -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-alt-slash"></i>
                        <p>
                            Faltas
                        </p>
                    </a>
                </li>
                <!-- HORARIO -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-calendar-alt"></i>
                        <p>
                            Horario
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
        </aside>
        <?php }?>

    <?php if(\Yii::$app->user->can('AcederInterfaceCozinheiro')) {?>

        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="box-body box-profile user-painel mt-3">
                <h3 class="profile-username text-center">
                    <?= Html::img('img/perfil.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cozinheiro img-responsive img-circle']); ?>
                </h3>
                <div class="info center">
                    <a href="#" class="d-block text-center">Alexander Pierce</a>
                    <div style="text-align: center;">
                        <span class="center badge badge-success "><h8>Cargooooo</h8></span>
                    </div>
                </div>
            </div>
            <div class="user-panel mt-3 d-flex"></div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <!-- HOME -->
                    <li class="nav-item">
                        <a href="<?= Url::toRoute(['site/main']) ?>" class="nav-link active">
                            <i class="fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <!-- UTILIZADORES -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users"></i>
                            <p>
                                Utilizadores
                            </p>
                        </a>
                    </li>
                    <!-- CARGOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-tag"></i>
                            <p>
                                Cargos
                            </p>
                        </a>
                    </li>
                    <!-- CATEGORIA DE PRODUTOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-tags"></i>
                            <p>
                                Categorias Produtos
                            </p>
                        </a>
                    </li>
                    <!-- PRODUTOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-utensils"></i>
                            <p>
                                Produtos
                            </p>
                        </a>
                    </li>
                    <!-- PEDIDOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-truck"></i>
                            <p>
                                Pedidos
                            </p>
                        </a>
                    </li>
                    <!-- FALTAS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-alt-slash"></i>
                            <p>
                                Faltas
                            </p>
                        </a>
                    </li>
                    <!-- HORARIO -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-calendar-alt"></i>
                            <p>
                                Horario
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->

        </div>
        <!-- /.sidebar -->
        </aside>
    <?php }?>

    <?php if(\Yii::$app->user->can('AcederInterfaceEmpregadoMesa')) {?>
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="box-body box-profile user-painel mt-3">
                <h3 class="profile-username text-center">
                    <?= Html::img('img/perfil.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-empregado-mesa img-responsive img-circle']); ?>
                </h3>
                <div class="info center">
                    <a href="#" class="d-block text-center">Alexander Pierce</a>
                    <div style="text-align: center;">
                        <span class="center badge badge-indigo"><h8>Cargooooo</h8></span>
                    </div>
                </div>
            </div>
            <div class="user-panel mt-3 d-flex"></div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <!-- HOME -->
                    <li class="nav-item">
                        <a href="<?= Url::toRoute(['site/main']) ?>" class="nav-link active">
                            <i class="fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <!-- UTILIZADORES -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users"></i>
                            <p>
                                Utilizadores
                            </p>
                        </a>
                    </li>
                    <!-- CARGOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-tag"></i>
                            <p>
                                Cargos
                            </p>
                        </a>
                    </li>
                    <!-- CATEGORIA DE PRODUTOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-tags"></i>
                            <p>
                                Categorias Produtos
                            </p>
                        </a>
                    </li>
                    <!-- PRODUTOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-utensils"></i>
                            <p>
                                Produtos
                            </p>
                        </a>
                    </li>
                    <!-- PEDIDOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-truck"></i>
                            <p>
                                Pedidos
                            </p>
                        </a>
                    </li>
                    <!-- FALTAS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-alt-slash"></i>
                            <p>
                                Faltas
                            </p>
                        </a>
                    </li>
                    <!-- HORARIO -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-calendar-alt"></i>
                            <p>
                                Horario
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->

        </div>
        <!-- /.sidebar -->
        </aside>
    <?php }?>

    <?php if(\Yii::$app->user->can('AcederInterfaceAtendedorPedidos')) {?>
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="box-body box-profile user-painel mt-3">
                <h3 class="profile-username text-center">
                    <?= Html::img('img/perfil.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-atendedor-pedidos  img-responsive img-circle']); ?>
                </h3>
                <div class="info center">
                    <a href="#" class="d-block text-center">Alexander Pierce</a>
                    <div style="text-align: center;">
                        <span class="center badge badge-primary"><h8>Cargooooo</h8></span>
                    </div>
                </div>
            </div>
            <div class="user-panel mt-3 d-flex"></div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <!-- HOME -->
                    <li class="nav-item">
                        <a href="<?= Url::toRoute(['site/main']) ?>" class="nav-link active">
                            <i class="fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <!-- UTILIZADORES -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users"></i>
                            <p>
                                Utilizadores
                            </p>
                        </a>
                    </li>
                    <!-- CARGOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-tag"></i>
                            <p>
                                Cargos
                            </p>
                        </a>
                    </li>
                    <!-- CATEGORIA DE PRODUTOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-tags"></i>
                            <p>
                                Categorias Produtos
                            </p>
                        </a>
                    </li>
                    <!-- PRODUTOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-utensils"></i>
                            <p>
                                Produtos
                            </p>
                        </a>
                    </li>
                    <!-- PEDIDOS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-truck"></i>
                            <p>
                                Pedidos
                            </p>
                        </a>
                    </li>
                    <!-- FALTAS -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-alt-slash"></i>
                            <p>
                                Faltas
                            </p>
                        </a>
                    </li>
                    <!-- HORARIO -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-calendar-alt"></i>
                            <p>
                                Horario
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->

        </div>
        <!-- /.sidebar -->
        </aside>
    <?php }?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?= $this->title = 'Home';?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><?=$this->params['breadcrumbs'][] = $this->title;?></a></li>
                            <li class="breadcrumb-item active"><?=$this->params['breadcrumbs'][] = $this->title;?></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="site-index-img">
            <img src="img/logo.png" width="100px" height="100px"  class="rounded mx-auto d-block" alt="...">

        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?=$content?>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0-pre
        </div>
    </footer>
</div>
<!-- ./wrapper -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
