<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-search">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>


    <div class="row d-flex justify-content-center"
        <div class="col-sm">
            <?= $form->field($model, 'nome') ?>
<div class="precobox">
            <?= $form->field($model, 'preco') ?>
</div>

<div class="categoriabox">
            <?= $form->field($model, 'id_categoria')->dropDownList($categorias,['prompt'=>'Todas as Categorias'])->label(false);?>
</div>
    </div>
    
    <div class="form-group d-flex justify-content-center">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
