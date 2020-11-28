<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\User;
/* @var $this yii\web\View */

$this->title = 'Gestor Restaurante';
?>


<br>
<div class="site-index-bemvindo">
<h2>Bem vindo, <?=$perfil->nome?></h2>
<div class="row d-flex justify-content-center ">
    <div class="col-4 mt-5">

    </div>
</div>
            <?= Html::img('img/perfil.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-cliente img-responsive img-circle']); ?>
</div>

<div class="row d-flex justify-content-center mt-5">

            <div class="card card-secondary col-md-3">
                    <div class="card-header" >

                            <div class="row col-12 d-flex justify-content-center">
                        <h3 class="card-title ">Takeaway</h3>
                            </div>

                            <div class="row col-12 d-flex justify-content-center mt-2">
                        <i class="fas fa-shopping-bag fa-2x" ></i>
                            </div>
                    </div>
                    <div class="card-body col-12 d-flex justify-content-center">
                        <h6>Desfrute do nosso takeaway no conforto da sua casa</h6>
                    </div>
            </div>




            <div class="card card-secondary col-md-3">
                <div class="card-header">
                    <div class="row col-12 d-flex justify-content-center">
                        <h3 class="card-title ">Ementa</h3>
                    </div>

                    <div class="row col-12 d-flex justify-content-center mt-2">
                        <i class="fas fa-utensils fa-2x" ></i>
                    </div>
                </div>

                <div class="card-body">
                    <h6>Veja a nossa ementa em qualquer parte do mundo</h6>
                </div>
            </div>




            <div class="card card-secondary col-md-3">
                <div class="card-header">
                    <div class="row col-12 d-flex justify-content-center">
                        <h3 class="card-title ">Contacto</h3>
                    </div>

                    <div class="row col-12 d-flex justify-content-center mt-2">
                        <i class="fas fa-phone fa-2x" ></i>
                    </div>
                </div>

                <div class="card-body">
                    <h6>Em caso de alguma duvida não hesite em contactar-nos</h6>
                </div>
            </div>



            <div class="card card-secondary col-md-3">
                <div class="card-header">
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
                    <!--PERGUNTAR A STORA-->
                        <div class="row col-md-12 d-flex justify-content-center">
                         <?//php return Html::a('',"www.play.google.com"); Html::img('img/android_download.png' , ['alt'=>'some', 'class'=>'img-responsive','style'=>'width:200px']);?>
                              <?//= HTML::img('img/android_download.png',URL::to('www.google.com'))?>
                            <div class="row col-md-12 d-flex justify-content-center">

)
                            <?=Html::img('img/apple_download.png',['alt'=>'some', 'class'=>'img-responsive','style'=>'width:200px'])?> <?=Html::a("","www.play.google.com")?> </a>
                        </div>
                </div>

</div>



<div class="container-fluid">


</div>
