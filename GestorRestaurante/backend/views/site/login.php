<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */


use hail812\adminlte3\widgets\Alert;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;



?>
<div class="container h-100 align-middle">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card_login">
            <div class="d-flex justify-content-center">
                <img src="img/logo.png" class="brand_logo" alt="Logo">
            </div>
            <div class="d-flex justify-content-center form_container">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text-login"><i class="fas fa-envelope"></i></span>
                    </div>
                    <?= $form->field($model, 'username', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Username",'autofocus' => true])->label(false) ?>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text-login"><i class="fas fa-key"></i></span>
                    </div>
                    <?= $form->field($model, 'password', ['options' => ['tag' => 'input', 'style' => 'display: none;']])->textInput(['class'=> 'form-control input_pass rounded-right', 'placeholder' => "Password", 'type' => 'password' , 'autofocus' => true])->label(false) ?>

                </div>
                <div class=" custom-checkbox">
                    <?= $form->field($model, 'rememberMe')->textInput(['class' => 'custom-control-input'])->checkbox() ?>
                    Esqueceu-se da sua password? <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    <!--//Need new verification email? --><?/*= Html::a('Resend', ['site/resend-verification-email']) */?>
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                    <?= Html::submitButton('Login', ['class' => 'btn login_btn', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>

            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    Não tem conta?? <a href="#" class="ml-2">Registar-me</a>
                </div>
            </div>
        </div>
    </div>
</div>
