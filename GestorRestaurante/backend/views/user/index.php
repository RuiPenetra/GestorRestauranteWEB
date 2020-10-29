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
<div class="utilizador-index">
    <div class="row">
        <div class="col-md-9 ml-5">
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
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Telemovel</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Cargo</th>
                                        <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"></th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($users as $user):?>
                                        <tr role="row" class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0"><?=$user->username?></td>
                                            <td><?=$user->email?> </td>
                                            <td><?=$user->email?> </td>
                                            <td>Gerente </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning">
                                                    <i class="far fa-edit color-white"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach?>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
