<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

\yii\web\YiiAsset::register($this);
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?=$perfil->nome?> <?=$perfil->apelido?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= Url::toRoute(['user/index']) ?>">Utilizadores</a></li>
                    <li class="breadcrumb-item active"><?=$perfil->nome?> <?=$perfil->apelido?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="utilizador-view">
        <div class="row d-flex justify-content-center">
            <div class="col-10">
                <div class="card p-5">
                    <div class="card-body">
                        <div class="align-center">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="mb-4">
                                <h6 class="text-uppercase">Dados Pessoais</h6>
                                <!-- Solid divider -->
                                <hr class="solid">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="box-body box-profile user-painel mt-3">
                                        <div class="profile-username text-center">
                                            <img class="img-responsive img-circle" width="100px" height="100px" src="img/perfil.png" alt="imgPerfil">
                                            <div class="info center">
                                                <div style="text-align: center;">
                                                    <?php if (Yii::$app->authManager->getAssignment('gerente',$user->id) != null):?>
                                                        <span class="center badge badge-warning"><h8>Gerente</h8></span>
                                                    <?php endif;?>
                                                    <?php if (Yii::$app->authManager->getAssignment('cliente',$user->id) != null):?>
                                                        <span class="center badge badge-danger"><h8>Cliente</h8></span>
                                                    <?php endif;?>
                                                    <?php if (Yii::$app->authManager->getAssignment('atendedorPedidos',$user->id) != null):?>
                                                        <span class="center badge badge-primary"><h8>Atendedor Pedidos</h8></span>
                                                    <?php endif;?>
                                                    <?php if (Yii::$app->authManager->getAssignment('empregadoMesa',$user->id) != null
                                                    ):?>
                                                        <span class="center badge badge-indigo-light"><h8>Empregado Mesa</h8></span>
                                                    <?php endif;?>
                                                    <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$user->id) != null):?>
                                                        <span class="center badge badge-success"><h8>Cozinheiro</h8></span>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <?= $form->field($perfil, 'nome', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome"])->label(false) ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <?= $form->field($perfil, 'apelido', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Apelido"])->label(false) ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <?= $form->field($perfil, 'genero')->dropDownList(['1' => 'Masculino', '0' => 'Feminino'], ['disabled' => 'disabled'],
                                            ['prompt'=>'Selecione...'],['maxlenght'=> true],
                                            ['options'=> ['class' => 'form-control input_user rounded-right']])->label(false); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <?= $form->field($perfil, 'morada', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Morada"])->label(false) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <?= $form->field($perfil, 'codigopostal', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Codigo-Postal"])->label(false) ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <?= $form->field($perfil, 'datanascimento',['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'type' => 'date','autocomplete' => 'off'])->label(false) ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <?= $form->field($perfil, 'nacionalidade', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Nacionalidade"])->label(false) ?>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <?= $form->field($perfil, 'telemovel', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Telemovel"])->label(false) ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            </div>
                            <div class="mb-4 mt-4">
                                <h6 class="text-uppercase">Dados Acesso</h6>
                                <!-- Solid divider -->
                                <hr class="solid">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <?= $form->field($user, 'username', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Username"])->label(false) ?>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <?= $form->field($user, 'email', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput([ 'readonly' => true,'class'=>'form-control input_user rounded-right' , 'placeholder' => "Email", 'type' => 'email'])->label(false) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <?= Html::submitButton('Atualizar', ['class' => 'btn login_btn', 'name' => 'login-button']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
        </div>
</div>