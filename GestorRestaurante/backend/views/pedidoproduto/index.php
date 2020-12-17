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
                <th class="text-center">Nº</th>
                <th class="text-center">Lugares</th>

            </thead>
            <tbody>
            <?php foreach ($dataProvider->models as $mesa):?>
                <tr>
                    <td class="text-center"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/table.png"/></td>
                    <td class="text-center"><?=$mesa->produto->nome?></td>
                    <td class="text-center"><?=$mesa->preco?>€</td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <?= GridView::widget([
                'id'=>'table-item-pedido',
            'dataProvider' => $dataProvider,
            'columns' => [
                'produto.nome',
                'produto.preco',
                'produto.categoria.nome',
                'quantidade',
                'preco',
            ],
        ]) ?>
    </div>
    <!-- /.card-body -->
</div>


