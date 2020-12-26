<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pedidoproduto */

$this->title = 'Preparação';

?>
<?php $form = ActiveForm::begin(['class'=>'','validateOnBlur'=>false])?>

<div class="row col-md-12">
    <div class="col-md-4 text-center">
        <?php if ($itemPedido->produto->categoria->nome == 'Entrada'): ?>
            <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-responsive', 'width'=>'100px']); ?>
        <?php endif; ?>
        <?php if ($itemPedido->produto->categoria->nome == 'Sopa'): ?>
            <?= Html::img('@web/img/soup.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
        <?php endif; ?>
        <?php if ($itemPedido->produto->categoria->nome == 'Carne'): ?>
            <?= Html::img('@web/img/plates_meat.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
        <?php endif; ?>
        <?php if ($itemPedido->produto->categoria->nome == 'Peixe'): ?>
            <?= Html::img('@web/img/plates_fish.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'150px']); ?>
        <?php endif; ?>
        <?php if ($itemPedido->produto->categoria->nome == 'Sobremesa'): ?>
            <?= Html::img('@web/img/plates_dessert.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
        <?php endif; ?>
        <?php if ($itemPedido->produto->categoria->nome == 'Bebida'): ?>
            <?= Html::img('@web/img/drink.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
        <?php endif; ?>
    </div>
    <div class="col-md-3">
        <div class="row col-md-12 d-flex justify-content-center">
            <label>Quantidade Pedida:</label>
        </div>
        <div class="row col-md-12 d-flex justify-content-center">
            <div class="col-md-5 d-flex justify-content-center">
                <?= $form->field($itemPedido, 'quant_Pedida')->textInput(['type'=>'text','class'=>' form-control w-75 rounded', 'readonly'=>'true'])->label(false) ?>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row col-md-12 d-flex justify-content-center">
            <label>Quantidade Entregue:</label>
        </div>
        <div class="row col-md-12 d-flex justify-content-center">
            <div class="col-md-1 d-flex justify-content-center">
                <i class="fas fa-minus-circle fa-2x" style="color: #ff7e6a" onclick="quantEntreDeincrement(<?=$itemPedido->id?>);"></i>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <?= $form->field($itemPedido, 'quant_Entregue')->textInput(['type'=>'text','class'=>' form-control rounded w-75','id'=>'inputQuantEntregue'.$itemPedido->id, 'readonly'=>'true', 'placeholder'=>'0'])->label(false) ?>
            </div>
            <div class="col-md-1 d-flex justify-content-center">
                <i class="fas fa-plus-circle fa-2x" style="color: #6fda44" onclick="quantEntreIncrement(<?=$itemPedido->id?>);"></i>
            </div>
        </div>
    </div>
</div>
<div class="row col-md-12 d-flex justify-content-center">
    <div class="row col-md-12 d-flex justify-content-center">
        <?= $form->field($itemPedido->pedido, 'nota')->textarea(['class'=>' form-control','readonly'=>'true','value'=>$itemPedido->pedido->nota,'rows'=>5,'cols'=>60])->label(true) ?>
    </div>
    <div class="row col-md-12 d-flex justify-content-center">
        <?= Html::submitButton('Atualizar', ['class' => 'btn btn-success']) ?>

    </div>
</div>
<?php ActiveForm::end(); ?>