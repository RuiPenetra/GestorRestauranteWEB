<?php

use common\produtos\CategoriaProduto;
use yii\bootstrap4\LinkPager;
use yii\bootstrap4\Modal;
use yii\data\ActiveDataProvider;use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\View;use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchproduto common\produtos\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row col-md-12 d-flex justify-content-center">
    <?= Html::a('<div class="col-md-4">
                <!-- small card -->
                <div class="small-box bg-gradient-green p-3" style="width: 300px" id="btn_createProduto">
                    <div class="inner text-white">
                        <h4><b>Novo</b></h4>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cheese"></i>
                    </div>
                </div>
              </div>', ['produto/create'],['class'=>'novo-produto']) ?>
</div>
<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-search"></i>
            Procurar Produtos
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <?php echo $this->render('//produto/_search', ['model' => $searchModel, 'categorias' => $categorias]); ?>
    </div>
</div>

<div class="card mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-body">

        <div class="col-md-12 col-xl-12">
            <ul class="products-list product-list-in-card pl-2 pr-2">
                <div class="row">
                    <?php foreach ($dataProvider->models as $produto): ?>
                        <div class="col-md-6 col-xl-4">
                            <div class="card bg-light p-2">
                                <li class="item">
                                    <div class="product-img">
                                        <?php if ($produto->categoria->nome == 'Entrada'): ?>
                                            <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-responsive']); ?>
                                        <?php endif; ?>
                                        <?php if ($produto->categoria->nome == 'Sopa'): ?>
                                            <?= Html::img('@web/img/soup.png', ['alt' => 'Product Image', 'class' => 'img-responsive']); ?>
                                        <?php endif; ?>
                                        <?php if ($produto->categoria->nome == 'Carne'): ?>
                                            <?= Html::img('@web/img/plates_meat.png', ['alt' => 'Product Image', 'class' => 'img-responsive']); ?>
                                        <?php endif; ?>
                                        <?php if ($produto->categoria->nome == 'Peixe'): ?>
                                            <?= Html::img('@web/img/plates_fish.png', ['alt' => 'Product Image', 'class' => 'img-responsive']); ?>
                                        <?php endif; ?>
                                        <?php if ($produto->categoria->nome == 'Sobremesa'): ?>
                                            <?= Html::img('@web/img/plates_dessert.png', ['alt' => 'Product Image', 'class' => 'img-responsive']); ?>
                                        <?php endif; ?>
                                        <?php if ($produto->categoria->nome == 'Bebida'): ?>
                                            <?= Html::img('@web/img/drink.png', ['alt' => 'Product Image', 'class' => 'img-responsive']); ?>
                                        <?php endif; ?>
                                        <?php if ($produto->categoria->editavel== 1): ?>
                                            <?= Html::img('@web/img/outros.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'100px']); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title"><?= $produto->nome ?>
                                            <span class="badge badge-dark float-right"><?= $produto->preco ?> €</span>
                                        </a>
                                        <div class="row col-md-12">
                                            <div class="col-md-2 text-left">
                                               <?php if ($produto->estado==0):?>
                                                   <span class="badge badge-success text-white">Disponivel</span>
                                               <?php else:?>
                                                   <span class="badge badge-danger text-white">Indisponivel</span>
                                               <?php endif;?>
                                            </div>
                                            <div class="col-12 text-right">
                                                <?=Html::a('<i class="fas fa-eye"></i>', ['view'], ['class' => 'btn btn-info btn-sm','data-toggle'=>'modal', 'data-target'=>'#viewProduto'.$produto->id]) ?>
                                                <?=Html::a('<i class="far fa-edit color-white"></i>', ['produto/update', 'id' => $produto->id], ['class' => 'btn btn-warning btn-sm']) ?>
                                                <?php if ($produto->estado==0):?>
                                                    <?=Html::a('<i class="far fa-trash-alt color-white"></i>', ['delete'], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#apagarProduto'.$produto->id]) ?>
                                                <?php else:?>
                                                    <?=Html::a('<i class="fas fa-trash-restore-alt"></i>', ['delete'], ['class' => 'btn btn-success btn-sm','data-toggle'=>'modal', 'data-target'=>'#reativarProduto'.$produto->id]) ?>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- ## MODAL ##-->
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
                        <?php if ($produto->categoria->nome == 'Entrada'): ?>
                            <?= Html::img('@web/img/entradas.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'150px','height'=>'150px']); ?>
                        <?php endif; ?>
                        <?php if ($produto->categoria->nome == 'Sopa'): ?>
                            <?= Html::img('@web/img/soup.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'150px','height'=>'150px']); ?>
                        <?php endif; ?>
                        <?php if ($produto->categoria->nome == 'Carne'): ?>
                            <?= Html::img('@web/img/plates_meat.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'150px','height'=>'150px']); ?>
                        <?php endif; ?>
                        <?php if ($produto->categoria->nome == 'Peixe'): ?>
                            <?= Html::img('@web/img/plates_fish.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'150px','height'=>'150px']); ?>
                        <?php endif; ?>
                        <?php if ($produto->categoria->nome == 'Sobremesa'): ?>
                            <?= Html::img('@web/img/plates_dessert.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'150px','height'=>'150px']); ?>
                        <?php endif; ?>
                        <?php if ($produto->categoria->nome == 'Bebida'): ?>
                            <?= Html::img('@web/img/drink.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'150px','height'=>'150px']); ?>
                        <?php endif; ?>
                        <?php if ($produto->categoria->editavel == 1): ?>
                            <?= Html::img('@web/img/outros.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'150px','height'=>'150px']); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="height: 150px">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <?= Html::img('@web/img/ingredientes.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'30px','height'=>'30px']); ?>
                                    Ingredientes
                                </h3>
                            </div>
                            <div class="card-body">
                                <?php if ($produto->ingredientes != null): ?>
                                    <?=$produto->ingredientes?>
                                <?php else: ?>
                                    <h7>Não existe informação....</h7>
                                <?php endif; ?>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="bg-gradient-warning py-2 px-3 mt-4 rounded text-center">
                            <h2 class="mb-0">
                                <?=$produto->preco?> €
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <?= Html::img('@web/img/tag_icon.png', ['alt' => 'Product Image', 'class' => 'img-responsive','width'=>'25px','height'=>'25px']); ?>
                                    Categoria
                                </h3>
                            </div>
                            <div class="card-body">
                                <?php if ($produto->categoria->nome == 'Entrada'): ?>
                                <span class="badge badge-warning text-gray">
                                        <?php endif; ?>
                                    <?php if ($produto->categoria->nome == 'Sopa'): ?>
                                            <span class="badge badge-success">
                                        <?php endif; ?>
                                                <?php if ($produto->categoria->nome == 'Carne'): ?>
                                            <span class="badge badge-danger text-white">
                                        <?php endif; ?>
                                                <?php if ($produto->categoria->nome == 'Peixe'): ?>
                                            <span class="badge badge-blue-light">
                                        <?php endif; ?>
                                                <?php if ($produto->categoria->nome == 'Sobremesa'): ?>
                                            <span class="badge badge-info">
                                        <?php endif; ?>
                                                <?php if ($produto->categoria->nome == 'Bebida'): ?>
                                            <span class="badge badge-orange">
                                        <?php endif; ?>
                                                <?php if ($produto->categoria->nome != 'Entrada' && $produto->categoria->nome != 'Sopa' && $produto->categoria->nome != 'Carne'
                                                && $produto->categoria->nome != 'Peixe' && $produto->categoria->nome != 'Sobremesa'&& $produto->categoria->nome != 'Bebida'): ?>
                                            <span class="badge badge-dark">
                                        <?php endif; ?>
                                        <?=$produto->categoria->nome?>
                                            </span>
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
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i>Tem a certeza que quer indisponibilizar o produto selecionado?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    Após indisponibilizar o produto selecionado o produto passará a estar indisponivel para ser usado.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <?= Html::a('<b>SIM</b>', ['delete', 'id' => $produto->id], [
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
                                <div class="modal fade"  id="reativarProduto<?=$produto->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content mt-2" >
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i> Tem a certeza que quer disponibilizar o produto selecionado?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    Após disponibilizar o produto selecionado o produto passará a estar disponivel para ser usado.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <?= Html::a('<b>SIM</b>', ['delete', 'id' => $produto->id], [
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
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="row col-md-12 d-flex justify-content-center">
                        <?= LinkPager::widget([
                            'pagination' => $dataProvider->getPagination(),
                            'options' => [
                                'class' => 'page-item',
                            ],
                        ]); ?>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</div

