<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Horario */

$this->title = 'Criar Horario';
$this->params['breadcrumbs'][] = ['label' => 'Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?=Html::a( ' <i class="fas fa-undo-alt"></i> Voltar', Yii::$app->request->referrer,['class'=>'btn btn-dark ml-5 mb-2'])?>

<?= $this->render('_form', [
    'horario' => $novoHorario,
]) ?>


<div class="card card-outline card-warning mr-5 ml-5"> <!--collapsed-card-->
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-search"></i>
            Lista Horarios
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
            <?php echo $this->render('_search', ['model' => $searchHorario]); ?>
        <div class="row col-md-12 d-flex justify-content-center">
            <table class="table table-striped col-md-9">
                <thead>
                <tr>
                    <th class="text-center">Segunda</th>
                    <th class="text-center">Terça</th>
                    <th class="text-center">Quarta</th>
                    <th class="text-center">Quinta</th>
                    <th class="text-center">Sexta</th>
                    <th class="text-center">Sabado</th>
                    <th class="text-center">Domingo</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">
                        <?php foreach ($dataProviderHorario->models as $horario):?>
                            <?php if($horario->dia_semana=="segunda"):?>
                                <div class="row col-md-12 d-flex justify-content-center mt-2">
                                    <div class="row col-md-12" style="width:120px; background-color: #fff59c;border-radius: 25px; display: block;;">
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-bottom: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Inicio</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_inicio));?></h7></div>
                                        </div>
                                        <div class="w-100">
                                            <?=Html::a('<i class="fas fa-edit"></i>', ['horario/update', 'id' => $horario->id], ['class' => 'btn btn-info btn-sm']) ?>
                                            <?=Html::a('<i class="fas fa-trash"></i>', ['horario/delete', 'id' => $horario->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#apagarHorario'.$horario->id]) ?>
                                        </div>
                                        <div class="modal fade"  id="apagarHorario<?=$horario->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            Após apagar o horario selecionado não é possivel reverter.
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $horario->id], [
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
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-top: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Fim</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_fim));?></h7></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </td>
                    <td class="text-center">
                        <?php foreach ($dataProviderHorario->models as $horario):?>
                            <?php if($horario->dia_semana=="terça"):?>
                                <div class="row col-md-12 d-flex justify-content-center mt-2">
                                    <div class="row col-md-12" style="width:120px; background-color: #fff59c;border-radius: 25px; display: block;;">
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-bottom: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Inicio</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_inicio));?></h7></div>
                                        </div>
                                        <div class="w-100">
                                            <?=Html::a('<i class="fas fa-edit"></i>', ['horario/update', 'id' => $horario->id], ['class' => 'btn btn-info btn-sm']) ?>
                                            <?=Html::a('<i class="fas fa-trash"></i>', ['horario/delete', 'id' => $horario->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#apagarHorario'.$horario->id]) ?>
                                        </div>
                                        <div class="modal fade"  id="apagarHorario<?=$horario->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            Após apagar o horario selecionado não é possivel reverter.
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $horario->id], [
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
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-top: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Fim</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_fim));?></h7></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </td>
                    <td class="text-center">
                        <?php foreach ($dataProviderHorario->models as $horario):?>
                            <?php if($horario->dia_semana=="quarta"):?>
                                <div class="row col-md-12 d-flex justify-content-center mt-2">
                                    <div class="row col-md-12" style="width:120px; background-color: #fff59c;border-radius: 25px; display: block;;">
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-bottom: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Inicio</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_inicio));?></h7></div>
                                        </div>
                                        <div class="w-100">
                                            <?=Html::a('<i class="fas fa-edit"></i>', ['horario/update', 'id' => $horario->id], ['class' => 'btn btn-info btn-sm']) ?>
                                            <?=Html::a('<i class="fas fa-trash"></i>', ['horario/delete', 'id' => $horario->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#apagarHorario'.$horario->id]) ?>
                                        </div>
                                        <div class="modal fade"  id="apagarHorario<?=$horario->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            Após apagar o horario selecionado não é possivel reverter.
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $horario->id], [
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
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-top: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Fim</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_fim));?></h7></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </td>
                    <td class="text-center">
                        <?php foreach ($dataProviderHorario->models as $horario):?>
                            <?php if($horario->dia_semana=="quinta"):?>
                                <div class="row col-md-12 d-flex justify-content-center mt-2">
                                    <div class="row col-md-12" style="width:120px; background-color: #fff59c;border-radius: 25px; display: block;;">
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-bottom: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Inicio</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_inicio));?></h7></div>
                                        </div>
                                        <div class="w-100">
                                            <?=Html::a('<i class="fas fa-edit"></i>', ['horario/update', 'id' => $horario->id], ['class' => 'btn btn-info btn-sm']) ?>
                                            <?=Html::a('<i class="fas fa-trash"></i>', ['horario/delete', 'id' => $horario->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#apagarHorario'.$horario->id]) ?>
                                        </div>
                                        <div class="modal fade"  id="apagarHorario<?=$horario->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            Após apagar o horario selecionado não é possivel reverter.
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $horario->id], [
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
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-top: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Fim</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_fim));?></h7></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </td>
                    <td class="text-center">
                        <?php foreach ($dataProviderHorario->models as $horario):?>
                            <?php if($horario->dia_semana=="sexta"):?>
                                <div class="row col-md-12 d-flex justify-content-center mt-2">
                                    <div class="row col-md-12" style="width:120px; background-color: #fff59c;border-radius: 25px; display: block;;">
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-bottom: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Inicio</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_inicio));?></h7></div>
                                        </div>
                                        <div class="w-100">
                                            <?=Html::a('<i class="fas fa-edit"></i>', ['horario/update', 'id' => $horario->id], ['class' => 'btn btn-info btn-sm']) ?>
                                            <?=Html::a('<i class="fas fa-trash"></i>', ['horario/delete', 'id' => $horario->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#apagarHorario'.$horario->id]) ?>
                                        </div>
                                        <div class="modal fade"  id="apagarHorario<?=$horario->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            Após apagar o horario selecionado não é possivel reverter.
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $horario->id], [
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
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-top: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Fim</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_fim));?></h7></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </td>
                    <td class="text-center">
                        <?php foreach ($dataProviderHorario->models as $horario):?>
                            <?php if($horario->dia_semana=="sabado"):?>
                                <div class="row col-md-12 d-flex justify-content-center mt-2">
                                    <div class="row col-md-12" style="width:120px; background-color: #fff59c;border-radius: 25px; display: block;;">
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-bottom: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Inicio</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_inicio));?></h7></div>
                                        </div>
                                        <div class="w-100">
                                            <?=Html::a('<i class="fas fa-edit"></i>', ['horario/update', 'id' => $horario->id], ['class' => 'btn btn-info btn-sm']) ?>
                                            <?=Html::a('<i class="fas fa-trash"></i>', ['horario/delete', 'id' => $horario->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#apagarHorario'.$horario->id]) ?>
                                        </div>
                                        <div class="modal fade"  id="apagarHorario<?=$horario->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            Após apagar o horario selecionado não é possivel reverter.
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $horario->id], [
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
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-top: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Fim</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_fim));?></h7></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </td>
                    <td class="text-center">
                        <?php foreach ($dataProviderHorario->models as $horario):?>
                            <?php if($horario->dia_semana=="domingo"):?>
                                <div class="row col-md-12 d-flex justify-content-center mt-2">
                                    <div class="row col-md-12" style="width:120px; background-color: #fff59c;border-radius: 25px; display: block;;">
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-bottom: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Inicio</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_inicio));?></h7></div>
                                        </div>
                                        <div class="w-100">
                                            <?=Html::a('<i class="fas fa-edit"></i>', ['horario/update', 'id' => $horario->id], ['class' => 'btn btn-info btn-sm']) ?>
                                            <?=Html::a('<i class="fas fa-trash"></i>', ['horario/delete', 'id' => $horario->id], ['class' => 'btn btn-danger btn-sm','data-toggle'=>'modal', 'data-target'=>'#apagarHorario'.$horario->id]) ?>
                                        </div>
                                        <div class="modal fade"  id="apagarHorario<?=$horario->id?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            Após apagar o horario selecionado não é possivel reverter.
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?= Html::a('<b>SIM</b>', ['delete', 'id' => $horario->id], [
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
                                        <div class="w-100" style="background-color: #ffd752;border-radius:30px; margin-top: 30px">
                                            <div class="row d-flex justify-content-center"><h7 class="mt-2"><b><i class="far fa-clock"></i> Hora Fim</b></h7></div>
                                            <div class="row d-flex justify-content-center"><h7><?=date('H:i',strtotime($horario->hora_fim));?></h7></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
