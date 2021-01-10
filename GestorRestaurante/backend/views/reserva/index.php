<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReservaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row col-md-12 d-flex justify-content-center">
    <?= Html::a('<div class="col-md-4">
                <!-- small card -->
                <div class="small-box bg-teal p-3" style="width: 300px">
                    <div class="inner text-white">
                        <h4><b>Novo</b></h4>
                    </div>
                    <div class="icon">
                        <i class="fas fa-marker"></i>
                    </div>
                </div>
              </div>',['reserva/create']) ?>
</div>
<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
            Lista reservas
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <?php echo $this->render('_search', ['model' => $searchReserva, 'mesas' => $mesas]); ?>
        <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="row">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th  class="text-center" >
                            #
                        </th>
                        <th class="text-center">
                            Responsavel
                        </th>
                        <th class="text-center">
                            Data e Hora
                        </th>
                        <th class="text-center">
                            Mesa
                        </th>
                        <th class="text-center" >
                            Nome Reserva
                        </th>
                        <th class="text-center" >
                            Nº Lugares
                        </th>
                        <th class="text-center">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dataProviderReserva->models as $reserva): ?>
                        <tr>
                            <td class="text-center">
                                <?=Html::img('@web/img/notes.png', ['alt' => 'imgTable', 'class' => 'img-fluid', 'width'=>'50px']); ?>
                            </td>
                            <td class="text-center">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <?php if($reserva->funcionario->genero==0):?>
                                                    <?= Html::img('@web/img/female.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']); ?>
                                                    <?= $reserva->funcionario->nome ?>
                                                <?php endif?>
                                                <?php if($reserva->funcionario->genero==1):?>
                                                    <?= Html::img('@web/img/male.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img table-avatar img-fluid']); ?>
                                                    <?= $reserva->funcionario->nome ?>
                                                <?php endif?>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                            <td class="text-center">
                                <?= $reserva->data_hora ?>
                            </td>
                            <td class="text-center">
                                <?=Html::img('@web/img/table.png', ['alt' => 'imgTable', 'class' => 'img-fluid mr-2', 'width'=>'30px']); ?>
                                 <?= $reserva->id_mesa ?>
                            </td>
                            <td class="text-center">
                                <i class="fas fa-user mr-2"></i><?= $reserva->nome_da_reserva ?>
                            </td>
                            <td class="text-center">
                                <i class="fas fa-users mr-2"></i><?= $reserva->n_pessoas ?>
                            </td>
                            <td class="project-actions text-right">
                                <?= Html::a('<i class="fas fa-pen"></i>', ['update', 'id' => $reserva->id], ['class' => 'btn btn-warning btn-sm']) ?>
                                <?= Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $reserva->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal',' data-target'=>'#apagarReserva'.$reserva->id,]) ?>
                            </td>
                        </tr>
                        <div class="modal fade"  id="apagarReserva<?=$reserva->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            Após apagar a reserva selecionado não é possivel reverter.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $reserva->id], [
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
                        'pagination' => $dataProviderReserva->getPagination(),
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