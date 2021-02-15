<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
$this->title="Login"
?>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-custom-0">
        <div class="card-header text-center">
            <a href="<?= Url::toRoute(['site/login'])?>" class="h3"><b>Gestor Restaurante</b></a>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center mb-3">
                <?= Html::img('@web/img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img profile-user-img-color-default img-fluid img-circle']); ?>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'login-form','enableClientValidation'=> false]); ?>
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
                <div class="row mt-3">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-custom-0 btn-block', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->