<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */


use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
?>

<div class="container h-100 align-middle">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card_login">
            <div class="row d-flex justify-content-center mb-3">
                <h3>Login</h3>
            </div>
            <div class="row d-flex justify-content-center mb-3">
                <?= Html::img('@web/img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-default img-fluid img-circle']); ?>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <?php $form = ActiveForm::begin(['id' => 'login-form','enableClientValidation'=> false]); ?>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <?= $form->field($model, 'username', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Username", 'type' => 'text' , 'autofocus' => true])->label(false) ?>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <?= $form->field($model, 'password', ['options' => ['tag' => 'input', 'style' => 'display: none;']])->textInput(['class'=> 'form-control input_pass rounded-right', 'placeholder' => "Password", 'type' => 'password' , 'autofocus' => true])->label(false) ?>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <?= Html::submitButton('Login', ['class' => 'btn login_btn', 'name' => 'login-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    Não tem conta?? <a href="<?=URL::toRoute(['site/signup'])?>" class="ml-2">Registar-me</a>
                </div>
            </div>
        </div>
    </div>
</div>
