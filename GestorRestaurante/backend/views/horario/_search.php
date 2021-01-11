<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\HorarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>
    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>

    <div class="row col-md-12 ml-2 mr-2">
        <div class="col-md-9">
            <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-text rounded-left"><i class="fas fa-calendar"></i></span>
                    </div>
                    <?= $form->field($model, 'ano')->textInput(['placeholder'=>'Ano','class'=>'form-control rounded-right','style'=>'width:120px'])->label(false) ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-text rounded-left"><i class="fas fa-calendar"></i></span>
                    </div>
                    <?= $form->field($model, 'mes')->dropDownList(['Janeiro'=>'Janeiro','Fevereiro'=>'Fevereiro','Março'=>'Março','Abril'=>'Abril','Maio'=>'Maio','Junho'=>'Junho','Julho'=>'Julho','Agosto'=>'Agosto','Setembro'=>'Setembro','Outubro'=>'Outubro','Novembro'=>'Novembro','Dezembro'=>'Dezembro'],['class'=>'form-control rounded-right'])->label(false) ?>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-3">
            <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-dark']) ?>
        </div>

    </div>

    <div class="row col-md-12 justify-content-center mt-3 mb-2">
        <span class="badge badge-dark p-1 pr-4 pl-4" style="border-radius: 50px"><h2><?=$model->mes?></h2></span>
    </div>
    <?php ActiveForm::end(); ?>

