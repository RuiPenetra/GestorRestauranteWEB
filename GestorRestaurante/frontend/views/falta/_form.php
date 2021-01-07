<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Falta */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-calendar-alt"></i>
            Criar falta
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
                            <img class="img-responsive" width="100px" height="100px" src="img/calendario.png" alt="imgPerfil">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row col-md-8">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text rounded-left"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <?= $form->field($falta, 'data',['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'type' => 'date','autocomplete' => 'off'])->label(false) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text rounded-left"><i class="fas fa-clock"></i></span>
                                </div>
                                <?= $form->field($falta, 'hora_inicio')->textInput(['class'=>'form-control rounded-right','type'=>'time'])->label(false)?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text rounded-left"><i class="fas fa-clock"></i></span>
                                </div>
                                <?= $form->field($falta, 'hora_fim')->textInput(['class'=>'form-control rounded-right','type'=>'time'])->label(false)?>
                            </div>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <?= Html::submitButton('Criar', ['class' => 'btn login_btn col-md-4', 'name' => 'login-button']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.card-body -->
</div>
