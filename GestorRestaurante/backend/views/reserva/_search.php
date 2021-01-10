<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReservaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row col-12 d-flex justify-content-center">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>
    <div class="row mb-2">

    <?= $form->field($model, 'n_pessoas')->textInput(['class' => 'form-control rounded mr-3','type'=>'number', 'min'=>'0','placeholder'=>'Nº pessoas'])->label(false) ?>

    <?= $form->field($model, 'nome_da_reserva')->textInput(['class' => 'form-control rounded mr-3','placeholder'=>'Nome responsavel'])->label(false)  ?>

    <?= $form->field($model, 'id_mesa')->dropDownList($mesas,['prompt'=>'-- Mesa --', 'maxlenght'=> true,'class' => 'form-control rounded mr-3'])->label(false); ?>

        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary mr-3']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-outline-secondary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
