<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mesas';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $novaMesa,
]) ?>

<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <img src="https://img.icons8.com/fluent-systems-filled/24/000000/table.png"/>
            Lista de mesas
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <div class="row d-flex justify-content-center">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 60px" class="text-center"></th>
                    <th class="text-center">Nº</th>
                    <th class="text-center">Lugares</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataProvider->models as $mesa):?>
                    <tr>
                        <td class="text-center"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/table.png"/></td>
                        <td class="text-center"><span class="mesa-id"><?=$mesa->id?></span></td>
                        <td class="text-center"><?=$mesa->n_lugares?></td>
                        <?php if($mesa->estado==0):?>
                            <td class="text-center"><span class="badge bg-dark">Reservada</span></td>
                        <?php endif;?>
                        <?php if($mesa->estado==1):?>
                            <td class="text-center"><span class="badge bg-warning">Ocupada</span></td>
                        <?php endif;?>
                        <?php if($mesa->estado==2):?>
                            <td class="text-center"><span class="badge bg-success">Livre</span></td>
                        <?php endif;?>
                        <?php if($mesa->estado==3):?>
                            <td class="text-center"><span class="badge bg-danger">Inativa</span></td>
                        <?php endif;?>
                        <td class="project-actions text-center">
                            <?= Html::a('<i class="fas fa-eye"></i>', ['mesa/view', 'id' => $mesa->id], ['class' => 'btn btn-info btn-sm']) ?>
                            <?= Html::a('<i class="far fa-edit color-white"></i>', ['mesa/update', 'id' => $mesa->id], ['class' => 'btn btn-warning btn-sm btn-mesa-edit','name'=>'mesaEdit-button'.$mesa->id]) ?>
                            <?php if ($mesa->estado!=3):?>
                                <?=Html::a('<i class="far fa-trash-alt color-white"></i>', ['delete'], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#inativarMesa'.$mesa->id]) ?>
                            <?php else:?>
                                <?=Html::a('<i class="fas fa-trash-restore-alt"></i>', ['delete'], ['class' => 'btn btn-success btn-sm','data-toggle'=>'modal', 'data-target'=>'#reativarMesa'.$mesa->id]) ?>
                            <?php endif;?>
                        </td>
                    </tr>
                    <div class="modal fade"  id="inativarMesa<?=$mesa->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content mt-2" >
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i>Tem a certeza que quer indisponibilizar a mesa selecionado?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        Após indisponibilizar a mesa selecionado a mesa passará a estar indisponivel para ser usada.
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
                    <div class="modal fade"  id="reativarMesa<?=$mesa->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content mt-2" >
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i> Tem a certeza que quer disponibilizar a mesa selecionado?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        Após disponibilizar a mesa selecionado a mesa passará a estar disponivel para ser usada.
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
    <!-- /.card-body -->
</div>
