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
        <?= $form->field($model, 'data')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Data','class'=>'rounded'],
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
    <div class="col-md-2">
        <?= $form->field($model, 'tipo')->dropDownList(['0' => 'Restaurante', '1' => 'Takeaway'],['prompt'=>'Selecione...', 'maxlenght'=> true,'class' => 'form-control rounded'])->label(false); ?>    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'estado')->dropDownList(['0' => 'Em Processo', '1' => 'Em Progresso', '2' => 'Concluido'],['prompt'=>'Selecione...', 'maxlenght'=> true,'class' => 'form-control rounded'])->label(false); ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'id_mesa')->dropDownList($mesas,['prompt'=>'Selecione...', 'maxlenght'=> true,'class' => 'form-control rounded'])->label(false); ?>
    </div>
    <div class="col-md-3">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
