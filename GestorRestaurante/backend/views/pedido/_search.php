<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PedidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>

<div class="row col-md-12">
    <div class="col-md-2">

    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'tipo')->dropDownList(['0' => 'Restaurante', '1' => 'Takeaway'],['prompt'=>'-- Tipo --', 'maxlenght'=> true,'class' => 'form-control rounded'])->label(false); ?>    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'estado')->dropDownList(['0' => 'Em Processo', '1' => 'Em Progresso', '2' => 'Concluido'],['prompt'=>'-- Estado --', 'maxlenght'=> true,'class' => 'form-control rounded'])->label(false); ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'id_mesa')->dropDownList($mesas,['prompt'=>'-- Mesa --', 'maxlenght'=> true,'class' => 'form-control rounded'])->label(false); ?>
    </div>
    <div class="col-md-3">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
