<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Falta */

$this->title = $user->id;
$this->params['breadcrumbs'][] = ['label' => 'Faltas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
            Criar Falta
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
                            <img class="img-responsive" width="100px" height="100px" src="img/soup.png" alt="imgPerfil">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <?= $form->field($falta, 'data_inicio')->widget(DateTimePicker::classname(), [
                            'options' => ['placeholder' => 'Data Inicio'],
                            'type' =>DateTimePicker::TYPE_COMPONENT_PREPEND,
                            'size'=>'md',
                            'readonly' => true,
                            'pluginOptions' => [
                                'todayBtn' => true,
                                'autoclose' => true,
                                'language'=>'pt-PT',
                            ]
                        ])->label(false);?>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <?= $form->field($falta, 'num_horas')->textInput(['type'=>'number', 'min' => 0, 'max' => 10000, 'step' => 1])->label(false);?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <?= $form->field($falta, 'data_fim')->widget(DateTimePicker::classname(), [
                            'options' => ['placeholder' => 'Data Fim'],
                            'type' =>DateTimePicker::TYPE_COMPONENT_PREPEND,
                            'size'=>'md',
                            'readonly' => true,
                            'pluginOptions' => [
                                'todayBtn' => true,
                                'autoclose' => true,
                                'language'=>'pt-PT',
                            ]
                        ])->label(false);?>
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
