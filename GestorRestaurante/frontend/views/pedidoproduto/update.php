<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pedidoproduto */

$this->title = 'Atualizar item';
?>
<?php $form = ActiveForm::begin(['class'=>'','validateOnBlur'=>false])?>

<div class="row col-md-12">
    <div class="col-md-3 d-flex justify-content-center">
        <?php if ($itemPedido->produto->categoria->nome == 'Entrada'): ?>
            <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-responsive', 'width'=>'100px']); ?>
        <?php endif; ?>
        <?php if ($itemPedido->produto->categoria->nome == 'Sopa'): ?>
            <?= Html::img('@web/img/soup.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
        <?php endif; ?>
        <?php if ($itemPedido->produto->categoria->nome == 'Carne'): ?>
            <?= Html::img('@web/img/plates_meat.png', ['alt' => 'Product Image', 'class' => 'img-responsive' ,'width'=>'100px']); ?>
        <?php endif; ?>
        <?php if ($itemPedido->produto->categoria->nome == 'Peixe'): ?>
            <?= Html::img('@web/img/plates_fish.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
        <?php endif; ?>
        <?php if ($itemPedido->produto->categoria->nome == 'Sobremesa'): ?>
            <?= Html::img('@web/img/plates_dessert.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
        <?php endif; ?>
        <?php if ($itemPedido->produto->categoria->nome == 'Bebida'): ?>
            <?= Html::img('@web/img/drink.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
        <?php endif; ?>
    </div>
    <div class="row col-md-9">
        <div class="row col-md-6 d-flex justify-content-center">
            <div class="row col-md-12 d-flex justify-content-center">
                <label>Quantidade:</label>
            </div>
            <div class="row col-md-12 d-flex justify-content-center">
                <div class="col-md-2">
                    <i class="fas fa-minus-circle fa-2x" style="color: red" onclick="quantDeincrement(<?=$itemPedido->id?>,<?=$itemPedido->produto->preco?>);"></i>
                </div>
                <div class="col-md-5 d-flex justify-content-center">
                    <?= $form->field($itemPedido, 'quant_Pedida')->textInput(['type'=>'text','value'=>$itemPedido->quant_Pedida,'class'=>' form-control w-75 rounded','id'=>'inputQuantidade'.$itemPedido->id, 'readonly'=>'true','oninput'=>'calcularPreco('.$itemPedido->id.','.$itemPedido->produto->preco.')', 'placeholder'=>'0'])->label(false) ?>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-plus-circle fa-2x" style="color: limegreen" onclick="quantIncrement(<?=$itemPedido->id?>,<?=$itemPedido->produto->preco?>);"></i>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <?= $form->field($itemPedido, 'preco')->textInput(['type'=>'number','class'=>' form-control rounded w-75','min'=>'0' , 'step'=>'0.01','id'=>'inputPrecoTotal'.$itemPedido->id, 'readonly'=>'true'])->label('Preço Total') ?>
            </div>
        </div>
    </div>
</div>
<div class="row col-md-12 d-flex justify-content-center">
    <?= $form->field($pedido, 'nota')->textarea(['class'=>' form-control','value'=>$itemPedido->pedido->nota,'rows'=>5,'cols'=>60])->label(true) ?>
</div>

<?= Html::submitButton('Atualizar', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>