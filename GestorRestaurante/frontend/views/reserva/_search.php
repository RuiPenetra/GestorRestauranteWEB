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

    <div class="row d-flex justify-content-center">
        <div class="col-sm">
    <?= $form->field($model, 'n_pessoas') ?>
        </div>
        <div class="col-sm">
    <?= $form->field($model, 'data_hora') ?>
        </div>
        <div class="col-sm">
    <?= $form->field($model, 'nome_da_reserva') ?>
        </div>
    </div>

    <?php // echo $form->field($model, 'id_mesa') ?>

    <?php // echo $form->field($model, 'id_funcionario') ?>

    <div class="form-group row d-flex justify-content-center">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
