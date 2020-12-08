<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pedidoproduto */

$this->title = 'Create Pedidoproduto';
$this->params['breadcrumbs'][] = ['label' => 'Pedidoprodutos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="row d-flex justify-content-center">
        <div class="col-md-1">
            <div class="row justify-content-center"><a class="bg-black rounded-circle text-center" style="width: 50px; height: 50px;"><i class="fas fa-cart-plus m-3"></i></a></div>
            <div class="row d-flex justify-content-center">Criar</div>
        </div>
        <div class="col-md-2">
            <hr class="connecting-line rounded">
        </div>
        <div class="col-md-1">
            <div class="row justify-content-center"><a class="bg-warning rounded-circle text-center" style="width: 50px; height: 50px;"><i class="fas fa-utensils m-3"></i></a></div>
            <div class="row d-flex justify-content-center">Add Prod</div>
        </div>
        <div class="col-md-2">
            <hr class="connecting-line rounded">
        </div>
        <div class="col-md-1">
            <div class="row justify-content-center"><a class="bg-dark rounded-circle text-center" style="width: 50px; height: 50px;"><i class="fas fa-cash-register m-3"></i></a></div>
            <div class="row d-flex justify-content-center">Terminar</div>
        </div>
    </div>
</div>

<div class="card card-outline mr-5 ml-5 mt-3"> <!--collapsed-card-->
    <div class="card-body" style="display: block;">
        <?php echo $this->render('//produto/_search', ['model' => $searchProduto,'categorias' => $categorias]); ?>
        <?php $form = ActiveForm::begin(); ?>
        <ul class="products-list product-list-in-card pl-2 pr-2">
            <div class="row">
                <?php foreach ($dataProvider->models as $produto):?>
                    <div class="col-md-6">
                        <div class="card bg-light p-2" >
                            <li class="item">
                                <div class="product-img">
                                    <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-responsive']); ?>
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">
                                        <?=$produto->nome?><span class="badge badge-dark float-right"><?=$produto->preco?> €</span>
                                    </a>
                                    <span class="product-description text-right">
                                <?= $form->field($pedidoProduto, 'id_produto')->radio(['value'=>$produto->id, 'label'=>'Selecionar', 'data-toggle'=>'modal', 'data-target'=>'#viewItemProduto'.$produto->id]) ?>
                            </span>
                                </div>
                            </li>
                        </div>
                    </div>
                    <div class="modal fade"  id="viewItemProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content mt-2" >
                                <div class="modal-header">
                                    <h3>Selecione a quantidade</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <?= $form->field($pedidoProduto, 'quantidade')->textInput() ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?= Html::submitButton('Seguinte', ['class' => 'btn btn-success']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </ul>
        <?php ActiveForm::end(); ?>
        </div>
</div>
