<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pedidoproduto */


$this->params['breadcrumbs'][] = ['label' => 'Pedidoprodutos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>
<div class="card card-outline mr-5 ml-5 mt-3"> <!--collapsed-card-->
    <div class="card-body" style="display: block;">
        <?php echo $this->render('//produto/_search', ['model' => $searchProduto,'categorias' => $categorias]); ?>
            <div class="row col-md-12 d-flex justify-content-center">
                <?php foreach ($dataProvider->models as $produto):?>
                    <div class="card bg-light p-2 col-md-5 ml-2 mr-2">
                        <?php $form = ActiveForm::begin(['class'=>'','validateOnBlur'=>false])?>
                        <div class="row col-md-12">
                            <div class="col-md-3 text-center">
                                <?php if ($produto->categoria->nome == 'Entrada'): ?>
                                    <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-responsive', 'width'=>'70px', 'height'=>'70px' ]); ?>
                                <?php endif; ?>
                                <?php if ($produto->categoria->nome == 'Sopa'): ?>
                                    <?= Html::img('@web/img/soup.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'70px', 'height'=>'70px']); ?>
                                <?php endif; ?>
                                <?php if ($produto->categoria->nome == 'Carne'): ?>
                                    <?= Html::img('@web/img/plates_meat.png', ['alt' => 'Product Image', 'class' => 'img-responsive' ,'width'=>'70px', 'height'=>'70px']); ?>
                                <?php endif; ?>
                                <?php if ($produto->categoria->nome == 'Peixe'): ?>
                                    <?= Html::img('@web/img/plates_fish.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'70px', 'height'=>'70px']); ?>
                                <?php endif; ?>
                                <?php if ($produto->categoria->nome == 'Sobremesa'): ?>
                                    <?= Html::img('@web/img/plates_dessert.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'70px', 'height'=>'70px']); ?>
                                <?php endif; ?>
                                <?php if ($produto->categoria->nome == 'Bebida'): ?>
                                    <?= Html::img('@web/img/drink.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'70px', 'height'=>'70px']); ?>
                                <?php endif; ?>
                                <?php if ($produto->categoria->editavel== 1): ?>
                                    <?= Html::img('@web/img/outros.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'70px']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <label class="product-title" id="produtoNome<?=$produto->id?>"><?=$produto->nome?></label>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <?php if ($produto->estado==0):?>
                                            <span class="badge badge-success text-white">Disponivel</span>
                                        <?php else:?>
                                            <span class="badge badge-danger text-white">Indisponivel</span>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <div class="row">
                                    <span class="badge badge-dark float-right"><h7 id="produtoPreco<?=$produto->id?>"><?=$produto->preco?></h7> €</span>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <?= $form->field($pedidoProduto, 'id_produto')->radio(['class'=>'','id'=>'radio'.$produto->id,'uncheck'=>null,'value' => $produto->id, 'data-toggle'=>'modal',' data-target'=>'#itemPedido'.$produto->id,'label'=>'Selecionar'])?>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="itemPedido<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content mt-2" >
                                        <div class="modal-header">
                                            <h3><?=$produto->nome?> </h3>
                                            <button type="button" class="close" data-dismiss="modal" onclick="unCheck(<?=$produto->id?>)" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row col-md-12">
                                                <div class="col-md-3 d-flex justify-content-center">
                                                    <?php if ($produto->categoria->nome == 'Entrada'): ?>
                                                        <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-responsive', 'width'=>'100px']); ?>
                                                    <?php endif; ?>
                                                    <?php if ($produto->categoria->nome == 'Sopa'): ?>
                                                        <?= Html::img('@web/img/soup.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
                                                    <?php endif; ?>
                                                    <?php if ($produto->categoria->nome == 'Carne'): ?>
                                                        <?= Html::img('@web/img/plates_meat.png', ['alt' => 'Product Image', 'class' => 'img-responsive' ,'width'=>'100px']); ?>
                                                    <?php endif; ?>
                                                    <?php if ($produto->categoria->nome == 'Peixe'): ?>
                                                        <?= Html::img('@web/img/plates_fish.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
                                                    <?php endif; ?>
                                                    <?php if ($produto->categoria->nome == 'Sobremesa'): ?>
                                                        <?= Html::img('@web/img/plates_dessert.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
                                                    <?php endif; ?>
                                                    <?php if ($produto->categoria->nome == 'Bebida'): ?>
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
                                                                <i class="fas fa-minus-circle fa-2x" style="color: red" onclick="quantDeincrement(<?=$produto->id?>,<?=$produto->preco?>);"></i>
                                                            </div>
                                                            <div class="col-md-5 d-flex justify-content-center">
                                                                <?= $form->field($pedidoProduto, 'quant_Pedida')->textInput(['type'=>'text','class'=>' form-control w-75 rounded','id'=>'inputQuantidade'.$produto->id, 'readonly'=>'true','oninput'=>'calcularPreco('.$produto->id.','.$produto->preco.')', 'placeholder'=>'0'])->label(false) ?>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <i class="fas fa-plus-circle fa-2x" style="color: limegreen" onclick="quantIncrement(<?=$produto->id?>,<?=$produto->preco?>);"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex justify-content-center">
                                                        <?= $form->field($pedidoProduto, 'preco')->textInput(['type'=>'number','class'=>' form-control rounded w-75','min'=>'0' , 'step'=>'0.01','id'=>'inputPrecoTotal'.$produto->id, 'readonly'=>'true'])->label('Preço Total') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-md-12 d-flex justify-content-center">
                                                <?= $form->field($pedido, 'nota')->textarea(['class'=>' form-control','value'=>$pedido->nota,'rows'=>5,'cols'=>60])->label(true) ?>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <?= Html::submitButton('Adicionar', ['class' => 'btn btn-success']) ?>
                                            <?php ActiveForm::end(); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                <?php endforeach;?>
            </div>
        <div class="row col-md-12 d-flex justify-content-center">
            <?= LinkPager::widget([
                'pagination' => $dataProvider->getPagination(),
                'options' => [
                    'class' => 'page-item',
                ],
            ]);?>
        </div>
<!--        <div class="row col-md-12">
            <div class="col-md-6">
                <label class="control-label" for="inputNome">Produto</label>
                <input type="text" id="inputNome" class="form-control rounded" style="width: 400px" readonly="true">
            </div>
            <div class="col-md-2">
                <label class="control-label" for="inputPreco">Preço</label>
                <input type="number" id="inputPreco" class="form-control rounded w-75 "readonly="true">
            </div>
            <div class="col-md-2">
                <i class="fas fa-minus-circle fa-2x" style="color: red" onclick="quantDeincrement();"></i>
                <?/*= $form->field($pedidoProduto, 'quantidade')->textInput(['type'=>'number','class'=>' form-control w-75 rounded','id'=>'inputQuantidade','value'=>'0', 'onInput'=>'calcularPreco()'])->label('Quant') */?>
                <i class="fas fa-plus-circle fa-2x" style="color: limegreen" onclick="quantIncrement();"></i>
            </div>
            <div class="col-md-2">
                <?/*= $form->field($pedidoProduto, 'preco')->textInput(['type'=>'number','class'=>' form-control rounded w-75','readonly'=>true,'id'=>'inputPrecoTotal','min'=>'0' , 'step'=>'0.01'])->label('Preço Total') */?>
            </div>
        </div>-->
        </div>
</div>
