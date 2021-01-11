<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MesaSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'method' => 'get',
]); ?>

<div class="row m-2">
    <div class="col-3">

        <?= $form->field($model, 'id')->textInput(['class'=>'form-control rounded w-50', 'placeholder'=>'Nº', 'min'=>'0','type'=>'number'])->label(false) ?>
    </div>
    <div class="col-3">
        <?= $form->field($model, 'n_lugares')->textInput(['class'=>'form-control rounded w-50', 'placeholder'=>'Lugares','min'=>'0','type'=>'number'])->label(false) ?>
    </div>
    <div class="col-3">
        <?= $form->field($model, 'estado')->dropDownList(['0'=>'Reservada','1'=>'Ocupada','2'=>'Livre','3'=>'Inativa'],['prompt' => '-- Mesas --','class'=>'form-control rounded'])->label(false) ?>
    </div>
    <div class="col-3">
        <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-primary','name'=>'searchMesa-button']) ?>
        <?= Html::resetButton('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-dark']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

