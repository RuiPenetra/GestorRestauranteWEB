<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Falta */

$this->title='Faltas';
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
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($dataProviderFalta->models as $falta):?>
                                <tr>
                                    <td class="text-center"><i class="fas fa-calendar-alt"></i></td>
                                    <td class="text-center"><?=$falta->data?></td>
                                    <td class="text-center"><?=date('H:i',strtotime($falta->hora_inicio))?></td>
                                    <td class="text-center"><?=date('H:i',strtotime($falta->hora_fim))?></td>
                                    <td class="text-center"><?=$falta->num_horas?></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="row col-md-12 d-flex justify-content-center">
                            <?= LinkPager::widget([
                                'pagination' => $dataProviderFalta->getPagination(),
                                'options' => [
                                    'class' => 'page-item',
                                ],
                            ]);?>
                        </div>
                    </div>
                </div>
            </div>