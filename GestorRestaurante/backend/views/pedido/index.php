<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

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
        ['pedido/criar2passo','tipo'=>0], [ 'class'=>''])?>

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
        ['pedido/criar2passo','tipo'=>1], [ 'class'=>''])?>
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
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Pedido
                        </th>
                        <th style="width: 30%">
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
                            <td>
                                #
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
                            <td>
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
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                    </div>
                                </div>
                                <small>
                                    57% Complete
                                </small>
                            </td>
                            <td class="project-state">
                                <?php if ($pedido->estado == 0): ?>
                                    <span class="badge badge-info"> Em Processo</span>
                                <?php endif;
                                if ($pedido->estado == 1):?>
                                    <span class="badge badge-warning"> Em Progresso</span>
                                <?php endif;
                                if ($pedido->estado == 2):?>
                                    <span class="badge badge-success"> Concluido</span>
                                <?php endif; ?>
                            </td>
                            <td class="project-actions text-right">
                                <?= Html::a('<i class="fas fa-folder"></i>', ['update', 'id' => $pedido->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= Html::a('<i class="fas fa-cart-plus"></i>', ['pedidoproduto/index', 'id' => $pedido->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                </a>
                            </td>
                        </tr>
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

