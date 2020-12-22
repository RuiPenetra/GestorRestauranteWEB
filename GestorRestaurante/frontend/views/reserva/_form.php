<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Reserva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'n_pessoas')->textInput() ?>

    <?= $form->field($model, 'data_hora')->textInput() ?>

    <?= $form->field($model, 'nome_da_reserva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempo_reserva')->textInput() ?>

    <?= $form->field($model, 'id_mesa')->textInput() ?>

    <?= $form->field($model, 'id_funcionario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
