<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>


<div class="row col-md-12 m-3">
    <div class="col-md-3">
        <?= $form->field($model, 'nome')->textInput(['class'=>'form-control rounded', 'placeholder'=>'Nome'])->label(false) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'apelido')->textInput(['class'=>'form-control rounded', 'placeholder'=>'Apelido'])->label(false) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'cargo')->dropDownList(['gerente' => 'Gerente', 'atendedorPedidos' => 'Atendedor Pedidos', 'empregadoMesa' => 'Empregado Mesa', 'cozinheiro' => 'Cozinheiro', 'cliente' => 'Cliente'],['prompt' => '-- Selecione --','class'=>'form-control rounded'])->label(false) ?>
    </div>
    <div class="col-md-3">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

