<?php

use common\models\User;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */


?>
<?php $id_user = Yii::$app->user->identity->id;
$user=User::findOne(['id'=>$id_user])?>
<div class="utilizador-update">
    <div class="row d-flex justify-content-center">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-yellow card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <?= Html::img('img/perfil.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img img-fluid img-circle']); ?>
                    </div>

                    <h3 class="profile-username text-center"><?=$model->nome?> <?=$model->apelido?></h3>

                    <p class="text-muted text-center">Gerente</p>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-body">
                    <strong><i class="fas fa-user-alt mr-1"></i>Nome</strong>
                    <p class="text-muted"><?=$model->nome?> <?=$model->apelido?></p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Morada</strong>
                    <p class="text-muted"><?=$model->morada?></p>
                    <hr>
                    <strong><i class="fas fa-calendar-alt mr-1"></i>Data Nascimento </strong>
                    <p class="text-muted"><?=$model->datanascimento?></p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Genero</strong>
                    <p class="text-muted">
                        <?php
                        if($model->genero == 0):?>
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
                                        <?= $form->field($model, 'nome', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nome",  'autofocus' => true])->label(false) ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <?= $form->field($model, 'apelido', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Apelido"])->label(false) ?>
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
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <?= $form->field($model, 'genero')->dropDownList(['1' => 'Masculino', '0' => 'Feminino'],
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