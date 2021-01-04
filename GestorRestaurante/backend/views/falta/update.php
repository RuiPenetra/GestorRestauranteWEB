<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Falta */

$this->title = 'Atualizar Falta: ' . $falta->id;

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
                    <th class="text-center">Data</th>
                    <th class="text-center">Hora Inicio</th>
                    <th class="text-center">Hora Fim</th>
                    <th class="text-center">NºHoras</th>
                    <th class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataprovider->models as $falta):?>
                    <tr>
                        <td class="text-center"><i class="fas fa-calendar-alt"></i></td>
                        <td class="text-center"><?=$falta->data?></td>
                        <td class="text-center"><?=date('H:i',strtotime($falta->hora_inicio))?></td>
                        <td class="text-center"><?=date('H:i',strtotime($falta->hora_fim))?></td>
                        <td class="text-center"><?=$falta->num_horas?></td>

                        <td class="text-center">
                            <?=Html::a('<i class="far fa-edit color-white"></i>', ['falta/update', 'id' => $falta->id_funcionario], ['class' => 'btn btn-warning btn-sm']) ?>
                            <?=Html::a('<i class="far fa-trash-alt color-white"></i>', ['falta/delete', 'id' => $falta->id_funcionario], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#apagarFalta'.$falta->id]) ?>
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
                                        Após apagar a falta selecionada não é possivel reverter.
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?= Html::a('<b>SIM</b>', ['delete', 'id' => $falta->id], [
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
        </div>
    </div>
    <!-- /.card-body -->
</div>
