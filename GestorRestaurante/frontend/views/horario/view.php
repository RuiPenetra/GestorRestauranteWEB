<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title='Horarios';

\yii\web\YiiAsset::register($this);
$id_user = Yii::$app->user->identity->id;
?>
    <?php if(Yii::$app->authManager->getAssignment('cliente',$id_user) != null):?>
    <div class="card card-danger card-outline mr-5 ml-5">
    <?php endif?>

    <?php if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id_user) != null):?>
    <div class="card card-blue card-outline mr-5 ml-5">
    <?php endif?>

    <?php if(Yii::$app->authManager->getAssignment('cozinheiro',$id_user) != null):?>
    <div class="card card-green card-outline mr-5 ml-5">
    <?php endif?>

    <?php if(Yii::$app->authManager->getAssignment('empregadoMesa',$id_user) != null):?>
    <div class="card card-purple card-outline mr-5 ml-5">
    <?php endif?>
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