<?php

use kartik\date\DatePicker;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Criar utilizador';
$this->params['breadcrumbs'][] = ['label' => 'Utilizadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>

<div class="utilizador-create">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="card p-5">
                <div class="card-body">
                    <div class="align-center">
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
                                        <?= Html::img('@web/img/male.png', ['alt' => 'imgPerfil', 'id'=>'wizardPicturePreview', 'class' => 'profile-user-img img-fluid img-circle']); ?>
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
                                        <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                                    </div>
                                    <?= $form->field($model, 'nome', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => 'Nome',  'autofocus' => true,'maxlength' => true])->label(false) ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                                    </div>
                                    <?= $form->field($model, 'apelido', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => 'Apelido','maxlength' => true])->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left"><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <?= $form->field($model, 'morada', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Morada"])->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <?= $form->field($model, 'codigopostal', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => 'Codigo-Postal','maxlength' => true])->label(false) ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <?= $form->field($model, 'datanascimento',['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'type' => 'date','autocomplete' => 'off'])->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left"><i class="fas fa-globe-asia"></i></span>
                                    </div>
                                    <?= $form->field($model, 'nacionalidade', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => 'Nacionalidade','maxlength' => true])->label(false) ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left"><i class="fas fa-phone-alt"></i></span>
                                    </div>
                                    <?= $form->field($model, 'telemovel', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => 'Telemovel','maxlength' => true])->label(false) ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left"><i class="fas fa-venus-mars"></i></span>
                                    </div>
                                    <?= $form->field($model, 'genero')->dropDownList(['1' => 'Masculino', '0' => 'Feminino'],
                                        ['prompt'=>'Selecione...'],['maxlenght'=> true],
                                        ['options'=> ['class' => 'rounded-right form-control input_user','name'=>'genero']])->label(false); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left"><i class="fas fa-user-tag"></i></span>
                                    </div>
                                    <?= $form->field($model, 'cargo')->dropDownList(['gerente' => 'Gerente', 'atendedorPedidos' => 'Atendedor Pedidos', 'empregadoMesa' => 'Empregado Mesa', 'cozinheiro' => 'Cozinheiro', 'cliente' => 'Cliente'],
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
                                        <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                                    </div>
                                    <?= $form->field($model, 'username', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => 'Username','maxlength' => true])->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <?= $form->field($model, 'email', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Email", 'type' => 'email','maxlength' => true])->label(false) ?>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left"><i class="fas fa-key"></i></i></span>
                                    </div>
                                    <?= $form->field($model, 'password', ['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Password", 'type' => 'password','maxlength' => true])->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <?= Html::submitButton('Criar', ['class' => 'btn login_btn', 'name' => 'create-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
    </div>

</div>
