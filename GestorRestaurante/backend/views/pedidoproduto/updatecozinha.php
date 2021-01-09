<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pedidoproduto */

$this->title = 'Preparação';

?>
<?php $form = ActiveForm::begin(['class'=>'','validateOnBlur'=>false])?>

<div class="row d-flex justify-content-center">
    <div class="row col-5">
        <div class="col-4 col-md-3 d-flex text-center">
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
    <div class="col-md-4 text-center d-inline-block">
        <table class="table table-bordered">
            <thead>
            <tr>
               <h3>Quantidade</h3>
            </tr>
            <tr>
                <th style="width: 40px">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3">
                            <i class="fas fa-shopping-basket text-blue"></i>
                        </div>
                        <div class="col-md-6">
                            Pedida
                        </div>
                    </div>
                </th>
                <th style="width: 40px">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3">
                            <i class="fas fa-utensils text-orange"></i>
                        </div>
                        <div class="col-md-6">
                            Preparação
                        </div>
                    </div>
                </th>
                <th style="width: 40px">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3">
                            <i class="fas fa-clipboard-check text-success"></i>
                        </div>
                        <div class="col-md-6">
                            Entregue
                        </div>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="row d-flex justify-content-center">
                        <?= $form->field($itemPedido, 'quant_Pedida')->textInput(['type'=>'text','class'=>'form-control rounded text-center','style'=>'width:80px','id'=>'inputQuantPedida'.$itemPedido->id, 'readonly'=>'true'])->label(false) ?>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-md-3">
                            <i class="fas fa-minus-circle fa-2x" style="color: #ff7e6a" onclick="QuantPreparacaoDeincrement(<?=$itemPedido->id?>);"></i>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($itemPedido, 'quant_Preparacao')->textInput(['type'=>'text','class'=>'form-control rounded text-center','style'=>'width:70px','id'=>'inputQuantPreparacao'.$itemPedido->id, 'readonly'=>'true', 'placeholder'=>'0'])->label(false) ?>
                        </div>
                        <div class="col-md-3">
                            <i class="fas fa-plus-circle fa-2x" style="color: #6fda44" onclick="QuantPreparacaoIncrement(<?=$itemPedido->id?>);"></i>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-md-3">
                            <i id="butaoMenos" class="fas fa-minus-circle fa-2x" style="color: #ff7e6a" onclick="QuantEntregueDeincrement(<?=$itemPedido->id?>);"></i>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($itemPedido, 'quant_Entregue')->textInput(['type'=>'text','class'=>'form-control rounded text-center','style'=>'width:70px','id'=>'inputQuantEntregue'.$itemPedido->id, 'readonly'=>'true', 'placeholder'=>'0'])->label(false) ?>
                        </div>
                        <div class="col-md-3">
                            <i class="fas fa-plus-circle fa-2x" style="color: #6fda44" onclick="QuantEntregueIncrement(<?=$itemPedido->id?>);"></i>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
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