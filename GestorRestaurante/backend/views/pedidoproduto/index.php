<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoprodutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
            <div class="row d-flex justify-content-center">Produtos</div>
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

<div class="row col-md-12 d-flex mt-5 justify-content-center">
    <div class="col-md-8">
        <div class="row ml-5">
            <?= Html::a('<div class="col-md-2">
        <!-- small card -->
        <div class="small-box bg-gradient-info p-3" style="width: 200px">
            <div class="inner">
                <h4><b>Novo</b></h4>
            </div>
            <div class="icon">
                <i class="fas fa-cart-plus"></i>
            </div>
        </div>
      </div>',['pedidoproduto/create', 'id' => $pedido->id], [ 'class'=>'']) ?>
            <?= Html::a('<div class="col-md-4">
        <!-- small card -->
        <div class="small-box bg-gradient-success p-3" style="width: 250px">
            <div class="inner">
                <h4><b>Terminar</b></h4>
            </div>
            <div class="icon">
                <i class="fas fa-check"></i>
            </div>
        </div>
      </div>',['fatura/create', 'id' => $pedido->id], [ 'class'=>'']) ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row d-flex justify-content-end m-4">
            <h1 id="val" class="mr-3">0,00</h1>
            <i class="fas fa-euro-sign fa-3x" style="color: orange"></i>
        </div>
    </div>
</div>

<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
            Criar produto
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <table class="table" id="table-item-pedido">
            <thead>
            <tr>
                <th style="width: 60px" class="text-center"></th>
                <th class="text-center">Nome Produto</th>
                <th class="text-center">Quant Pedida</th>
                <th class="text-center">Quant Entregue</th>
                <th class="text-center">Preço</th>
                <th class="text-center">Estado</th>
                <th class="text-center"></th>

            </thead>
            <tbody>
            <?php foreach ($dataProvider->models as $itemPedido):?>
                <tr>
                    <td class="text-center">
                        <?php if ($itemPedido->produto->categoria->nome == 'Entrada'): ?>
                            <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-fluid']); ?>
                        <?php endif; ?>
                        <?php if ($itemPedido->produto->categoria->nome == 'Sopa'): ?>
                            <?= Html::img('@web/img/soup.png', ['alt' => 'Product Image', 'class' => 'img-fluid']); ?>
                        <?php endif; ?>
                        <?php if ($itemPedido->produto->categoria->nome == 'Carne'): ?>
                            <?= Html::img('@web/img/plates_meat.png', ['alt' => 'Product Image', 'class' => 'img-fluid']); ?>
                        <?php endif; ?>
                        <?php if ($itemPedido->produto->categoria->nome == 'Peixe'): ?>
                            <?= Html::img('@web/img/plates_fish.png', ['alt' => 'Product Image', 'class' => 'img-fluid']); ?>
                        <?php endif; ?>
                        <?php if ($itemPedido->produto->categoria->nome == 'Sobremesa'): ?>
                            <?= Html::img('@web/img/plates_dessert.png', ['alt' => 'Product Image', 'class' => 'img-fluid']); ?>
                        <?php endif; ?>
                        <?php if ($itemPedido->produto->categoria->nome == 'Bebida'): ?>
                            <?= Html::img('@web/img/drink.png', ['alt' => 'Product Image', 'class' => 'img-fluid']); ?>
                        <?php endif; ?>
                    </td>
                    <td class="text-center"><?=$itemPedido->produto->nome?></td>
                    <td class="text-center"><?=$itemPedido->quant_Pedida?> <i class="fas fa-times text-red"></i></td>
                    <td class="text-center"><?=$itemPedido->quant_Entregue?> <i class="fas fa-check text-green"></i></td>
                    <td class="text-center"><?=$itemPedido->preco?>€</td>
                    <td class="text-center">
                        <?php if ($itemPedido->estado == 0): ?>
                            <span class="badge badge-info"> Em Processo</span>
                        <?php endif;
                        if ($itemPedido->estado == 1):?>
                            <span class="badge badge-warning text-white"> Em Preparação</span>
                        <?php endif;
                        if ($itemPedido->estado == 2):?>
                            <span class="badge badge-success text-white"> Pronto</span>
                        <?php endif;
                        if ($itemPedido->estado == 3):?>
                            <span class="badge badge-dark"> Entregue</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= Html::a('  <i class="fas fa-sync fa-spin"></i>', ['pedidoproduto/cozinhaupdate', 'id' => $itemPedido->id], ['class' => 'btn btn-info btn-sm']) ?>
                        <?= Html::a('<i class="fas fa-plus"></i>', ['pedidoproduto/update', 'id' => $itemPedido->id], ['class' => 'btn btn-success btn-sm']) ?>
                        <?= Html::a('<i class="fas fa-trash"></i>', ['pedidoproduto/delete', 'id' => $itemPedido->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal',' data-target'=>'#apagarItemPedido'.$itemPedido->id,]) ?>
                    </td>
                </tr>
                <div class="modal fade"  id="apagarItemPedido<?=$itemPedido->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content mt-2" >
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i> Tem a certeza que quer apagar?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    Após apagar o produto selecionado não é possivel reverter.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <?= Html::a('<b>SIM</b>', ['delete', 'id' => $itemPedido->id], [
                                    'class' => 'btn btn-outline-success',
                                    'data' => [
                                        'method' => 'post',
                                    ],
                                ]) ?>
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>


