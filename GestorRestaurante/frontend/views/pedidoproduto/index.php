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
$id = Yii::$app->user->identity->id;
?>
<?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>
<div class="col-md-12 ml-5">
    <div class="row">
        <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null || Yii::$app->authManager->getAssignment('cozinheiro',$id) != null):?>
            <div class="col-md-4">
                <div class="card card-widget widget-user-2 p-0">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null):?>
                    <div class="widget-user-header bg-info">
                        <?php endif;?>
                        <?php if(Yii::$app->authManager->getAssignment('cozinheiro',$id) != null):?>
                        <div class="widget-user-header bg-success">
                            <?php endif;?>
                            <div class="widget-user-image">
                                <?php if($pedido->perfil->genero==0):?>
                                    <?= Html::img('@web/img/female.png', ['alt' => 'imgPerfil', 'class' => 'img-circle elevation-2']); ?>
                                <?php else:?>
                                    <?= Html::img('@web/img/male.png', ['alt' => 'imgPerfil', 'class' => 'img-circle elevation-2']); ?>
                                <?php endif?>
                                
                        </div>
                        <!-- /.widget-user-image -->
                        <h5 class="widget-user-username">
                            <?=$pedido->perfil->nome?> <?=$pedido->perfil->apelido?>
                        </h5>
                        <div class="widget-user-desc">

                                <span class="badge badge-dark">
                                    <?php if ($pedido->perfil->cargo=='atendedorPedidos'):?>
                                        <b>Atendedor Pedidos</b>
                                    <?php endif;?>
                                    <?php if ($pedido->perfil->cargo=='empregadoMesa'):?>
                                        <b>Empregado Mesa</b>
                                    <?php endif;?>
                                    <?php if ($pedido->perfil->cargo=='cliente'):?>
                                        <b>Cliente</b>
                                    <?php endif;?>
                                </span>

                        </div>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Estado:
                                    <?php if ($pedido->estado == 0): ?>
                                        <span class="float-right badge badge-info"> Em Processo</span>
                                    <?php endif;
                                    if ($pedido->estado == 1):?>
                                        <span class="float-right badge badge-warning text-white"> Em Preparação</span>
                                    <?php endif;
                                    if ($pedido->estado == 2):?>
                                        <span class="float-right badge badge-success text-white"> Concluido</span>
                                    <?php endif;?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Data: <span class="float-right"><?=$pedido->data?></span>
                                </a>
                            </li>
                            <?php if($pedido->tipo==0):?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Mesa: <span class="float-right"><?=$pedido->id_mesa?></span>
                                    </a>
                                </li>
                            <?php else:?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Nome pedido: <span class="float-right"><?=$pedido->nome_pedido?></span>
                                    </a>
                                </li>
                            <?php endif;?>

                        </ul>
                    </div>
                </div>
            </div>
        <?php endif?>
        <div class="col-md-8">
            <div class="row d-flex justify-content-center mt-5">
                <div class="row col-md-12">
                    <div class="col-md-7">
                        <div class="row col-md-12">
                            <?php if($pedido->estado!=2):?>
                                <?php if (Yii::$app->user->can('criarPedidoProduto') && Yii::$app->user->can('criarFaturas')):?>
                                    <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null || Yii::$app->authManager->getAssignment('cliente',$id) != null):?>
                                        <?php if($pedido->tipo==1):?>
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
                                            <?= Html::a('<div class="col-md-1">
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
                                        <?php endif?>
                                    <?php endif?>
                                <?php elseif(Yii::$app->user->can('criarPedidoProduto')):?>
                                <?php if ($pedido->estado==0):?>
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
                                <?php endif?>
                            <?php endif?>
                            <?php elseif(Yii::$app->user->can('consultarFaturas')):?>
                                    <?= Html::a('<div class="col-md-1">
                                            <!-- small card -->
                                            <div class="small-box bg-gradient-success p-3" style="width: 250px">
                                                <div class="inner">
                                                    <h4><b>Fatura</b></h4>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-check"></i>
                                                </div>
                                            </div>
                                          </div>',['fatura/view', 'id' => $pedido->id], [ 'class'=>'']) ?>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="row d-flex justify-content-end m-4">
                            <h1 id="val" class="mr-3">0,00</h1>
                            <i class="fas fa-euro-sign fa-3x" style="color: orange"></i>
                        </div>
                    </div>
                </div>
            </div>
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
                <th class="text-center">Quant Preparação</th>
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
                        <?php if ($itemPedido->produto->categoria->editavel== 1): ?>
                            <?= Html::img('@web/img/outros.png', ['alt' => 'Product Image', 'class' => 'img-img-fluid']); ?>
                        <?php endif; ?>
                    </td>
                    <td class="text-center"><?=$itemPedido->produto->nome?></td>
                    <td class="text-center"><i class="fas fa-shopping-basket text-blue"></i>  <?=$itemPedido->quant_Pedida?></td>
                    <td class="text-center"><i class="fas fa-utensils text-orange"></i>  <?=$itemPedido->quant_Preparacao?></td>
                    <td class="text-center"><i class="fas fa-clipboard-check text-success"></i>  <?=$itemPedido->quant_Entregue?></td>
                    <td class="text-center"><?=$itemPedido->preco?>€</td>
                    <td class="text-center">
                        <?php if ($itemPedido->estado == 0): ?>
                            <span class="badge badge-info"> Em Processo</span>
                        <?php endif;
                        if ($itemPedido->estado == 1):?>
                            <span class="badge badge-warning text-white"> Em Preparação</span>
                        <?php endif;
                        if ($itemPedido->estado == 2):?>
                            <span class="badge badge-dark"> Entregue</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($itemPedido->pedido->estado!=2):?>
                            <?php if(Yii::$app->authManager->getAssignment('cozinheiro',$id) != null):?>
                                <?= Html::a('  <i class="fas fa-sync fa-spin"></i>', ['pedidoproduto/updatepreparacao', 'id' => $itemPedido->id], ['class' => 'btn btn-info btn-sm']) ?>
                            <?php endif?>

                            <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null):?>
                                <?php if ($itemPedido->pedido->tipo==1):?>
                                        <?= Html::a('<i class="fas fa-check"></i>',['pedidoproduto/updatepreparacao','id'=>$itemPedido->id],['class'=>'btn btn-info btn-sm'])?>
                                        <?= Html::a('<i class="fas fa-plus"></i>', ['pedidoproduto/update', 'id' => $itemPedido->id], ['class' => 'btn btn-success btn-sm']) ?>
                                        <?= Html::a('<i class="fas fa-trash"></i>', ['pedidoproduto/delete', 'id' => $itemPedido->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal',' data-target'=>'#apagarItemPedido'.$itemPedido->id,]) ?>
                                <?php else:?>
                                    <?= Html::a('<i class="fas fa-check"></i>',['pedidoproduto/updatepreparacao','id'=>$itemPedido->id],['class'=>'btn btn-info btn-sm'])?>
                                <?php endif?>
                            <?php endif?>

                        <?php if(Yii::$app->authManager->getAssignment('cliente',$id) != null):?>
                            <?php if ($itemPedido->pedido->estado==0):?>
                                    <?= Html::a('<i class="fas fa-plus"></i>', ['pedidoproduto/update', 'id' => $itemPedido->id], ['class' => 'btn btn-success btn-sm']) ?>

                                    <?= Html::a('<i class="fas fa-trash"></i>', ['pedidoproduto/delete', 'id' => $itemPedido->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal',' data-target'=>'#apagarItemPedido'.$itemPedido->id,]) ?>
                        <?php endif?>
                        <?php endif?>
                        <?php endif?>
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


