<?php

use kartik\datetime\DateTimePicker;
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

    <div class="row">
        <div class="col-3">
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
        <div class="col-3">
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
        </div>
        <div class="col-3">
            <?= $form->field($falta, 'num_horas')->textInput(['class'=>'form-control rounded', 'placeholder'=>'Nºhoras','min'=>'0','type'=>'number'])->label(false) ?>
        </div>
        <div class="col-3">
            <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Limpar', ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
