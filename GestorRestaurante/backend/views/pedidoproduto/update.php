<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pedidoproduto */

$this->title = 'Atualizar item';
?>
<?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>

<?php $form = ActiveForm::begin(['class'=>'','validateOnBlur'=>false])?>

<div class="row col-12 d-flex justify-content-center">
    <div class="row col-4">
        <div class="col-4 col-md-3 text-center">
            <?php if ($itemPedido->produto->categoria->nome == 'Entrada'): ?>
                <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image','width'=>'100px','height'=>'100px']); ?>
            <?php endif; ?>
            <?php if ($itemPedido->produto->categoria->nome == 'Sopa'): ?>
                <?= Html::img('@web/img/soup.png', ['alt' => 'Product Image', 'class' => 'img-fluid','width'=>'100px']); ?>
            <?php endif; ?>
            <?php if ($itemPedido->produto->categoria->nome == 'Carne'): ?>
                <?= Html::img('@web/img/plates_meat.png', ['alt' => 'Product Image', 'class' => 'img-fluid','width'=>'100px']); ?>
            <?php endif; ?>
            <?php if ($itemPedido->produto->categoria->nome == 'Peixe'): ?>
                <?= Html::img('@web/img/plates_fish.png', ['alt' => 'Product Image', 'class' => 'img-fluid','width'=>'150px']); ?>
            <?php endif; ?>
            <?php if ($itemPedido->produto->categoria->nome == 'Sobremesa'): ?>
                <?= Html::img('@web/img/plates_dessert.png', ['alt' => 'Product Image', 'class' => 'img-fluid','width'=>'100px']); ?>
            <?php endif; ?>
            <?php if ($itemPedido->produto->categoria->nome == 'Bebida'): ?>
                <?= Html::img('@web/img/drink.png', ['alt' => 'Product Image', 'class' => 'img-fluid','width'=>'100px']); ?>
            <?php endif; ?>
            <?php if ($itemPedido->produto->categoria->editavel == 1): ?>
                <?= Html::img('@web/img/outros.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
            <?php endif; ?>
        </div>
        <div class="col-6">
            <table class="table table-striped table-bordered detail-view">
                <thead>
                <tr>
                    <h3>Detalhes Produto</h3>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>REFº:</th><td><?=$itemPedido->id_produto?></td>
                </tr>
                <tr>
                    <th>Nome:</th><td><?=$itemPedido->produto->nome?></td>
                </tr>
                <tr>
                    <th>Categoria:</th>
                    <td>
                        <?php if ($itemPedido->produto->categoria->nome == 'Entrada'): ?>
                        <span class="badge badge-warning text-black-50">
                            <?php endif; ?>
                            <?php if ($itemPedido->produto->categoria->nome == 'Sopa'): ?>
                                <span class="badge badge-success text-black-50">
                            <?php endif; ?>
                                    <?php if ($itemPedido->produto->categoria->nome== 'Carne'): ?>
                                <span class="badge badge-danger text-black-50">
                            <?php endif; ?>
                                    <?php if ($itemPedido->produto->categoria->nome == 'Peixe'): ?>
                                <span class="badge badge-blue-light text-black-50">
                            <?php endif; ?>
                                    <?php if ($itemPedido->produto->categoria->nome == 'Sobremesa'): ?>
                                <span class="badge badge-info text-black-50">
                            <?php endif; ?>
                                    <?php if ($itemPedido->produto->categoria->nome == 'Bebida'): ?>
                                <span class="badge badge-orange text-black-50">
                            <?php endif; ?>
                                    <?php if ($itemPedido->produto->categoria->nome != 'Entrada' && $itemPedido->produto->categoria->nome != 'Sopa' && $itemPedido->produto->categoria->nome != 'Carne'
                                    && $itemPedido->produto->categoria->nome != 'Peixe' && $itemPedido->produto->categoria->nome != 'Sobremesa'&& $itemPedido->produto->categoria->nome != 'Bebida'): ?>
                                <span class="badge badge-dark">
                            <?php endif; ?>
                            <?=$itemPedido->produto->categoria->nome?>
                            </span>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row col-4">
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
    <?= $form->field($pedido, 'nota')->textarea(['class'=>' form-control','rows'=>5,'cols'=>60])->label(true) ?>
    <div class="row col-md-12 d-flex justify-content-center">
        <div class="col-3">
            <?= Html::submitButton('Atualizar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>