<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FaltaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faltas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="callout callout-warning">
    <h5>Criar Faltas</h5>

    <p>Necessário selecionar o utilizador a marcar falta. </p>

    <p>
    <span style="font-size: small"><b>Legenda : </b></span>
        <button type="button" class="btn btn-outline-dark">
            <i class="fas fa-eye"></i>
        </button>
        Consultar utilizador
        <button type="button" class="btn btn-outline-success ml-3">
            <i class="fas fa-check-circle"></i>
        </button>
        Selecionar utilizador
    </p>
</div>
<div class="card card-warning mr-5 ml-5">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
            <b>Lista Utilizadores</b>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <div class="row justify-content-center">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4 mt-3">
                <div class="row">
                    <div class="col-12">
                        <table id="index" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="index">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Username</th>
                                <th class="sorting" tabindex="1" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Cargo</th>
                                <th class="sorting" tabindex="2" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
                                <th class="sorting" tabindex="3" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"></th>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user):?>
                                <tr role="row" class="odd">
                                    <td class="" tabindex="" width="200px" ><?=$user->nome?></td>
                                    <td class="dtr-control sorting_1" width="200px" tabindex="3">
                                        <?php if (Yii::$app->authManager->getAssignment('gerente',$user->id_user) != null):?>
                                            Gerente
                                        <?php endif;?>
                                        <?php if (Yii::$app->authManager->getAssignment('cliente',$user->id_user) != null):?>
                                            Cliente
                                        <?php endif;?>
                                        <?php if (Yii::$app->authManager->getAssignment('atendedorPedidos',$user->id_user) != null):?>
                                            Atendedor Pedidos
                                        <?php endif;?>
                                        <?php if (Yii::$app->authManager->getAssignment('empregadoMesa',$user->id_user) != null
                                        ):?>
                                            Empregado Mesa
                                        <?php endif;?>
                                        <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$user->id_user) != null):?>
                                            Cozinheiro
                                        <?php endif;?>
                                    </td>
                                    <td class=""  width="250px"><?=$user->apelido?> </td>
                                    <td class="dtr-control sorting_1 text-center" tabindex="8">
                                        <a href="<?=Url::toRoute(['falta/view', 'id' => $user->id_user])?>" type="button" class="btn btn-success">
                                            <i class="fas fa-plus-circle"></i>
                                        </a>
                                        <a href="<?=Url::toRoute(['falta/view', 'id' => $user->id_user])?>" type="button" class="btn btn-info" data-target="#verUser<?=$user->id_user?>">
                                            <i class="fas fa-user"></i>
                                        </a>

                                    </td>
                                </tr>
                                <div class="modal fade"  id="verUser<?=$user->id_user?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    Após apagar o utilizador selecionado não é possivel reverter.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" href="<?=Url::toRoute(['user/delete', 'id' => $user->id_user])?>" data-method="POST" class="btn btn-outline-success" data-dismiss="modal"><b>SIM</b></button>
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach;?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>