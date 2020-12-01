<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Falta */

$this->title = 'Create Falta';
$this->params['breadcrumbs'][] = ['label' => 'Faltas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?= $this->render('_form', [
    'falta' => $falta,
]) ?>

<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-calendar-alt"></i>
            Lista de faltas
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <?php echo $this->render('_search', ['falta' => $searchFalta]); ?>
        <div class="row d-flex justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 60px" class="text-center"></th>
                    <th class="text-center">Data Inicio</th>
                    <th class="text-center">Data Fim</th>
                    <th class="text-center">NºHoras</th>
                    <th class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataprovider->models as $falta){
                    if($falta->id_funcionario==$user->id):?>
                        <tr>
                            <td class="text-center"><i class="fas fa-calendar-alt"></i></td>
                            <td class="text-center"><?=$falta->data_inicio?></td>
                            <td class="text-center"><?=$falta->data_fim?></td>
                            <td class="text-center"><?=$falta->num_horas?></td>

                            <td class="text-center">
                                <a href="" type="button" class="btn btn-info" data-toggle="modal" data-target="#verFalta<?=$falta->id?>">
                                    <i class="far fa-add color-white"></i>
                                </a>
                                <a href="" type="button" class="btn btn-warning" data-toggle="modal" data-target="#apagarFalta<?=$falta->id?>">
                                    <i class="far fa-edit color-white"></i>
                                </a>
                                <a href="" type="button" class="btn btn-danger" data-toggle="modal" data-target="#apagarFalta<?=$falta->id?>">
                                    <i class="far fa-trash-alt color-white"></i>
                                </a>
                            </td>
                        </tr>
                        <div class="modal fade"  id="apagarFalta<?=$falta->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>NÃO</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade"  id="verFalta<?=$falta->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            A&&&&
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><b>Fechar</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endif;}?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
