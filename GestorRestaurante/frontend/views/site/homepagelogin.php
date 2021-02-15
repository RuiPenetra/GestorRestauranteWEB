<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\User;
/* @var $this yii\web\View */

$this->title = 'Home';
?>
<br>
<div class="site-index-bemvindo">
    <h2>Bem vindo</h2>
    <div class="row d-flex justify-content-center ">
        <div class="col-4 mt-2">
            <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$perfil->id_user) !=null):
                if ($perfil->genero==0):?>
                    <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cozinheiro img-fluid img-circle']); ?>
                <?php else:?>
                    <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cozinheiro img-fluid img-circle']); ?>
                <?php endif; endif;?>

            <?php if(Yii::$app->authManager->getAssignment('cliente',$perfil->id_user) != null):
                if ($perfil->genero==0):?>
                    <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cliente img-fluid img-circle']); ?>
                <?php else:?>
                    <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cliente img-fluid img-circle']); ?>
                <?php endif; endif;?>

            <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$perfil->id_user) != null):
                if ($perfil->genero==0):?>
                    <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-atendedor-pedidos img-fluid img-circle']); ?>
                <?php else:?>
                    <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-atendedor-pedidos img-fluid img-circle']); ?>
                <?php endif; endif;?>
            <?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$perfil->id_user) != null):
                if ($perfil->genero==0):?>
                    <?= Html::img('img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-empregado-mesa img-responsive img-circle']); ?>
                <?php else:?>
                    <?= Html::img('img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-empregado-mesa img-responsive img-circle']); ?>
                <?php endif; endif;?>
        </div>
    </div>

    <h4 class="mt-2"> <?=$perfil->nome." ".$perfil->apelido?> </h4>
</div>

<div class="row d-flex justify-content-center mt-5">

    <div class="card card-secondary col-md-3">
        <div class="card-header m-2 rounded">
            <div class="row col-12 d-flex justify-content-center">
                <h3 class="card-title ">Takeaway</h3>
            </div>
            <div class="row col-12 d-flex justify-content-center mt-2">
                <i class="fas fa-shopping-bag fa-2x" ></i>
            </div>
        </div>
        <div class="card-body col-12 d-flex justify-content-center">
            <h6>Desfrute do nosso takeaway no conforto da sua casa e veja quando esta
            pronto para ir buscar em tempo real atraves do nosso website.</h6>
        </div>
    </div>
    <div class="card card-secondary col-md-3">
        <div class="card-header m-2 rounded">
            <div class="row col-12 d-flex justify-content-center">
                <h3 class="card-title ">Ementa</h3>
            </div>

            <div class="row col-12 d-flex justify-content-center mt-2">
                <i class="fas fa-utensils fa-2x" ></i>
            </div>
        </div>

        <div class="card-body">
            <h6>Veja a nossa ementa em qualquer parte do mundo e procure um prato
            de 1 categoria especifica atraves dos nossos filtros.</h6>
        </div>
    </div>
    <div class="card card-secondary col-md-3">
        <div class="card-header m-2 rounded">
            <div class="row col-12 d-flex justify-content-center">
                <h3 class="card-title ">Contacto</h3>
            </div>
            <div class="row col-12 d-flex justify-content-center mt-2">
                <i class="fas fa-phone fa-2x" ></i>
            </div>
        </div>
        <div class="card-body">
            <h6>Em caso de alguma duvida não hesite em contactar-nos.</h6>
        </div>
    </div>

    <div class="card card-secondary col-md-3">
        <div class="card-header m-2 rounded">
            <div class="row col-12 d-flex justify-content-center">
                <h3 class="card-title ">Aplicação</h3>
            </div>

            <div class="row col-12 d-flex justify-content-center mt-2">
                <i class="fas fa-mobile-alt fa-2x"></i>
            </div>
        </div>
        <div class="card-body">
            <h6>Faça Download da nossa aplicação atraves da playstore</h6>
        </div>
        <div class="card-footer">
            <div class="row col-md-12 d-flex justify-content-center">
                <a href="https://play.google.com/store" >
                    <?=Html::img('img/android_download.png',['alt'=>'some', 'class'=>'img-responsive m-2','style'=>'width:130px'])?>
                </a>
                <br><br><br>
                    <a href="https://www.apple.com/app-store/" >
                        <?=Html::img('img/apple_download.png',['alt'=>'some', 'class'=>'img-responsive m-2','style'=>'width:130px'])?>
                    </a>
            </div>
        </div>
    </div>
