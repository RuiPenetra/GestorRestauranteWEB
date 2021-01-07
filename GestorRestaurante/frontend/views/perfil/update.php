<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */

?>

<?php $id_user = Yii::$app->user->identity->id;?>

<div class="utilizador-update">
    <div class="row d-flex justify-content-center">
        <div class="col-md-3">
            <!-- Profile Image -->
            <?php if(Yii::$app->authManager->getAssignment('cliente',$id_user) != null):?>
            <div class="card card-danger card-outline">
                <?php endif?>

                <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id_user) != null):?>
                <div class="card card-blue card-outline">
                    <?php endif?>

                    <?php if(Yii::$app->authManager->getAssignment('cozinheiro',$id_user) != null):?>
                    <div class="card card-green card-outline">
                        <?php endif?>

                        <?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id_user) != null):?>
                        <div class="card card-purple card-outline">
                            <?php endif?>


                            <div class="card-body box-profile">
                                <div class="text-center">
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
                                </div>

                                <h3 class="profile-username text-center"><?=$perfil->nome?> <?=$perfil->apelido?></h3>
                                <p class="d-flex justify-content-center">
                                <?php if(Yii::$app->authManager->getAssignment('cliente',$id_user) != null):?>
                                    <span class="badge badge-danger text-white">Cliente</span>
                                <?php endif?>

                                <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id_user) != null):?>
                                    <span class="badge badge-primary text-white">Atendedor Pedidos</span>
                                <?php endif?>

                                <?php if(Yii::$app->authManager->getAssignment('cozinheiro',$id_user) != null):?>
                                    <span class="badge badge-success text-white">Cozinheiro</span>
                                <?php endif?>

                                <?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id_user) != null):?>
                                    <span class="badge badge-indigo text-white">Empregado Mesa</span>
                                <?php endif?>
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-body">
                                <strong><i class="fas fa-user-alt mr-1"></i>Nome</strong>
                                <p class="text-muted"><?=$perfil->nome?> <?=$perfil->apelido?></p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i>Morada</strong>
                                <p class="text-muted"><?=$perfil->morada?></p>
                                <hr>
                                <strong><i class="fas fa-calendar-alt mr-1"></i>Data Nascimento </strong>
                                <p class="text-muted"><?=$perfil->datanascimento?></p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Genero</strong>
                                <p class="text-muted">
                                    <?php
                                    if($perfil->genero == 0):?>
                                        Feminino
                                    <?php else:?>
                                        Masculino
                                    <?php endif;
                                    ?>
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="align-center">
                                    <?php $form = ActiveForm::begin(); ?>
                                    <div class="mb-4">
                                        <h6 class="text-uppercase">Dados Pessoais</h6>
                                        <!-- Solid divider -->
                                        <hr class="solid">
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="img/perfil.png" class="picture-src" id="wizardPicturePreview" title="">
                                                    <input type="file" id="wizard-picture" class="">
                                                </div>
                                                <h6 class="">Escolher imagem</h6>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <?= $form->field($perfil, 'nome', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <?= $form->field($perfil, 'apelido', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Apelido"])->label(false) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                </div>
                                                <?= $form->field($perfil, 'morada', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Morada"])->label(false) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <?= $form->field($perfil, 'codigopostal', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Codigo-Postal"])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                                <?= $form->field($perfil, 'datanascimento',['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'type' => 'date','autocomplete' => 'off'])->label(false) ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                                </div>
                                                <?= $form->field($perfil, 'nacionalidade', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nacionalidade"])->label(false) ?>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                                </div>
                                                <?= $form->field($perfil, 'telemovel', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Telemovel"])->label(false) ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append" id="genero">
                                                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                                </div>
                                                <?= $form->field($perfil, 'genero')->dropDownList(['1' => 'Masculino', '0' => 'Feminino'],
                                                    ['prompt'=>'Selecione...'],['maxlenght'=> true],
                                                    ['options'=> ['class' => 'form-control input_user rounded-right']])->label(false); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <h6 class="text-uppercase">Dados Acesso</h6>
                                        <!-- Solid divider -->
                                        <hr class="solid">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <?= $form->field($user, 'username', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Username"])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <?= $form->field($user, 'email', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Email", 'type' => 'email'])->label(false) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-right">
                                        <?= Html::submitButton('Atualizar', ['class' => 'btn login_btn', 'name' => 'login-button']) ?>
                                    </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->