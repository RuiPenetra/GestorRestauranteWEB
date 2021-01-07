<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\models\Perfil;
use kartik\growl\Growl;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;


AppAsset::register($this);?>
<?php $this->beginPage() ?>
<?php $id_user = Yii::$app->user->identity->id;
$perfil=Perfil::findOne(['id_user'=>$id_user])?>
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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<?php $this->beginBody() ?>

<div class="wrapper_login">

    <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$id_user) !=null):?>
        <nav class="main-header navbar navbar-expand navbar-success navbar-light" style="z-index:0">
    <?php endif;?>
    <?php if(Yii::$app->authManager->getAssignment('cliente',$id_user) != null):?>
        <nav class="main-header navbar navbar-expand navbar-red navbar-light" style="z-index:0">
    <?php endif;?>
    <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id_user) != null):?>
        <nav class="main-header navbar navbar-expand navbar-blue navbar-light" style="z-index:0">
    <?php endif;?>
    <?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id_user) != null):?>
        <nav class="main-header navbar navbar-expand navbar-indigo navbar-light" style="z-index:0">
    <?php endif;?>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?=URL::toRoute(['perfil/update','id'=>$id_user])?>" role="button">
                    <i class="fas fa-user-edit"></i>
                    Perfil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#logout" role="button">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?=Url::toRoute('site/index')?>" class="brand-link">
                <?= Html::img('img/logo.png' , ['alt' => 'Gestor Restaurante logo', 'class' => 'brand-image img-circle elevation-3' , 'style' =>'opacity: .8']);?>
                <span class="brand-text font-weight-light">Gestor Restaurante</span>
            </a>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="box-body box-profile user-painel mt-3">
            <h3 class="profile-username text-center">
                <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$id_user) !=null):
                    if ($perfil->genero==0):?>
                    <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cozinheiro img-fluid img-circle']); ?>
                <?php else:?>
                    <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cozinheiro img-fluid img-circle']); ?>
                <?php endif; endif;?>

                <?php if(Yii::$app->authManager->getAssignment('cliente',$id_user) != null):
                    if ($perfil->genero==0):?>
                        <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cliente img-fluid img-circle']); ?>
                    <?php else:?>
                        <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cliente img-fluid img-circle']); ?>
                <?php endif; endif;?>

                <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id_user) != null):
                    if ($perfil->genero==0):?>
                        <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-atendedor-pedidos img-fluid img-circle']); ?>
                    <?php else:?>
                        <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-atendedor-pedidos img-fluid img-circle']); ?>
                <?php endif; endif;?>
                <?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id_user) != null):
                    if ($perfil->genero==0):?>
                        <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-empregado-mesa img-responsive img-circle']); ?>
                    <?php else:?>
                        <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-empregado-mesa img-responsive img-circle']); ?>
                <?php endif; endif;?>
            </h3>
            <div class="info center">
                <a href="#" class="d-block text-center"><?= $perfil->nome;?> <?= $perfil->apelido;?></a>
                <div style="text-align: center;">
                    <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$id_user) !=null):?>
                        <span class="center badge badge-success text-white"><h8>Cozinheiro</h8></span>
                    <?php endif;?>
                    <?php if(Yii::$app->authManager->getAssignment('cliente',$id_user) != null):?>
                        <span class="center badge badge-danger text-white"><h8>Cliente</h8></span>
                    <?php endif;?>
                    <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id_user) != null):?>
                        <span class="center badge badge-primary text-white"><h8>Atendedor Pedidos</h8></span>
                    <?php endif;?>
                    <?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id_user) != null):?>
                        <span class="center badge badge-indigo text-white"><h8>Empregado Mesa</h8></span>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="user-panel mt-3 d-flex"></div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- HOME -->
                <li class="nav-item">
                    <a href="<?= Url::toRoute(['site/index']) ?>" class="nav-link active">
                        <i class="fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <?php if (Yii::$app->user->can('consultarFaltas') && Yii::$app->user->can('consultarHorarios')):?>
                    <!-- FALTAS -->
                    <li class="nav-item">
                        <a href="<?=URL::toRoute(['falta/view','id'=>$id_user])?>" class="nav-link">
                            <i class="fas fa-user-alt-slash"></i>
                            <p>Faltas</p>
                        </a>
                    </li>
                    <!-- HORARIO -->
                    <li class="nav-item">
                        <a href="<?=URL::toRoute(['horario/view','id'=>$id_user])?>" class="nav-link">
                            <i class="fas fa-calendar"></i>
                            <p>Horarios</p>
                        </a>
                    </li>
                <?php endif?>
                <!-- TAKEAWAY -->
                    <li class="nav-item">
                        <a href="<?=URL::toRoute(['pedido/index'])?>" class="nav-link">
                            <i class="fas fa-shopping-basket"></i>
                            <p>
                                <?php if(Yii::$app->authManager->getAssignment('cliente',$id_user) != null):?>
                                    Takeaway
                                <?php else:?>
                                    Pedidos
                                <?php endif;?>
                            </p>
                        </a>
                    </li>
                <!-- EMENTA -->
                <li class="nav-item">
                    <a href="<?=Url::toRoute(['produto/index'])?>" class="nav-link">
                        <i class="fas fa-utensils"></i>
                        <p>
                            Ementa
                        </p>
                    </a>
                </li>
                <!-- CONTACTOS -->
                <li class="nav-item">
                    <a href="<?= Url::toRoute('site/about')?>" class="nav-link">
                        <i class="fas fa-phone"></i>
                        <p>
                            Contactos
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-30">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?= $this->title?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!--TODO-->
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
                    <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
                        <?php
                        echo Growl::widget([
                            'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                            'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
                            'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                            'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
                            'showSeparator' => true,
                            'delay' => 1, //This delay is how long before the message shows
                            'pluginOptions' => [
                                'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                                'placement' => [
                                    'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'bottom',
                                    'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                                ]
                            ],
                        ]);
                        ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <?=$content?>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- Main Footer -->
    <!--    <footer class="main-footer">
            <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0-pre
            </div>
        </footer>-->
    <div class="modal fade"  id="logout" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content mt-2" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-sign-out-alt"></i> Pretende terminar a sessão?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" href="<?= Url::toRoute(['site/logout']) ?>" data-method="POST" class="btn btn-outline-success" data-dismiss="modal"><b>SIM</b></button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ./wrapper -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
