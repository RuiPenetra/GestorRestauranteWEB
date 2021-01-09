<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Mesa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <img src="https://img.icons8.com/fluent-systems-filled/24/000000/table.png"/>
            Criar mesa
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="row col-md-12 d-flex justify-content-center">
                <div class="col-md-3 mt-0 ">
                    <div class="box-body box-profile user-painel mt-3">
                        <div class="text-center">
                            <img class="img-responsive" src="https://img.icons8.com/color/100/000000/table.png"/>
                            <!--                            <img class="img-responsive" width="100px" height="100px" src="img/soup.png" alt="imgPerfil">-->
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="input-group mb-3 col-md-8">
                        <div class="input-group-append">
                            <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                        </div>
                        <?= $form->field($model, 'id', ['options' => ['tag' => 'input',  'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Numero",  'type'=>'number', 'min'=>'0', 'autofocus' => true])->label(false) ?>
                    </div>
                    <div class="input-group mb-3 col-md-8">
                        <div class="input-group-append">
                            <span class="input-group-text rounded-left"><i class="fas fa-euro-sign"></i></span>
                        </div>
                        <?= $form->field($model, 'n_lugares', ['options' => ['tag' => 'input',  'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'placeholder' => "Nº Lugares",  'type'=>'number', 'min'=>'0', 'autofocus' => true])->label(false) ?>
                    </div>
                    <div class="input-group mb-3 d-flex justify-content-end col-md-8">
                        <?= Html::submitButton('Guardar', ['class' => 'btn login_btn col-md-4', 'name' => 'mesa-button']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.card-body -->
</div>