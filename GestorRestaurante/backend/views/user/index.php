<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utilizadors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $this->title = 'Utilizadores';?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= Url::toRoute(['site/index']) ?>">Home</a></li>
                    <li class="breadcrumb-item active"><?=$this->title?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="utilizador-index">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <p>
                <button type="button" class="btn btn-success">
                    <a class="btn-success" href="<?= Url::toRoute(['user/create']) ?>" role="button">
                        <i class="fas fa-plus"></i>
                        Novo
                    </a>
                </button>
            </p>
            <div class="card">
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                                            <td class="" tabindex="" width="200px" ><?=$user->username?></td>
                                            <td class="dtr-control sorting_1" width="200px" tabindex="3">
                                                <?php if (Yii::$app->authManager->getAssignment('gerente',$user->id) != null):?>
                                                    Gerente
                                                <?php endif;?>
                                                <?php if (Yii::$app->authManager->getAssignment('cliente',$user->id) != null):?>
                                                    Cliente
                                                <?php endif;?>
                                                <?php if (Yii::$app->authManager->getAssignment('atendedorPedidos',$user->id) != null):?>
                                                    Atendedor Pedidos
                                                <?php endif;?>
                                                <?php if (Yii::$app->authManager->getAssignment('empregadoMesa',$user->id) != null
                                                ):?>
                                                    Empregado Mesa
                                                <?php endif;?>
                                                <?php if (Yii::$app->authManager->getAssignment('cozinheiro',$user->id) != null):?>
                                                    Cozinheiro
                                                <?php endif;?>
                                            </td>
                                            <td class=""  width="250px"><?=$user->email?> </td>
                                            <td class="dtr-control sorting_1 text-center" tabindex="8">
                                                <a href="<?=Url::toRoute(['user/view', 'id' => $user->id])?>" type="button" class="btn btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?=Url::toRoute(['user/update', 'id' => $user->id])?>" type="button" class="btn btn-warning">
                                                    <i class="far fa-edit color-white"></i>
                                                </a>
                                                <a href="<?=Url::toRoute(['user/delete', 'id' => $user->id])?>" data-method="POST" type="button" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
</div>



