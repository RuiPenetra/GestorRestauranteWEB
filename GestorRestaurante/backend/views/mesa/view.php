<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Mesa */

$this->title ="Mesa: nº ".$mesa->id;
\yii\web\YiiAsset::register($this);
?>
<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <img src="https://img.icons8.com/fluent-systems-filled/24/000000/table.png"/>
            Mesa
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <div class="row">
            <div class="row col-md-12 d-flex justify-content-center">
                <div class="col-md-3 mt-0 ">
                    <div class="box-body box-profile user-painel mt-3">
                        <div class="text-center">
                            <img class="img-responsive" src="https://img.icons8.com/color/100/000000/table.png"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row col-md-8">
                        <table class="table table-striped table-bordered detail-view">
                            <tbody>
                                <tr>
                                    <th>Nº:</th><td><?=$mesa->id?></td>
                                </tr>
                                <tr>
                                    <th>Nº Lugares</th><td><?=$mesa->n_lugares?> Lugares</td>
                                </tr>
                                <tr>
                                    <th>Estado</th>
                                    <?php if($mesa->estado==0):?>
                                        <td class="text-center"><span class="badge bg-dark">Reservada</span></td>
                                    <?php endif;?>
                                    <?php if($mesa->estado==1):?>
                                        <td class="text-center"><span class="badge bg-warning">Ocupada</span></td>
                                    <?php endif;?>
                                    <?php if($mesa->estado==2):?>
                                        <td class="text-center"><span class="badge bg-success">Livre</span></td>
                                    <?php endif;?>
                                </tr>
                            </tbody>
                        </table>
                        <p>
                            <?=Html::a('<i class="fas fa-edit"></i> Atualizar', ['mesa/update', 'id' => $mesa->id], ['class' => 'btn btn-warning btn-sm']) ?>
                            <?=Html::a('<i class="fas fa-trash"></i> Apagar', ['mesa/delete', 'id' => $mesa->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#apagarMesa'.$mesa->id]) ?>
                        <div class="modal fade"  id="apagarMesa<?=$mesa->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            Após apagar a mesa selecionada não é possivel reverter.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $mesa->id], [
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
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>


<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <img src="https://img.icons8.com/fluent-systems-filled/24/000000/table.png"/>
            Lista de pedidos
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <?php if($mesa->estado!=2):?>
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
            </div>
        <?php else:?>
        <div class="row col-md-12 d-flex justify-content-center">
            <h4>A mesa nº <?=$mesa->id?> não se encontra a ser utilizada.</h4>
        </div>
        <?php endif;?>
    </div>
    <!-- /.card -->
</div>
