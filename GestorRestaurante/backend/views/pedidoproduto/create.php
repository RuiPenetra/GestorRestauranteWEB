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

<div class="card card-outline mr-5 ml-5 mt-3"> <!--collapsed-card-->
    <div class="card-body" style="display: block;">
        <?php echo $this->render('//produto/_search', ['model' => $searchProduto,'categorias' => $categorias]); ?>
        <ul class="products-list product-list-in-card pl-2 pr-2">
            <div class="row">
                <div class="col-md-12">
                <?php foreach ($dataProvider->models as $produto):?>
                    <?php $form = ActiveForm::begin(['class'=>'col-md-4','validateOnBlur'=>false])?>
                    <div class="card bg-light p-2 col-md-4" >
                        <div class="product-img">
                            <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-responsive']); ?>
                        </div>
                        <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">
                                <label class="product-title" id="produtoNome<?=$produto->id?>"><?=$produto->nome?></label><span class="badge badge-dark float-right"><h7 id="produtoPreco<?=$produto->id?>"><?=$produto->preco?></h7> €</span>
                            </a>
                            <span class="product-description text-right">
                                                        </span>
                        </div>
                        <?= $form->field($pedidoProduto, 'id_produto')->radio(['class'=>'','id'=>'teste'.$produto->id,'uncheck'=>null,'value' => $produto->id, 'data-toggle'=>'modal',' data-target'=>'#apagarProduto'.$produto->id,'label'=>'Seelcionar'])?>

                        <a href="" type="button" class="btn btn-danger btn-sm p-0" style="width: 40px;" data-toggle="modal" data-target="#apagarProduto<?= $produto->id ?>">
                            <i class="far fa-trash-alt color-white"></i>
                        </a>
                    </div>
                    <!-- ## MODAL ##-->
                    <div class="modal fade" id="apagarProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content mt-2" >
                                <div class="modal-header">
                                    <h3><?=$produto->nome?> </h3>
                                    <button type="button" class="close" data-dismiss="modal" onclick="unCkeck(<?=$produto->id?>)" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row col-md-6">
                                        <i class="fas fa-minus-circle fa-2x" style="color: red" onclick="quantDeincrement();"></i>
                                        <?= $form->field($pedidoProduto, 'quant_Pedida')->textInput(['type'=>'number','class'=>' form-control w-75 rounded','id'=>'inputQuantidade', 'onInput'=>'calcularPreco()', 'placeholder'=>'Quantidade'])->label(false) ?>
                                        <i class="fas fa-plus-circle fa-2x" style="color: limegreen" onclick="quantIncrement();"></i>
                                        <?= $form->field($pedidoProduto, 'preco')->textInput(['type'=>'number','class'=>' form-control rounded w-75','min'=>'0' , 'step'=>'0.01','id'=>'inputPrecoTotal'])->label('Preço Total') ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?= Html::submitButton('Seguinte', ['class' => 'btn btn-success']) ?>
                                    <?php ActiveForm::end(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            </div>
        </ul>
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
