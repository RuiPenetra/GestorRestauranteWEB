<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoriaProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<div class="row col-md-12 m-3">
    <div class="col-md-3">
        <?= $form->field($model, 'categoria')->textInput(['class'=>'form-control rounded', 'placeholder'=>'Nome'])->label(false) ?>
    </div>
    <div class="col-md-4">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
