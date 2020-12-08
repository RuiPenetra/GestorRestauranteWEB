<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin([
    'method' => 'get',
]); ?>

<div class="row col-md-12">
    <div class="col-md-3">
        <?= $form->field($model, 'nome')->textInput(['class'=>'form-control rounded', 'placeholder'=>'Nome'])->label(false) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'preco', ['options' => ['tag' => 'input',  'style' => 'display: none; ']])->textInput(['class'=>'form-control rounded' , 'placeholder' => 'Preço',  'type'=>'number', 'step' => '0.01', 'autofocus' => true])->label(false) ?>
    </div>
    <div class="col-md-3">
        <?=$form->field($model,'id_categoria')->dropDownList($categorias,['class'=>'form-control rounded','prompt' => '---Categoria---'])->label(false);?>
    </div>
    <div class="col-md-3">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
