<?php

use kartik\datetime\DateTimePicker;
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
$id = Yii::$app->user->identity->id;
?>
<?php if(Yii::$app->authManager->getAssignment('cliente',$id) != null || Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null):?>
    <div class="row col-md-12 d-flex justify-content-center">

        <?= Html::a('<div class="col-md-4">
                                        <!-- small card -->
                                        <div class="small-box bg-gradient-dark p-3" style="width: 300px">
                                            <div class="inner text-white">
                                                <h4><b>Takeaway</b></h4>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-utensils"></i>
                                            </div>
                                        </div>
                                      </div>',
            ['pedido/create','tipo'=>1], [ 'class'=>''])?>
    </div>
<?php endif;?>


<?php if(Yii::$app->authManager->getAssignment('cliente',$id) != null):?>
    <div class="card card-outline card-danger mr-5 ml-5"><!--collapsed-card-->
<?php endif?>

<?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null):?>
    <div class="card card-outline card-blue mr-5 ml-5"><!--collapsed-card-->
<?php endif?>

<?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id) != null):?>
    <div class="card card-outline card-indigo mr-5 ml-5"><!--collapsed-card-->
<?php endif?>
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-shopping-bag"></i>
                Lista pedidos
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <?php if (Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null):?>
            <?php echo $this->render('//pedido/_search', ['model' => $searchModel, 'mesas' => $mesas]); ?>
            <?php endif?>

            <?php if (Yii::$app->authManager->getAssignment('empregadoMesa',$id) != null):?>
                <?php echo $this->render('//pedido/_search', ['model' => $searchModel, 'mesas' => $mesas]); ?>
            <?php endif?>
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 20%">
                        Pedido
                    </th>
                    <th style="width: 30%">
                        Tipo
                    </th>
                    <th style="width: 20%">
                        Nome Pedido
                    </th>
                    <th style="width: 9%" class="text-center">
                        Estado
                    </th>
                    <th style="width: 200%">
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataProvider->models as $pedido): ?>
                    <tr>
                        <td>
                            <a>
                                Ref: <?= $pedido->id ?>
                            </a>
                            <br>
                            <small>
                                Criado:<?= $pedido->data ?>
                            </small>
                        </td>
                        <td>
                            <?php if($pedido->tipo==1):?>
                                <span class='badge badge-orange text-white'>Take away</span>
                            <?php endif;?>
                            <?php if($pedido->tipo==0):?>
                                <span class='badge badge-danger text-white'>Restaurante</span>
                            <?php endif;?>
                        </td>
                        <td class="project_progress">
                            <?= $pedido->nome_pedido ?>
                        </td>
                        <td class="project-state">
                            <?php if ($pedido->estado == 0):?>
                               <span class='badge badge-info text-white'>Em Processo</span>
                            <?php endif;?>
                            <?php if ($pedido->estado == 1):?>
                                <span class='badge badge-warning text-white'>Em Progresso</span>
                            <?php endif;?>
                            <?php if ($pedido->estado == 2):?>
                                <span class='badge badge-success text-white'>Concluido</span>
                            <?php endif;?>
                        </td>
                        <td class="project-actions text-right">
                            <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null):?>
                                <?php if($pedido->tipo==1):?>
                                    <?php if($pedido->estado==0):?>
                                        <?= Html::a('<i class="fas fa-pen"></i>', ['update', 'id' => $pedido->id], ['class' => 'btn btn-warning btn-sm']) ?>
                                        <?= Html::a('<i class="fas fa-cart-plus"></i>', ['pedidoproduto/index', 'id' => $pedido->id], ['class' => 'btn btn-success btn-sm']) ?>
                                        <?= Html::a('<i class="fas fa-trash"></i>', ['pedidoproduto/delete', 'id' => $pedido->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal',' data-target'=>'#apagarPedido'.$pedido->id,]) ?>
                                        <div class="modal fade"  id="apagarPedido<?=$pedido->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            Após apagar o pedido selecionado não é possivel reverter.
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?= \yii\bootstrap4\Html::a('<b>SIM</b>', ['delete', 'id' => $pedido->id], [
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
                                    <?php elseif($pedido->estado==1):?>
                                        <?= Html::a('<i class="fas fa-pen"></i>', ['update', 'id' => $pedido->id], ['class' => 'btn btn-warning btn-sm']) ?>
                                        <?= Html::a('<i class="fas fa-cart-plus"></i>', ['pedidoproduto/index', 'id' => $pedido->id], ['class' => 'btn btn-success btn-sm']) ?>
                                    <?php else:?>
                                        <?= Html::a('<i class="fas fa-eye"></i>', ['pedidoproduto/index', 'id' => $pedido->id], ['class' => 'btn btn-info btn-sm']) ?>
                                    <?php endif;?>
                                <?php else:?>
                                    <?php if($pedido->estado==0 || $pedido->estado==1 ):?>
                                        <?= Html::a('<i class="fas fa-pen"></i>', ['pedidoproduto/index', 'id' => $pedido->id], ['class' => 'btn btn-warning btn-sm']) ?>
                                    <?php else:?>
                                        <?= Html::a('<i class="fas fa-eye"></i>', ['pedidoproduto/index', 'id' => $pedido->id], ['class' => 'btn btn-info btn-sm']) ?>
                                    <?php endif?>
                                <?php endif;?>
                            <?php else:?>
                                <?php if(Yii::$app->authManager->getAssignment('cliente',$id) != null):?>
                                    <?php if($pedido->tipo==1):?>
                                        <?= Html::a('<i class="fas fa-eye"></i>', ['pedidoproduto/index', 'id' => $pedido->id], ['class' => 'btn btn-info btn-sm']) ?>
                                        <?php if($pedido->estado==0):?>
                                            <?= Html::a('<i class="fas fa-pen"></i>', ['update', 'id' => $pedido->id], ['class' => 'btn btn-warning btn-sm']) ?>
                                            <?= Html::a('<i class="fas fa-cart-plus"></i>', ['pedidoproduto/index', 'id' => $pedido->id], ['class' => 'btn btn-success btn-sm']) ?>
                                            <?= Html::a('<i class="fas fa-trash"></i>', ['pedidoproduto/delete', 'id' => $pedido->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal',' data-target'=>'#apagarPedido'.$pedido->id,]) ?>
                                            <div class="modal fade"  id="apagarPedido<?=$pedido->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                Após apagar o pedido selecionado não é possivel reverter.
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <?= \yii\bootstrap4\Html::a('<b>SIM</b>', ['delete', 'id' => $pedido->id], [
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
                                        <?php elseif($pedido->estado==1):?>
                                            <?= Html::a('<i class="fas fa-pen"></i>', ['update', 'id' => $pedido->id], ['class' => 'btn btn-warning btn-sm']) ?>


                                        <?php endif;?>
                                    <?php endif;?>
                                <?php else:?>
                                    <?= Html::a('<i class="fas fa-eye"></i>', ['pedidoproduto/index', 'id' => $pedido->id], ['class' => 'btn btn-info btn-sm']) ?>
                                <?php endif;?>
                            <?php endif;?>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            <div class="row col-md-12 d-flex justify-content-center">
                <?= LinkPager::widget([
                    'pagination' => $dataProvider->getPagination(),
                    'options' => [
                        'class' => 'page-item',
                    ],
                ]);?>
            </div>

        </div>
    </div>

