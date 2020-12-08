<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReservaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'n_pessoas') ?>

    <?= $form->field($model, 'data_hora') ?>

    <?= $form->field($model, 'nome_da_reserva') ?>

    <?= $form->field($model, 'tempo_reserva') ?>

    <?php // echo $form->field($model, 'id_mesa') ?>

    <?php // echo $form->field($model, 'id_funcionario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
