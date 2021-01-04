<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Horario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="horario-form">

    <?php $form = ActiveForm::begin(); ?>
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
                <div class="row col-md-12">
                    <div class="col-md-3 mt-0 ">
                        <div class="box-body box-profile user-painel mt-3">
                            <div class="text-center">
                                <img class="img-responsive" width="100px" height="100px" src="img/calendario.png" alt="imgPerfil">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                            </div>
                            <?= $form->field($horario, 'ano')->textInput(['placeholder'=>'Ano','class'=>'form-control rounded-right'])->label(false) ?>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text rounded-left"><i class="fas fa-clock"></i></span>
                            </div>
                            <?= $form->field($horario, 'mes')->dropDownList(['Janeiro'=>'Janeiro','Fevereiro'=>'Fevereiro','Março'=>'Março','Abril'=>'Abril','Maio'=>'Maio','Junho'=>'Junho','Julho'=>'Julho','Agosto'=>'Agosto','Setembro'=>'Setembro','Outubro'=>'Outubro','Novembro'=>'Novembro','Dezembro'=>'Dezembro'],['prompt' => '-- Mês --','class'=>'form-control rounded-right'])->label(false) ?>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text rounded-left"><i class="fas fa-calendar"></i></span>
                            </div>
                            <?= $form->field($horario, 'dia_semana')->dropDownList(['segunda'=>'Segunda-Feira','terça'=>'Terça-Feira','quarta'=>'Quarta-Feira','quinta'=>'Quinta-Feira','sexta'=>'Sexta-Feira','sabado'=>'Sábado','domingo'=>'Domingo'],['prompt' => '-- Dia da Semana --','class'=>'form-control rounded-right'])->label(false) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="row col-md-12">
                                <h7><b>Hora Inicio</b></h7>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text rounded-left"><i class="fas fa-clock"></i></span>
                            </div>
                            <?= $form->field($horario, 'hora_inicio')->textInput(['type'=>'time','class'=>'form-control rounded-right','maxlength' => true])->label(false) ?>
                        </div>
                        <div class="input-group mb-3">
                            <div class="row col-md-12">
                                <h7><b>Hora Fim</b></h7>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text rounded-left"><i class="fas fa-clock"></i></span>
                            </div>
                            <?= $form->field($horario, 'hora_fim')->textInput(['type'=>'time','class'=>'form-control rounded-right','maxlength' => true])->label(false) ?>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.card-body -->
    </div>
    <?php ActiveForm::end(); ?>

</div>
