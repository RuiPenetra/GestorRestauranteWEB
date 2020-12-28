<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MesaSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'method' => 'get',
]); ?>

<div class="row m-2">
    <div class="col-3">

        <?= $form->field($model, 'id')->textInput(['class'=>'form-control rounded', 'placeholder'=>'Nº', 'min'=>'0','type'=>'number'])->label(false) ?>
    </div>
    <div class="col-3">
        <?= $form->field($model, 'n_lugares')->textInput(['class'=>'form-control rounded', 'placeholder'=>'Lugares','min'=>'0','type'=>'number'])->label(false) ?>
    </div>
    <div class="col-3">
        <?= $form->field($model, 'estado')->dropDownList(['0'=>'Reservada','1'=>'Ocupada','2'=>'Livre'],['prompt' => '-- Select one --','class'=>'form-control rounded'])->label(false) ?>
    </div>
    <div class="col-3">
        <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

