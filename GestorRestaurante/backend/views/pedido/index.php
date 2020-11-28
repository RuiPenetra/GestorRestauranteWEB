<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm; ?>

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
    <div class="card-body text-center" style="display: block;">
        <button type="button" class="btn btn-success">
            <a class="btn-success" href="<?= Url::toRoute(['pedido/criar1passo']) ?>" role="button">
                <i class="fas fa-plus"></i>
                Novo
            </a>
        </button>
    </div>
    <!-- /.card-body -->
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
        <div class="row">
            <div class="col-12">
                <div class="card card-warning card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-restaurante-tab" data-toggle="pill" href="#custom-tabs-one-restaurante" role="tab" aria-controls="custom-tabs-one-restaurante" aria-selected="true"><h6><i class="fas fa-chair"></i> Restaurante</h6></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-takeaway-tab" data-toggle="pill" href="#custom-tabs-one-takeaway" role="tab" aria-controls="custom-tabs-one-take-away" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Take Away</h6></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-restaurante" role="tabpanel" aria-labelledby="custom-tabs-one-restaurante-tab">
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
                                    <?php foreach ($pedidos as $pedido){
                                        if($pedido->tipo==0):?>
                                    <tr>
                                        <td>
                                            #
                                        </td>
                                        <td>
                                            <a>
                                                Ref: <?=$pedido->id?>
                                            </a>
                                            <br>
                                            <small>
                                                Data: <?=$pedido->data?>
                                            </small>
                                        </td>
                                        <td>
                                            <ul class="list-inline">

                                                <li class="list-inline-item">
                                                    <?= Html::img('img/perfil.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']);?>
                                                    <?=$pedido->perfil->nome?>
                                                </li>

                                            </ul>
                                        </td>
                                        <td class="project_progress">
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                                </div>
                                            </div>
                                            <small>
                                                57% Complete
                                            </small>
                                        </td>
                                        <td class="project-state">
                                            <?php if($pedido->estado ==0):?>
                                            <span class="badge badge-info"> Em Processo</span>
                                            <?php endif;
                                            if($pedido->estado ==1):?>
                                            <span class="badge badge-warning"> Em Progresso</span>
                                            <?php endif;
                                            if($pedido->estado ==2):?>
                                            <span class="badge badge-success"> Concluido</span>
                                            <?php endif;?>
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-folder">
                                                </i>
                                            </a>
                                            <a class="btn btn-info btn-sm" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="#">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endif;}?>
                                    </tbody>
                                </table>
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
                            <div class="tab-pane fade" id="custom-tabs-one-takeaway" role="tabpanel" aria-labelledby="custom-tabs-one-takeaway-tab">
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
                                    <?php foreach ($pedidos as $pedido){
                                        if($pedido->tipo==1):?>
                                            <tr>
                                                <td>
                                                    #
                                                </td>
                                                <td>
                                                    <a>
                                                        Ref: <?=$pedido->id?>
                                                    </a>
                                                    <br>
                                                    <small>
                                                        Data: <?=$pedido->data?>
                                                    </small>
                                                </td>
                                                <td>
                                                    <ul class="list-inline">

                                                        <li class="list-inline-item">
                                                            <?= Html::img('img/perfil.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']);?>
                                                            <?=$pedido->perfil->nome?>
                                                        </li>

                                                    </ul>
                                                </td>
                                                <td class="project_progress">
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                                        </div>
                                                    </div>
                                                    <small>
                                                        57% Complete
                                                    </small>
                                                </td>
                                                <td class="project-state">
                                                    <?php if($pedido->estado ==0):?>
                                                        <span class="badge badge-info"> Em Processo</span>
                                                    <?php endif;
                                                    if($pedido->estado ==1):?>
                                                        <span class="badge badge-warning"> Em Progresso</span>
                                                    <?php endif;
                                                    if($pedido->estado ==2):?>
                                                        <span class="badge badge-success"> Concluido</span>
                                                    <?php endif;?>
                                                </td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-primary btn-sm" href="#">
                                                        <i class="fas fa-folder">
                                                        </i>
                                                    </a>
                                                    <a class="btn btn-info btn-sm" href="#">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endif;}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>

