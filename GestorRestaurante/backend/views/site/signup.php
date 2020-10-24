<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
?>

<div class="container h-100 align-middle">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card_signup">
<!--            <div class="d-flex justify-content-center">
                <img src="img/logo.png" class="brand_logo" alt="Logo">
            </div>-->
            <div class="d-flex justify-content-center form_container">
                <?php $form = ActiveForm::begin(['id' => 'sign-form']); ?>
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
                            <?= $form->field($model, 'nome', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <?= $form->field($model, 'apelido', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Apelido", 'type' => 'email'])->label(false) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <?= $form->field($model, 'morada', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Morada"])->label(false) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <?= $form->field($model, 'codigopostal', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Codigo-Postal"])->label(false) ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <?= $form->field($model, 'datanascimento',['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'type' => 'date','autocomplete' => 'off'])->label(false) ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <?= $form->field($model, 'nacionalidade', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nacionalidade"])->label(false) ?>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                            </div>
                            <?= $form->field($model, 'telemovel', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Telemovel"])->label(false) ?>

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
                            <?= $form->field($model, 'username', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Username"])->label(false) ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <?= $form->field($model, 'email', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Email", 'type' => 'email'])->label(false) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></i></span>
                            </div>
                            <?= $form->field($model, 'password', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Password", 'type' => 'password'])->label(false) ?>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></i></span>
                            </div>
                            <?= $form->field($model, 'password_conf', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Conf. Password"])->label(false) ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                    <?= Html::submitButton('Registar', ['class' => 'btn login_btn', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>