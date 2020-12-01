<?php

use common\produtos\CategoriaProduto;
use yii\bootstrap4\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchproduto common\produtos\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
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
            <a href="<?=Url::toRoute(['produto/create'])?>" type="button" class="btn btn-success p-0" style="width: 200px; height: 30px">
                Novo
            </a>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="row d-flex justify-content-center mr-5 ml-5 ">
        <div class="col-12">
            <div class="card card-warning card-tabs">
                <div class="card-header p-0 pt-1 d-flex justify-content-center ">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-entradas-tab" data-toggle="pill" href="#custom-tabs-one-entradas" role="tab" aria-controls="custom-tabs-one-entradas" aria-selected="true"><h6><i class="fas fa-chair"></i> Entradas</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-pratos-sopa-tab" data-toggle="pill" href="#custom-tabs-one-pratos-sopa" role="tab" aria-controls="custom-tabs-one-pratos-sopa" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Sopa</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-pratos-carne-tab" data-toggle="pill" href="#custom-tabs-one-pratos-carne" role="tab" aria-controls="custom-tabs-one-pratos-carne" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Carne</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-pratos-peixe-tab" data-toggle="pill" href="#custom-tabs-one-pratos-peixe" role="tab" aria-controls="custom-tabs-one-pratos-peixe" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Peixe</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-pratos-peixe-tab" data-toggle="pill" href="#custom-tabs-one-sobremesa" role="tab" aria-controls="custom-tabs-one-sobremesa" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Sobremesa</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-bebidas-tab" data-toggle="pill" href="#custom-tabs-one-bebidas" role="tab" aria-controls="custom-tabs-one-bebidas" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Bebidas</h6></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-entradas" role="tabpanel" aria-labelledby="custom-tabs-one-entradas-tab">
                                <div class="col-md-12">
                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                        <div class="row">
                                    <?php foreach ($produtos as $produto):?>
                                    <?php if( $produto->id_categoria == 1):?>
                                        <div class="col-md-6">
                                            <div class="card bg-light p-2" >
                                                <li class="item">
                                                    <div class="product-img">
                                                        <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-responsive']); ?>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="javascript:void(0)" class="product-title"><?=$produto->nome?>
                                                            <span class="badge badge-dark float-right"><?=$produto->preco?> €</span></a>
                                                        <span class="product-description text-right">
                                                                      <a href="" type="button" class="btn btn-info p-0" style="width: 40px;" data-toggle="modal" data-target="#viewProduto<?=$produto->id?>">
                                                               <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="<?=Url::toRoute(['produto/update', 'id' => $produto->id])?>" type="button" class="btn btn-warning p-0" style="width: 40px;">
                                                               <i class="far fa-edit color-white" ></i>
                                                           </a>
                                                           <a href="" type="button" class="btn btn-danger p-0" style="width: 40px;" data-toggle="modal" data-target="#apagarProduto<?=$produto->id?>">
                                                                <i class="far fa-trash-alt color-white"></i>
                                                            </a>
                                                          </span>
                                                    </div>
                                                </li>
                                        </div>
                                        </div>
                                            <div class="modal fade"  id="viewProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content mt-2" >
                                                        <div class="modal-header">
                                                            <h3><?=$produto->nome?> </h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6 d-flex justify-content-center">
                                                                    <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-fluid','width'=>'200px']); ?>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="card card-outline card-warning" style="height: 150px">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">
                                                                                <i class="fas fa-exclamation-triangle"></i>
                                                                                Ingredientes
                                                                            </h3>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <?=$produto->ingredientes?>
                                                                        </div>
                                                                        <!-- /.card-body -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="bg-gradient-warning py-2 px-3 mt-5 rounded text-center">
                                                                        <h2 class="mb-0">
                                                                            <?=$produto->preco?> €
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="card card-outline card-warning">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">
                                                                                <i class="fas fa-exclamation-triangle"></i>
                                                                                Categorias
                                                                            </h3>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <?php if($produto->id_categoria== 1):?>
                                                                                  <span class="badge badge-purple"><?=$produto->categoria->nome?>
                                                                            <?php endif;?>
                                                                        </div>
                                                                        <!-- /.card-body -->
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade"  id="apagarProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <button type="button" href="<?=Url::toRoute(['produto/delete', 'id' => $produto->id])?>" data-method="POST" class="btn btn-outline-success" data-dismiss="modal"><b>SIM</b></button>
                                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endif;?>
                                    <?php endforeach;?>
                                        </div>
                                    </ul>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-pratos-sopa" role="tabpanel" aria-labelledby="custom-tabs-one-pratos-sopa-tab">
                            <div class="col-md-12">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <div class="row">
                                        <?php foreach ($produtos as $produto):?>
                                            <?php if( $produto->id_categoria == 2):?>
                                                <div class="col-md-6">
                                                    <div class="card bg-light p-2" >
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <?= Html::img('@web/img/soup.png', ['alt' => 'Product Image', 'class' => 'img-size-50']); ?>
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title"><?=$produto->nome?>
                                                                    <span class="badge badge-dark float-right"><?=$produto->preco?> €</span></a>
                                                                <span class="product-description text-right">
                                                                 <a href="" type="button" class="btn btn-info p-0" style="width: 40px;" data-toggle="modal" data-target="#viewProduto<?=$produto->id?>">
                                                               <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="<?=Url::toRoute(['produto/update', 'id' => $produto->id])?>" type="button" class="btn btn-warning p-0" style="width: 40px;">
                                                               <i class="far fa-edit color-white" ></i>
                                                           </a>
                                                           <a href="" type="button" class="btn btn-danger p-0" style="width: 40px;" data-toggle="modal" data-target="#apagarProduto<?=$produto->id?>">
                                                                <i class="far fa-trash-alt color-white"></i>
                                                            </a>
                                                          </span>
                                                            </div>
                                                        </li>
                                                        <div class="modal fade"  id="viewProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content mt-2" >
                                                                    <div class="modal-header">
                                                                        <h3><?=$produto->nome?> </h3>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6 d-flex justify-content-center">
                                                                                <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-fluid','width'=>'200px']); ?>

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-warning" style="height: 150px">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">
                                                                                            <i class="fas fa-exclamation-triangle"></i>
                                                                                            Ingredientes
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <?=$produto->ingredientes?>
                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="bg-gradient-warning py-2 px-3 mt-5 rounded text-center">
                                                                                    <h2 class="mb-0">
                                                                                        <?=$produto->preco?> €
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-warning">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">
                                                                                            <i class="fas fa-exclamation-triangle"></i>
                                                                                            Categorias
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <?php if($produto->id_categoria== 2):?>
                                                                                            <span class="badge badge-success"><?=$produto->categoria->nome?></span>
                                                                                        <?php endif;?>
                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade"  id="apagarProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        <button type="button" href="<?=Url::toRoute(['produto/delete', 'id' => $produto->id])?>" data-method="POST" class="btn btn-outline-success" data-dismiss="modal"><b>SIM</b></button>
                                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-pratos-carne" role="tabpanel" aria-labelledby="custom-tabs-one-pratos-carne-tab">
                            <div class="col-md-12">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <div class="row">
                                        <?php foreach ($produtos as $produto):?>
                                            <?php if( $produto->id_categoria == 3):?>
                                                <div class="col-md-6">
                                                    <div class="card bg-light p-2" >
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <?= Html::img('@web/img/plates_meat.png', ['alt' => 'Product Image', 'class' => 'img-size-50']); ?>
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title"><?=$produto->nome?>
                                                                    <span class="badge badge-dark float-right"><?=$produto->preco?> €</span></a>
                                                                <span class="product-description text-right">
                                                                 <a href="" type="button" class="btn btn-info p-0" style="width: 40px;" data-toggle="modal" data-target="#viewProduto<?=$produto->id?>">
                                                               <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="<?=Url::toRoute(['produto/update', 'id' => $produto->id])?>" type="button" class="btn btn-warning p-0" style="width: 40px;">
                                                               <i class="far fa-edit color-white" ></i>
                                                           </a>
                                                           <a href="" type="button" class="btn btn-danger p-0" style="width: 40px;" data-toggle="modal" data-target="#apagarProduto<?=$produto->id?>">
                                                                <i class="far fa-trash-alt color-white"></i>
                                                            </a>
                                                          </span>
                                                            </div>
                                                        </li>
                                                        <div class="modal fade"  id="viewProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content mt-2" >
                                                                    <div class="modal-header">
                                                                        <h3><?=$produto->nome?> </h3>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6 d-flex justify-content-center">
                                                                                <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-fluid','width'=>'200px']); ?>

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-warning" style="height: 150px">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">
                                                                                            <i class="fas fa-exclamation-triangle"></i>
                                                                                            Ingredientes
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <?=$produto->ingredientes?>
                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="bg-gradient-warning py-2 px-3 mt-5 rounded text-center">
                                                                                    <h2 class="mb-0">
                                                                                        <?=$produto->preco?> €
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-warning">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">
                                                                                            <i class="fas fa-exclamation-triangle"></i>
                                                                                            Categorias
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <?php if($produto->id_categoria== 3):?>
                                                                                            <span class="badge badge-pink"><?=$produto->categoria->nome?></span>
                                                                                        <?php endif;?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade"  id="apagarProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        <button type="button" href="<?=Url::toRoute(['produto/delete', 'id' => $produto->id])?>" data-method="POST" class="btn btn-outline-success" data-dismiss="modal"><b>SIM</b></button>
                                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-pratos-peixe" role="tabpanel" aria-labelledby="custom-tabs-one-pratos-peixe-tab">
                            <div class="col-md-12">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <div class="row">
                                        <?php foreach ($produtos as $produto):?>
                                            <?php if( $produto->id_categoria == 4):?>
                                                <div class="col-md-6">
                                                    <div class="card bg-light p-2" >
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <?= Html::img('@web/img/plates_fish.png', ['alt' => 'Product Image', 'class' => 'img-size-50']); ?>
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title"><?=$produto->nome?>
                                                                    <span class="badge badge-dark float-right"><?=$produto->preco?> €</span></a>
                                                                <span class="product-description text-right">
                                                                <a href="" type="button" class="btn btn-info p-0" style="width: 40px;" data-toggle="modal" data-target="#viewProduto<?=$produto->id?>">
                                                               <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="<?=Url::toRoute(['produto/update', 'id' => $produto->id])?>" type="button" class="btn btn-warning p-0" style="width: 40px;">
                                                               <i class="far fa-edit color-white" ></i>
                                                           </a>
                                                           <a href="" type="button" class="btn btn-danger p-0" style="width: 40px;" data-toggle="modal" data-target="#apagarProduto<?=$produto->id?>">
                                                                <i class="far fa-trash-alt color-white"></i>
                                                            </a>
                                                          </span>
                                                            </div>
                                                        </li>
                                                        <div class="modal fade"  id="viewProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content mt-2" >
                                                                    <div class="modal-header">
                                                                        <h3><?=$produto->nome?> </h3>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6 d-flex justify-content-center">
                                                                                <?= Html::img('@web/img/plates_fish.png', ['alt' => 'Product Image', 'class' => 'img-fluid','width'=>'200px']); ?>

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-warning" style="height: 150px">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">
                                                                                            <i class="fas fa-exclamation-triangle"></i>
                                                                                            Ingredientes
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <?=$produto->ingredientes?>
                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="bg-gradient-warning py-2 px-3 mt-5 rounded text-center">
                                                                                    <h2 class="mb-0">
                                                                                        <?=$produto->preco?> €
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-warning">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">
                                                                                            <i class="fas fa-exclamation-triangle"></i>
                                                                                            Categorias
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <?php if($produto->id_categoria== 4):?>
                                                                                            <span class="badge badge-blue"><?=$produto->categoriaProduto->nome?></span>
                                                                                        <?php endif;?>
                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade"  id="apagarProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        <button type="button" href="<?=Url::toRoute(['produto/delete', 'id' => $produto->id])?>" data-method="POST" class="btn btn-outline-success" data-dismiss="modal"><b>SIM</b></button>
                                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-sobremesa" role="tabpanel" aria-labelledby="custom-tabs-one-sobremesa-tab">
                            <div class="col-md-12">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <div class="row">
                                        <?php foreach ($produtos as $produto):?>
                                            <?php if( $produto->id_categoria == 5):?>
                                                <div class="col-md-6">
                                                    <div class="card bg-light p-2" >
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <?= Html::img('@web/img/plates_dessert.png', ['alt' => 'Product Image', 'class' => 'img-size-50']); ?>
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title"><?=$produto->nome?>
                                                                    <span class="badge badge-dark float-right"><?=$produto->preco?> €</span></a>
                                                                <span class="product-description text-right">
                                                                 <a href="" type="button" class="btn btn-info p-0" style="width: 40px;" data-toggle="modal" data-target="#viewProduto<?=$produto->id?>">
                                                               <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="<?=Url::toRoute(['produto/update', 'id' => $produto->id])?>" type="button" class="btn btn-warning p-0" style="width: 40px;">
                                                               <i class="far fa-edit color-white" ></i>
                                                           </a>
                                                           <a href="" type="button" class="btn btn-danger p-0" style="width: 40px;" data-toggle="modal" data-target="#apagarProduto<?=$produto->id?>">
                                                                <i class="far fa-trash-alt color-white"></i>
                                                            </a>
                                                          </span>
                                                            </div>
                                                        </li>
                                                        <div class="modal fade"  id="viewProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content mt-2" >
                                                                    <div class="modal-header">
                                                                        <h3><?=$produto->nome?> </h3>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6 d-flex justify-content-center">
                                                                                <?= Html::img('@web/img/dessert.png', ['alt' => 'Product Image', 'class' => 'img-fluid','width'=>'200px']); ?>

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-warning" style="height: 150px">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">
                                                                                            <i class="fas fa-exclamation-triangle"></i>
                                                                                            Ingredientes
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <?=$produto->ingredientes?>
                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="bg-gradient-warning py-2 px-3 mt-5 rounded text-center">
                                                                                    <h2 class="mb-0">
                                                                                        <?=$produto->preco?> €
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-warning">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">
                                                                                            <i class="fas fa-exclamation-triangle"></i>
                                                                                            Categorias
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <?php if($produto->id_categoria== 2):?>
                                                                                            <span class="badge badge-pink"><?=$produto->categoriaProduto->nome?>
                                                                                        <?php endif;?>
                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade"  id="apagarProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        <button type="button" href="<?=Url::toRoute(['produto/delete', 'id' => $produto->id])?>" data-method="POST" class="btn btn-outline-success" data-dismiss="modal"><b>SIM</b></button>
                                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-bebidas" role="tabpanel" aria-labelledby="custom-tabs-one-bebidas-tab">
                            <div class="col-md-12">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <div class="row">
                                        <?php foreach ($produtos as $produto):?>
                                            <?php if( $produto->id_categoria == 6):?>
                                                <div class="col-md-6">
                                                    <div class="card bg-light p-2" >
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <?= Html::img('@web/img/drink.png', ['alt' => 'Product Image', 'class' => 'img-size-50']); ?>
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title"><?=$produto->nome?>
                                                                    <span class="badge badge-dark float-right"><?=$produto->preco?> €</span></a>
                                                                <span class="product-description text-right">
                                                                <a href="" type="button" class="btn btn-info p-0" style="width: 40px;" data-toggle="modal" data-target="#viewProduto<?=$produto->id?>">
                                                               <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="<?=Url::toRoute(['produto/update', 'id' => $produto->id])?>" type="button" class="btn btn-warning p-0" style="width: 40px;">
                                                               <i class="far fa-edit color-white" ></i>
                                                           </a>
                                                           <a href="" type="button" class="btn btn-danger p-0" style="width: 40px;" data-toggle="modal" data-target="#apagarProduto<?=$produto->id?>">
                                                                <i class="far fa-trash-alt color-white"></i>
                                                            </a>
                                                          </span>
                                                            </div>
                                                        </li>
                                                        <div class="modal fade"  id="viewProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content mt-2" >
                                                                    <div class="modal-header">
                                                                        <h3><?=$produto->nome?> </h3>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6 d-flex justify-content-center">
                                                                                <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-fluid','width'=>'200px']); ?>

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-warning" style="height: 150px">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">
                                                                                            <i class="fas fa-exclamation-triangle"></i>
                                                                                            Ingredientes
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <?=$produto->ingredientes?>
                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="bg-gradient-warning py-2 px-3 mt-5 rounded text-center">
                                                                                    <h2 class="mb-0">
                                                                                        <?=$produto->preco?> €
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-warning">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">
                                                                                            <i class="fas fa-exclamation-triangle"></i>
                                                                                            Categorias
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <?php if($produto->id_categoria== 6):?>
                                                                                            <span class="badge badge-orange"><?=$produto->categoriaProduto->nome?>
                                                                                        <?php endif;?>
                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade"  id="apagarProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        <button type="button" href="<?=Url::toRoute(['produto/delete', 'id' => $produto->id])?>" data-method="POST" class="btn btn-outline-success" data-dismiss="modal"><b>SIM</b></button>
                                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
