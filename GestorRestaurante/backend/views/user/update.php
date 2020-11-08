<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\User */

?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $this->title = 'Atualizar';?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= Url::toRoute(['user/index']) ?>">Utilizadores</a></li>
                    <li class="breadcrumb-item active"><?=$perfil->nome?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="utilizador-update">

    <div class="utilizador-create">
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
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                        </div>
                                        <?= $form->field($perfil, 'genero')->dropDownList(['1' => 'Masculino', '0' => 'Feminino'],
                                            ['prompt'=>'Selecione...'],['maxlenght'=> true],
                                            ['options'=> ['class' => 'form-control input_user rounded-right']])->label(false); ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        </div>
                                        <?= $form->field($user, 'cargo')->dropDownList(['gerente' => 'Gerente', 'atendedorPedidos' => 'Atendedor Pedidos', 'empregadoMesa' => 'Empregado Mesa', 'cozinheiro' => 'Cozinheiro', 'cliente' => 'Cliente'],
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
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <?= $form->field($user, 'email', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Email", 'type' => 'email'])->label(false) ?>
                                    </div>
                                   <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-key"></i></i></span>
                                        </div>
                                        <?= $form->field($user, 'password_atual', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Password", 'type' => 'password'])->label(false) ?>
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

</div>
