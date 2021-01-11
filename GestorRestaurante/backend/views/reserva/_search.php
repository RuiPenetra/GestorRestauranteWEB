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
    <div class="row">

        <?= $form->field($model, 'n_pessoas')->textInput(['class' => 'form-control rounded mr-3','type'=>'number', 'min'=>'0','placeholder'=>'Nº pessoas'])->label(false) ?>

        <?= $form->field($model, 'nome_da_reserva')->textInput(['class' => 'form-control rounded mr-3','placeholder'=>'Nome responsavel'])->label(false)  ?>

        <?= $form->field($model, 'id_mesa')->dropDownList($mesas,['prompt'=>'-- Mesa --', 'maxlenght'=> true,'class' => 'form-control rounded mr-3'])->label(false); ?>
        <div class="form-group">

        <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-dark']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
