<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">
    <?php $id = Yii::$app->user->identity->id; ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <div class="d-flex justify-content-center mt-4">
        <?= Html::a('Criar Takeaway', ['create'], ['class' => 'btn btn-danger']) ?>
    </div>


    <div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
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
        <div class="card-body" style="display: block;">
            <div class="row">
                <div class="col-12">
                    <div class="card card-warning card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null):?>
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-restaurante-tab" data-toggle="pill" href="#custom-tabs-one-restaurante" role="tab" aria-controls="custom-tabs-one-restaurante" aria-selected="true"><h6><i class="fas fa-chair"></i> Restaurante</h6></a>
                                </li>
                                <?php endif?>
                                <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id) != null):?>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-takeaway-tab" data-toggle="pill" href="#custom-tabs-one-takeaway" role="tab" aria-controls="custom-tabs-one-take-away" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Take Away</h6></a>
                                </li>
                                <?php endif?>

                                <?php if(Yii::$app->authManager->getAssignment('cliente',$id) != null):?>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-takeaway-tab" data-toggle="pill" href="#custom-tabs-one-takeaway" role="tab" aria-controls="custom-tabs-one-take-away" aria-selected="false"><h6><i class="fas fa-shopping-bag"></i> Take Away</h6></a>
                                    </li>
                                <?php endif?>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-restaurante" role="tabpanel"
                                     aria-labelledby="custom-tabs-one-restaurante-tab">
                                    <table class="table table-striped projects">
                                        <thead>
                                        <tr>
                                            <th style="width: 20%">
                                                ID Cliente
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
                                        <?php foreach ($pedidos as $pedido): ?>
                                        <?php if($pedido->tipo==0):?>
                                        <tr>
                                            <td>
                                                <a>
                                                    <?= $pedido->id_perfil ?>
                                                </a>
                                                <br>
                                                <small>
                                                    Criado:<?= $pedido->data ?>
                                                </small>
                                            </td>
                                            <td>
                                                <?php if($pedido->tipo==0):?>
                                                <span class='badge badge-danger-white'>Restaurante</span>
                                                <?php endif;?>
                                            </td>
                                            <td class="project_progress">
                                                <?= $pedido->nome_pedido ?>
                                            </td>

                                            <td class="project-state">

                                                <?php if ($pedido->estado == 0) {
                                                    echo "<span class='badge badge-info-black'>Em Processo</span>";
                                                } ?>

                                                <?php if ($pedido->estado == 1) {
                                                    echo "<span class='badge badge-warning'>Em Progresso</span>";
                                                } ?>

                                                <?php if ($pedido->estado == 2) {
                                                    echo "<span class='badge badge-success'>Concluido</span>";
                                                } ?>
                                            <td class="project-actions text-right">

                                                <a class="btn btn-danger btn-sm" href="#">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endif?>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade show" id="custom-tabs-one-takeaway" role="tabpanel"
                                     aria-labelledby="custom-tabs-one-takeaway-tab">
                                    <table class="table table-striped projects">
                                        <thead>
                                        <tr>
                                            <th style="width: 20%">
                                                ID Cliente
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
                                        <?php foreach ($pedidos as $pedido): ?>
                                        <?php if($pedido->tipo==1):?>
                                            <tr>
                                                <td>
                                                    <a>
                                                        <?= $pedido->id_perfil ?>
                                                    </a>
                                                    <br>
                                                    <small>
                                                        Criado:<?= $pedido->data ?>
                                                    </small>
                                                </td>
                                                <td>
                                                    <?php if($pedido->tipo==1):?>
                                                        <span class='badge badge-indigo-white'>Takeaway</span>
                                                    <?php endif;?>
                                                </td>
                                                <td class="project_progress">
                                                    <?= $pedido->nome_pedido ?>
                                                </td>

                                                <td class="project-state">

                                                    <?php if ($pedido->estado == 0) {
                                                        echo "<span class='badge badge-info-black'>Em Processo</span>";
                                                    } ?>

                                                    <?php if ($pedido->estado == 1) {
                                                        echo "<span class='badge badge-warning'>Em Progresso</span>";
                                                    } ?>

                                                    <?php if ($pedido->estado == 2) {
                                                        echo "<span class='badge badge-success'>Concluido</span>";
                                                    } ?>
                                                <td class="project-actions text-right">

                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endif?>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>

