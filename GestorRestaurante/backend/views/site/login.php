<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
?>
<div class="container h-100 align-middle">
    <div class="d-flex justify-content-center">
        <div class="user_card_login">
            <div class="d-flex justify-content-center">
                <img src="img/logo.png" class="brand_logo" alt="Logo">
            </div>
            <div class="d-flex justify-content-center">
                <h3 style="font-family: Arial, sans-serif"><b>Gestor Restaurante</b></h3>
            </div>
            <div class="d-flex justify-content-center form_container">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text rounded-left"><i class="fas fa-envelope"></i></span>
                    </div>
                    <?= $form->field($model, 'username', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control rounded-right' , 'placeholder' => "Username",'autofocus' => true])->label(false) ?>
                </div>
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-text rounded-left"><i class="fas fa-key"></i></span>
                    </div>
                    <?= $form->field($model, 'password', ['options' => ['tag' => 'input', 'style' => 'display: none;']])->textInput(['class'=> 'form-control rounded-right', 'placeholder' => "Password", 'type' => 'password' , 'autofocus' => true])->label(false) ?>

                </div>
                <div class=" custom-checkbox">
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                    <?= Html::submitButton('Login', ['class' => 'btn login_btn', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
