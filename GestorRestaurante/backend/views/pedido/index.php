<?php

/* @var $this yii\web\View */

$this->title = 'Pedidos';

use yii\bootstrap4\Html;
use yii\bootstrap4\LinkPager;
use yii\helpers\Url;
use yii\widgets\ActiveForm; ?>

<div class="row col-md-12 d-flex justify-content-center">
    <?= Html::a('<div class="col-md-4">
                                    <!-- small card -->
                                    <div class="small-box bg-gradient-green p-3" style="width: 300px">
                                        <div class="inner">
                                            <h4><b>Restaurante</b></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-utensils"></i>
                                        </div>
                                    </div>
                                  </div>',
        ['pedido/create','tipo'=>0], [ 'class'=>''])?>

    <?= Html::a('<div class="col-md-4">
                                    <!-- small card -->
                                    <div class="small-box bg-gradient-yellow p-3" style="width: 300px">
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

<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
            Lista pedidos
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <?php echo $this->render('//pedido/_search', ['model' => $searchModel, 'mesas' => $mesas]); ?>
        <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="row">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 7%">
                            #
                        </th>
                        <th style="width: 20%">
                            Pedido
                        </th>
                        <th class="text-center" style="width: 30%">
                            Responsável
                        </th>
                        <th style="width: 20%">
                            Progresso
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
                            <td class="text-center">
                                <?php if($pedido->tipo==0):?>
                                    <?= Html::img('@web/img/table.png', ['alt' => 'imgTable', 'class' => 'img-fluid', 'width'=>'50px']); ?>
                                <?php endif?>
                                <?php if($pedido->tipo==1):?>
                                    <?= Html::img('@web/img/takeaway.png', ['alt' => 'imgTakeaway', 'class' => 'img-fluid', 'width'=>'50px']); ?>
                                <?php endif?>
                            </td>
                            <td>
                                <a>
                                    Ref: <?= $pedido->id ?>
                                </a>
                                <br>
                                <small>
                                    Data: <?= $pedido->data ?>
                                </small>
                            </td>
                            <td class="text-center">
                                <ul class="list-inline">

                                    <li class="list-inline-item">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <?php if($pedido->perfil->genero==0):?>
                                                    <?= Html::img('@web/img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']); ?>
                                                    <?= $pedido->perfil->nome ?>
                                                <?php endif?>
                                                <?php if($pedido->perfil->genero==1):?>
                                                    <?= Html::img('@web/img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']); ?>
                                                    <?= $pedido->perfil->nome ?>
                                                <?php endif?>
                                            </li>

                                        </ul>
                                    </li>

                                </ul>
                            </td>
                            <td class="project_progress">
                                <?php if ($pedido->estado == 0): ?>
                                    <div class="progress progress-sm active">
                                        <div class="progress-bar bg-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                        </div>
                                    </div>
                                <?php endif;
                                if ($pedido->estado == 1):?>
                                    <div class="progress progress-sm active">
                                        <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                        </div>
                                    </div>
                                <?php endif;
                                if ($pedido->estado == 2):?>
                                    <div class="progress progress-sm active">
                                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="project-state">
                                <?php if ($pedido->estado == 0): ?>
                                    <span class="badge badge-info"> Em Processo</span>
                                <?php endif;
                                if ($pedido->estado == 1):?>
                                    <span class="badge badge-warning text-white"> Em Progresso</span>
                                <?php endif;
                                if ($pedido->estado == 2):?>
                                    <span class="badge badge-success text-white"> Concluido</span>
                                <?php endif; ?>
                            </td>
                            <td class="project-actions text-right">
                                <?= Html::a('<i class="fas fa-pen"></i>', ['update', 'id' => $pedido->id], ['class' => 'btn btn-warning btn-sm']) ?>
                                <?= Html::a('<i class="fas fa-cart-plus"></i>', ['pedidoproduto/index', 'id' => $pedido->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= Html::a('<i class="fas fa-trash"></i>', ['pedidoproduto/delete', 'id' => $pedido->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal',' data-target'=>'#apagarPedido'.$pedido->id,]) ?>
                            </td>
                        </tr>
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
                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $pedido->id], [
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

                    <?php endforeach; ?>
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
                <!--<div class="row">
                    <div class="col-sm-4 mt-3">
                    <div class="position-relative p-3 bg-orange-light" style="height: 180px">
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-warning text-lg">
                                Em progresso
                            </div>
                        </div>
                        Ribbon Extra Large <br> with Large Text <br>
                        <small>.ribbon-wrapper.ribbon-xl .ribbon.text-lg</small>
                    </div>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <div class="position-relative p-3 bg-orange-light" style="height: 180px">
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-orange text-lg">
                                    Em preparação
                                </div>
                            </div>
                            Ribbon Extra Large <br> with Large Text <br>
                            <small>.ribbon-wrapper.ribbon-xl .ribbon.text-lg</small>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <div class="position-relative p-3 bg-orange-light" style="height: 180px">
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-success text-lg">
                                    Concluido
                                </div>
                            </div>
                            Ribbon Extra Large <br> with Large Text <br>
                            <small>.ribbon-wrapper.ribbon-xl .ribbon.text-lg</small>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <div class="position-relative p-3 bg-gray" style="height: 180px">
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-warning text-lg">
                                    Ribbon
                                </div>
                            </div>
                            Ribbon Extra Large <br> with Large Text <br>
                            <small>.ribbon-wrapper.ribbon-xl .ribbon.text-lg</small>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <div class="position-relative p-3 bg-gray" style="height: 180px">
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-warning text-lg">
                                    Ribbon
                                </div>
                            </div>
                            Ribbon Extra Large <br> with Large Text <br>
                            <small>.ribbon-wrapper.ribbon-xl .ribbon.text-lg</small>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>

