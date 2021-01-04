<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FaltaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="falta-search">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>

    <div class="row d-flex justify-content-center">

        <div class="col-md-4">
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text rounded-left"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <?= $form->field($falta, 'data',['options' => ['tag' => 'input', 'style' => 'display: none; ']])->textInput(['class'=>'form-control input_user rounded-right' , 'type' => 'date','autocomplete' => 'off'])->label(false) ?>
            </div>
        </div>


        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
