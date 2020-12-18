<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pedidoproduto */

$this->title = 'Cozinha';

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
                <div class="col-md-5 d-flex justify-content-center">
                    <?= $form->field($itemPedido, 'quant_Pedida')->textInput(['type'=>'text','class'=>' form-control w-75 rounded', 'readonly'=>'true'])->label(false) ?>
                </div>
            </div>
            <div class="row col-md-12 d-flex justify-content-center">
                <div class="col-md-2">
                    <i class="fas fa-minus-circle fa-2x" style="color: red" onclick="quantDeincrement(<?=$itemPedido->id?>,<?=$itemPedido->produto->preco?>);"></i>
                </div>
                <div class="col-md-5 d-flex justify-content-center">
                    <?= $form->field($itemPedido, 'quant_Entregue')->textInput(['type'=>'text','class'=>' form-control w-75 rounded','id'=>'inputQuantidade'.$itemPedido->id, 'readonly'=>'true', 'placeholder'=>'0'])->label(false) ?>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-plus-circle fa-2x" style="color: limegreen" onclick="quantIncrement(<?=$itemPedido->id?>,<?=$itemPedido->produto->preco?>);"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row col-md-12 d-flex justify-content-center">
    <?= $form->field($itemPedido->pedido, 'nota')->textarea(['class'=>' form-control','readonly'=>'true','value'=>$itemPedido->pedido->nota,'rows'=>5,'cols'=>60])->label(true) ?>
</div>

<?= Html::submitButton('Atualizar', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>